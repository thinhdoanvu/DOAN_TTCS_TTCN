const { Sequelize } = require('sequelize');

const sequelize = new Sequelize('clothers_shop', 'root', '', {
      host: 'localhost',
      dialect: 'mysql',
      logging: false
});

module.exports = sequelize