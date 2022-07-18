const Product = require('../models/Product')
const TypeProduct = require('../models/TypeProduct')
const Color = require('../models/Color')
const Supplier = require('../models/Supplier')

exports.getAllProduct = async (req, res) => {
  const docs = await Product.findAll({
    include: [
      {
        model: Color,
        attributes: ["NameColor"],
      },
      {
        model: TypeProduct,
        attributes: ["TypeName"],
      },
      {
        model: Supplier,
        attributes: ["NameSupplier"],
      },
    ],
  });
  res.json({
    data: { docs }
  })
}
exports.getProduct = async (req, res) => {
  const id = req.params.id
  const product = await Product.findOne({
    where: { id: id }
  })

  res.json({
    data: { docs: product }
  })
}
exports.deleteProduct = async (req, res) => {
  const id = req.params.id
  const product = await Product.findOne({
    where: { id: id }
  })
  product.destroy();
  res.json({
    data: { docs: product }
  })
}
exports.createProduct = async (req, res) => {
  const doc = await User.create(req.body);
  res.json({
      data: { doc },
  });
};
exports.updateProduct = async (req, res) => {
  const id = req.params.id;
  const doc = await User.findOne({
      where: { id: id },
  });

  doc.Name = req.body.Name;
  doc.Size = req.body.Size;
  doc.Amount = req.body.Amount;
  doc.Price = req.body.Price;
  doc.Image = req.body.Image;
  doc.RoleID = req.body.RoleID;
  doc.save()

  res.json({
      data: { doc: doc },
  });
};



