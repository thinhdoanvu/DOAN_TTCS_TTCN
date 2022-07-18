const express = require('express')
const router = express.Router();
const color = require('../controllers/color')

router.route('/').get(color.getAllColor)

router.route('/:id')
.get(color.getColor)
.delete(color.deleteColor)

module.exports = router
