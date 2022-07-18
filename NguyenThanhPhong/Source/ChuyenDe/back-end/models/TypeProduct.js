const { DataTypes } = require('sequelize');
const sequelize = require('../utils/db')

const TypeProduct = sequelize.define('typeproduct', {
      id: {
            type: DataTypes.INTEGER,
            allowNull: false,
            autoIncrement: true,
            primaryKey: true
      },
      TypeName:{
            type: DataTypes.STRING
      }
}
);
module.exports = TypeProduct