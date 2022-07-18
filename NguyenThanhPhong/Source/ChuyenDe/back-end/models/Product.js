const { DataTypes } = require('sequelize');
const sequelize = require('../utils/db')

const Product = sequelize.define('product', {
      id: {
            type: DataTypes.INTEGER,
            allowNull: false,
            autoIncrement: true,
            primaryKey: true
      },
      Name: {
            type: DataTypes.STRING
      },
      Size: {
            type: DataTypes.STRING
      },
      Amount:{
            type: DataTypes.INTEGER
      },
      Price: {
            type: DataTypes.FLOAT
      },
      Image: {
            type: DataTypes.STRING
      },
      Type: {
            type: DataTypes.BOOLEAN
      },
      Description: {
            type: DataTypes.STRING
      },
      Discount : {
            type: DataTypes.FLOAT
      },
      TypeProductID:{
            type: DataTypes.INTEGER
      },
      ColorID:{
            type: DataTypes.INTEGER
      },
      SupplierID: {
            type: DataTypes.INTEGER 
      }

}
);
module.exports = Product