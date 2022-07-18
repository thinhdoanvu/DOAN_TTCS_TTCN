const FeedBack = require('../models/FeedBack')

exports.getAllFeedBack = async (req, res) => {
  const feedBack = await FeedBack.findAll({
      where: req.query
  })

  res.json({
      data: {docs: feedBack}
  })
}

exports.getFeedBack = async (req, res) => {
      const id = req.params.id
      const feedBack = await FeedBack.findOne({
          where: {id: id}
      })
    
      res.json({
          data: {docs: feedBack}
      })
    }

exports.deleteFeedBack = async (req, res) => {
      const id = req.params.id
      const feedBack = await FeedBack.findOne({
            where: {id: id}
      })
      feedBack.destroy();
      res.json({
            data: {docs: feedBack}
      })
}




