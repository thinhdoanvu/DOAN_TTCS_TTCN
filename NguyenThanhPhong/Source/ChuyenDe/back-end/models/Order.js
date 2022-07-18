const { DataTypes } = require('sequelize');
const sequelize = require('../utils/db')

const Order = sequelize.define('order', {
      id: {
            type: DataTypes.INTEGER,
            allowNull: false,
            autoIncrement: true,
            primaryKey: true
      },
      OrderStatus: {
            type: DataTypes.STRING
      },
      Description: {
            type: DataTypes.STRING
      },
      UserID : {
            type: DataTypes.INTEGER
      },
}
);
module.exports = Order