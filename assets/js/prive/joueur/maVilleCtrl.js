app.controller('maVilleCtrl',function($scope, $http,$timeout, $routeParams){

$scope.site = base_url;
$scope.listeBatiments = true;
$scope.actionsBatiment = false;

$scope.ressourcesInsuffisantes = false;

/******************************************************************************
      // récupération des infos de l'utilisateur la ville du joueur
******************************************************************************/

   $scope.affichageInfos=function(){
    $http({
      method: 'POST',
      url: base_url+'joueur/infosMaVille',
      data: {'idVille' : $routeParams.id },
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    }).
    success(function(response) {
     
   console.log(response);

   $scope.infosGenerales =response.infosGenerales;
   $scope.batiments = response.batimentsVille;
   $scope.batimentsConstructibles = response.batimentsConstructibles;
        
    }).
    error(function(response) {
        $scope.codeStatus = response || "Request failed";
        //console.log(response);
    });
    return false;
};




   angular.element(document).ready(function () {


$scope.affichageInfos();
  


});



/******************************************************************************
     Affichage d'un batiment en vue d'effectuer une action
******************************************************************************/


   $scope.afficherBatiment=function(idVilleBatiment){

    $http({
      method: 'POST',
      url: base_url+'batiment/afficherBatiment',
      data: {'idVilleBatiment' : idVilleBatiment},
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    }).
    success(function(response) {

      console.log(response);
     
   $scope.coutsAmelioration = response.coutAmelioration;
   $scope.infosBatiment = response.infosBatiment;  

  $scope.listeBatiments = false;
  $scope.actionsBatiment = true;

    }).
    error(function(response) {
        $scope.codeStatus = response || "Request failed";
        
        //console.log(response);
    });
    return false;

};
  


/******************************************************************************
     Améioration du niveau d'un batiment
******************************************************************************/

   $scope.ameliorerBatiment=function(idVilleBatiment){

        $scope.ressourcesInsuffisantes = false;

    $http({
      method: 'POST',
      url: base_url+'batiment/ameliorerBatiment',
      data: {'idVilleBatiment' : idVilleBatiment},
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    }).
    success(function(response) {
     
    console.log(response);

    if(response == false)
    {
      $scope.ressourcesInsuffisantes = true;

    }else{

   $scope.infosGenerales.nombreBoisVille = response.boisRestant;
   $scope.infosGenerales.nombreFerVille = response.ferRestant;
   $scope.infosGenerales.nombrePierreVille = response.pierreRestant;
   $scope.infosGenerales.nombreNourritureVille = response.NourritureRestant;   

   $scope.afficherBatiment(idVilleBatiment);
   $scope.affichageInfos();

    }

        
    }).
    error(function(response) {

        $scope.codeStatus = response || "Request failed";
        //console.log(response);
    });
    return false;

};




});




