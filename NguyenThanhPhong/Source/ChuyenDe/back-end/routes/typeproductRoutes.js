const express = require('express')
const router = express.Router();
const typeproduct = require('../controllers/typeproduct')

router.route('/').get(typeproduct.getAllTypeProduct)

router.route('/:id')
.get(typeproduct.getTypeProduct)
.delete(typeproduct.deleteTypeProduct)

module.exports = router
