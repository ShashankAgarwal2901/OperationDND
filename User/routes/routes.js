
var body = require('body-parser');


module.exports = function(app){
	app.post('/UserPanel' , function(req,res){
		console.log(req.data);
		res.sendfile('public/UserPanel');
	})
}


