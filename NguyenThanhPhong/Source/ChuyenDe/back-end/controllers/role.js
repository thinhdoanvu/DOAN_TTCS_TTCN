const Role = require('../models/Role')

exports.getAllRole = async (req, res) => {
  const role = await Role.findAll({
      where: req.query
  })

  res.json({
      data: {docs: role}
  })
}

exports.getRole = async (req, res) => {
      const id = req.params.id
      const role = await Role.findOne({
          where: {id: id}
      })
    
      res.json({
          data: {docs: role}
      })
    }

exports.deleteRole = async (req, res) => {
      const id = req.params.id
      const role = await Role.findOne({
            where: {id: id}
      })
      role.destroy();
      res.json({
            data: {docs: role}
      })
}




