const express = require('express')
const router = express.Router();
const role = require('../controllers/role')

router.route('/').get(role.getAllRole)

router.route('/:id')
.get(role.getRole)
.delete(role.deleteRole)

module.exports = router
