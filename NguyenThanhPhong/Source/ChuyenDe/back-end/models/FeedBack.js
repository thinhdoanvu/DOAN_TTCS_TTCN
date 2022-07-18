const { DataTypes } = require('sequelize');
const sequelize = require('../utils/db')

const Order = sequelize.define('feedback', {
      id:{
            type: DataTypes.INTEGER,
            allowNull: false,
            autoIncrement: true,
            primaryKey: true
      },
      UserID: {
            type: DataTypes.INTEGER
      },
      ProductID: {
            type: DataTypes.INTEGER
      },
      Content: {
            type: DataTypes.STRING
      },
}
);
module.exports = Order