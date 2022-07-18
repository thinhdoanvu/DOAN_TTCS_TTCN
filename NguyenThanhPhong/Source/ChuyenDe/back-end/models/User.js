const { DataTypes } = require('sequelize');
const sequelize = require('../utils/db')

const User = sequelize.define('user', {
      id: {
            type: DataTypes.INTEGER,
            allowNull: false,
            autoIncrement: true,
            primaryKey: true
      },
      FullName: {
            type: DataTypes.STRING
      },
      Phone: {
            type: DataTypes.STRING
      },
      Email: {
            type: DataTypes.STRING
      },
      Address : {
            type: DataTypes.STRING
      },
      Password : {
            type: DataTypes.STRING
      },
      RoleID:{
            type: DataTypes.INTEGER
      }
}
);
module.exports = User