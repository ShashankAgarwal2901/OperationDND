$(document).ready(function(){
	$('#SignIn').click(function(){
		$.post('UserPanel' , {data:'SignIn'} , function(data){
			alert(data);
		});
	})
})