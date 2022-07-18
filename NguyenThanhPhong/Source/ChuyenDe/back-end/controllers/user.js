const User = require('../models/User')
const Role = require('../models/Role')

exports.getAllUser = async (req, res) => {
    const docs = await User.findAll({
      include: {
          model: Role,
          attributes: ['RoleName']
      }
    });
    res.json({
        data: {docs}
    })
  }
exports.getUser = async (req, res) => {
    const id = req.params.id
    const user = await User.findOne({
        where: { id: id }
    })
    res.json({
        data: { docs: user }
    })
}
exports.createUser = async (req, res) => {
    const doc = await User.create(req.body);
    res.json({
        data: { doc },
    });
};

exports.updateUser = async (req, res) => {
    const id = req.params.id;
    const doc = await User.findOne({
        where: { id: id },
    });

    doc.FullName = req.body.FullName;
    doc.Phone = req.body.Phone;
    doc.Email = req.body.Email;
    doc.Address = req.body.Address;
    doc.Password = req.body.Password;
    doc.RoleID = req.body.RoleID;
    doc.save()

    res.json({
        data: { doc: doc },
    });
};
exports.Login = async (req,res) =>{
    const {Email, Password} = req.body
    const doc = await User.findOne({
        where: { Email: Email, Password: Password}
    })
    res.json({
        data: {doc: doc ? doc : 0 }
    })
}

exports.deleteUser = async (req, res) => {
    const id = req.params.id;
    const nhaCungCap = await User.findOne({
        where: { id: id },
    });
    nhaCungCap.destroy();
    const doc = await User.findOne({
        where: { id: id },
    });
    res.json({
        data: { doc: doc ? 0 : id },
    });
};




