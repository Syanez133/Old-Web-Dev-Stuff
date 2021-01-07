var express = require('express');
var router = express.Router();
var datafile = require('../dataf.json');

/* GET home page. */
router.get('/', function (req, res, next) {
    res.render('data', {title: 'Data', name: 'Data',dataf:datafile});
});

module.exports = router;