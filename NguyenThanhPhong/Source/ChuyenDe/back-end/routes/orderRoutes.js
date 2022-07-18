const express = require('express')
const router = express.Router();
const order = require('../controllers/order')

router.route('/').get(order.getAllOrder)

router.route('/:id')
.get(order.getOrder)
.delete(order.deleteOrder)

module.exports = router
