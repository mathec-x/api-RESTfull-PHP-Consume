var app = angular.module('scotchApp', ['ngRoute', 'ngAnimate']);

//ROUTING # Pess

app.config(function($routeProvider){

	$routeProvider
	
		.when('/',{
			templateUrl : "views/home/startScreen.ui.php",
			controller: "mainController"
		})
	
		.when('/aplication',{
			templateUrl : "views/veiculos/view.ui.php",
			controller: "veicController"
		})
});

app.controller("mainController", function() {
});


app.controller("veicController", function($scope, $http) {
	$("#listaPartial").load('preloaderSmall.html', function(){
		$("#listaPartial").load('views/veiculos/partialView.ui.php');
	});

	remove =  function(val){
		$.ajax({
			url: 'views/veiculos/partialView.ui.php',
			type: 'POST',
			data: {
				delete : val,
			},
			success: function(data){
				$("#listaPartial").html(data);
			}
		})
}

    $http.get("services/get/veiculos/")
    .then(function(response) {
        console.log(response);
        $scope.list = response.data;
    });
    
});
