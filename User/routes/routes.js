
var body = require('body-parser');


module.exports = function(app){
	app.post('/SignIn' , function(req,res){
		console.log(req.body.data);
		res.send('ok');
	})
	app.post('/SignUp' , function(req,res){
		console.log(req.body.data);
		res.send('ok');
	})
	app.post('/test') , function(req,res){
		console.log(req.body.data);
		res.send(req.body.data);
	}
}


