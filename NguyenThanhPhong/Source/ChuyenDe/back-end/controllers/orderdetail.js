const OrderDetail = require('../models/OrderDetail')

exports.getAllOrderDetail = async (req, res) => {
  const orderDetail = await OrderDetail.findAll({
      where: req.query
  })
  res.json({
      data: {docs: orderDetail}
  })
}

exports.getOrderDetail = async (req, res) => {
      const id = req.params.id
      const orderDetail = await OrderDetail.findOne({
          where: {id: id}
      })
    
      res.json({
          data: {docs: orderDetail}
      })
    }

exports.deleteOrderDetail = async (req, res) => {
      const id = req.params.id
      const orderDetail = await OrderDetail.findOne({
            where: {id: id}
      })
      orderDetail.destroy();
      res.json({
            data: {docs: orderDetail}
      })
}




