const { DataTypes } = require('sequelize');
const sequelize = require('../utils/db')

const OrderDetail = sequelize.define('orderdetail', {
      id: {
            type: DataTypes.INTEGER,
            allowNull: false,
            autoIncrement: true,
            primaryKey: true
      },
      OrderID: {
            type: DataTypes.INTEGER
      },
      ProductID: {
            type: DataTypes.INTEGER
      },
      Name: {
            type: DataTypes.STRING
      },
      Quantity : {
            type: DataTypes.INTEGER
      },
      Price: {
            type: DataTypes.FLOAT
      }
}
);
module.exports = OrderDetail