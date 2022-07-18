const Order = require('../models/Order')

exports.getAllOrder = async (req, res) => {
  const order = await Order.findAll({
      where: req.query
  })

  res.json({
      data: {docs: order}
  })
}

exports.getOrder = async (req, res) => {
      const id = req.params.id
      const order = await Order.findOne({
          where: {id: id}
      })
    
      res.json({
          data: {docs: order}
      })
    }

exports.deleteOrder = async (req, res) => {
      const id = req.params.id
      const order = await Order.findOne({
            where: {id: id}
      })
      order.destroy();
      res.json({
            data: {docs: order}
      })
}




