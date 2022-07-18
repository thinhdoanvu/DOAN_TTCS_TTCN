const { DataTypes } = require('sequelize');
const sequelize = require('../utils/db')

const Supplier = sequelize.define('supplier', {
      id: {
            type: DataTypes.INTEGER,
            allowNull: false,
            autoIncrement: true,
            primaryKey: true
      },
      NameSupplier: {
            type: DataTypes.STRING
      },
      Email: {
            type: DataTypes.STRING
      },
      Adress : {
            type: DataTypes.STRING
      },
      Phone:{
            type: DataTypes.STRING
      }
}
);
module.exports = Supplier