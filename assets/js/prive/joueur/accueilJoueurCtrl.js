app.controller('accueilJoueurCtrl',function($scope, $http,$timeout){

$scope.site = base_url;

   angular.element(document).ready(function () {



/******************************************************************************
     	// récupération des infos de l'utilisateur
******************************************************************************/

	$http.get(base_url+'joueur/infosAccueil').success(function(response){ 

			console.log(response);

			$scope.mesInfos = response.infosGenerales;
			$scope.mesVilles = response.villesJoueur;

			console.log($scope.mesInfos);
	});

});

});