const express = require('express')
const router = express.Router();
const feedBack = require('../controllers/feedback')

router.route('/').get(feedBack.getAllFeedBack)

router.route('/:id')
.get(feedBack.getFeedBack)
.delete(feedBack.deleteFeedBack)

module.exports = router
