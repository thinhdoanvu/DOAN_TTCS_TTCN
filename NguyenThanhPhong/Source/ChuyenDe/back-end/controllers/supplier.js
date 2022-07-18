const Supplier = require('../models/Supplier')

exports.getAllSupplier = async (req, res) => {
  const supplier = await Supplier.findAll({
      where: req.query
  })

  res.json({
      data: {docs: supplier}
  })
}

exports.getSupplier = async (req, res) => {
      const id = req.params.id
      const order = await Supplier.findOne({
          where: {id: id}
      })
    
      res.json({
          data: {docs: supplier}
      })
    }

exports.deletesupplier = async (req, res) => {
      const id = req.params.id
      const order = await Order.findOne({
            where: {id: id}
      })
      order.destroy();
      res.json({
            data: {docs: supplier}
      })
}




