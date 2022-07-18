const express = require('express')
const router = express.Router();
const user = require('../controllers/user')

router
      .route('/')
      .get(user.getAllUser)
      .post(user.createUser)
router.route('/login').post(user.Login)
router.route('/:id')
      .get(user.getUser)
      .patch(user.updateUser)
      .delete(user.deleteUser)


module.exports = router
