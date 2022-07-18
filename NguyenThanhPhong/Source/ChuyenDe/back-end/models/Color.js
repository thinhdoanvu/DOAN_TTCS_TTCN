const { DataTypes } = require('sequelize');
const sequelize = require('../utils/db')

const Color = sequelize.define('color', {
      id: {
            type: DataTypes.INTEGER,
            allowNull: false,
            autoIncrement: true,
            primaryKey: true
      },
      NameColor: {
            type: DataTypes.STRING
      },
}
);
module.exports = Color