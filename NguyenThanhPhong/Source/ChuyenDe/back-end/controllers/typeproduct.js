const TypeProduct = require('../models/TypeProduct')

exports.getAllTypeProduct = async (req, res) => {
  const role = await TypeProduct.findAll({
      where: req.query
  })

  res.json({
      data: {docs: role}
  })
}

exports.getTypeProduct = async (req, res) => {
      const id = req.params.id
      const role = await TypeProduct.findOne({
          where: {id: id}
      })
    
      res.json({
          data: {docs: role}
      })
    }

exports.deleteTypeProduct = async (req, res) => {
      const id = req.params.id
      const role = await TypeProduct.findOne({
            where: {id: id}
      })
      role.destroy();
      res.json({
            data: {docs: role}
      })
}




