const express = require('express')
const router = express.Router();
const supplier = require('../controllers/supplier')

router.route('/').get(supplier.getAllSupplier)

router.route('/:id')
.get(supplier.getSupplier)
.delete(supplier.deleteSupplier)

module.exports = router
