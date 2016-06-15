app.controller('accueilCtrl',function($scope, $http,$timeout, $location, $window){




/******************************************************************************
     Fonction inscription de la page d'accueil
******************************************************************************/

   $scope.inscription=function(){
    
    var FormData = {    
      'pseudo' : $scope.inscriptionPseudo,
      'email' : $scope.inscriptionEmail,
      'password' : $scope.inscriptionPassword,
      'repeatPassword' : $scope.inscriptionRepeatPassword
    };


    console.log(FormData);


    $http({
      method: 'POST',
      url: base_url+'inscription/inscription',
      data: FormData,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    }).
    success(function(response) {
     
   console.log(response);

     if(response == 'ok')
     {
      $window.location.href = base_url+'connexion';
     }
        
    }).
    error(function(response) {
        $scope.codeStatus = response || "Request failed";
        //console.log(response);
    });
    return false;

}



});