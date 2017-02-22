var express = require('express');
var $ = require('jQuery');
var connect = require('connect');

var app = express();
var port = process.env.port||8080;
app.use(express.static(__dirname + '/public'));
app.use(connect.urlencoded());
app.use(connect.json());
require('./routes/routes.js')(app);


app.listen(port);
console.log("server is running on port "+ port);