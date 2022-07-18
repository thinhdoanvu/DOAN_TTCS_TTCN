const express = require('express')
const router = express.Router();
const orderDetail = require('../controllers/orderdetail')

router.route('/').get(orderDetail.getAllOrderDetail)

router.route('/:id')
.get(orderDetail.getOrderDetail)
.delete(orderDetail.deleteOrderDetail)

module.exports = router
