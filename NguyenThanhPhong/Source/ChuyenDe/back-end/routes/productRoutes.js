const express = require('express')
const router = express.Router();
const product = require('../controllers/product')

router
      .route('/')
      .get(product.getAllProduct)
router.route('/:id')
      .get(product.getProduct)
      .delete(product.deleteProduct)

module.exports = router
