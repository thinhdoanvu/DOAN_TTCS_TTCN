const { DataTypes } = require('sequelize');
const sequelize = require('../utils/db')

const Role = sequelize.define('role', {
      id: {
            type: DataTypes.INTEGER,
            allowNull: false,
            autoIncrement: true,
            primaryKey: true
      },
      RoleName: {
            type: DataTypes.STRING
      },
}
);
module.exports = Role