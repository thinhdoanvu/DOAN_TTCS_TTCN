const express = require('express')
var bodyParser = require('body-parser')
const app = express();
const port = 4000;
// router
const colorRoutes = require('./routes/colorRoutes')
const roleRoutes = require('./routes/roleRoutes')
const productRoutes = require('./routes/productRoutes')
const userRoutes = require('./routes/userRoutes')
const typeproductRoutes = require('./routes/typeproductRoutes')


// model
const User = require('./models/User')
const Role = require('./models/Role')
const Product = require('./models/Product')
const Order = require('./models/Order')
const OrderDetail = require('./models/OrderDetail')
const FeedBack = require('./models/FeedBack')
const TypeProduct = require('./models/TypeProduct')
const Color = require('./models/Color')
const Supplier = require('./models/Supplier')

User.belongsTo(Role, {
      foreignKey: "RoleID",
})
Order.belongsTo(User, {
      foreignKey: "UserID",
})
OrderDetail.belongsTo(Order, {
      foreignKey: "OrderID",
}
)
OrderDetail.belongsTo(Product, {
      foreignKey: "ProductID",
})
FeedBack.belongsTo(User, {
      foreignKey: "UserID",
})
FeedBack.belongsTo(Product, {
      foreignKey: "ProductID",
})
Product.belongsTo(TypeProduct, {
      foreignKey: "TypeProductID",
})
Product.belongsTo(Color,{
      foreignKey: "ColorID",
})
Product.belongsTo(Supplier,{
      foreignKey: "SupplierID"
}
)

// Kết nối database
const sequelize = require('./utils/db')

sequelize.sync().then(() => console.log('connect database success')).catch(err => {
      console.log('connect databas fail', err)
})

// parse application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended: false }))

// parse application/json
app.use(bodyParser.json())
// Cấu hình đường dẫn tĩnh
app.use(express.static('public'))


// Gọi ejs

app.set('view engine', 'ejs')
app.use('/color',colorRoutes)
app.use('/user', userRoutes)
app.use('/role',roleRoutes)
app.use('/product', productRoutes);

app.listen(port, function () { console.log("Server Opened ", port) })