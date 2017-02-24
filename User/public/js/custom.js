$(document).ready(function(){
	$('#SignUp').click(function(){
		$.post('/SignUp' , {data:'SignUp'} , function(data){
			$('body').load('SignIn.html');
		});
	}) 
	$('#SignIn').click(function(){
		$.post('/SignIn' , {data:'SignIn'} , function(data){
			$('body').load('SignIn.html');
		});
	})
	$('#submit').click(function(){
		alert($('#test').val());
	})
	
})