const Color = require('../models/Color')

exports.getAllColor = async (req, res) => {
  const color = await Color.findAll({
      where: req.query
  })

  res.json({
      data: {docs: color}
  })
}

exports.getColor = async (req, res) => {
      const id = req.params.id
      const color = await Color.findOne({
          where: {id: id}
      })
    
      res.json({
          data: {docs: color}
      })
    }

exports.deleteColor = async (req, res) => {
      const id = req.params.id
      const color = await Color.findOne({
            where: {id: id}
      })
      color.destroy();
      res.json({
            data: {docs: color}
      })
}




