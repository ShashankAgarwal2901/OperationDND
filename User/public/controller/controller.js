var app = angular.module('MyApp' , []);

app.controller('MainController' ,['$scope' , '$http' , function($scope , $http ){
	console.log("Controller is working")	 /*ANGULAR PROBLEMS*/
	var checked =false;
	$scope.details={PhoneNumber:"",
					Password:""};
	/*$scope.response=[String,String];*/
	$scope.loginattempt = function(){
		console.log("Button clicked");
		$http.post('/button' , $scope.details).success(function(data ,err){
					if (data==$scope.details.PhoneNumber){
						console.log("Correct info");
						if(checked==0){
						$scope.messageA='User exists';
						checked=true;
						}}
					
					if (data=='Incorrect'){
										$scope.messageB = 'Incorrect username or password';
										}
					
					else if(data=='no such user'){
						console.log("New")
						$(".Login").prepend('<h4> No such User detected , Sign up ! </h4>').hide().fadeIn('slow');
						$scope.details.email="";
						$scope.details.Password="";
						$scope.details.ConfirmPassword="";
					} ;
				});}
}]);