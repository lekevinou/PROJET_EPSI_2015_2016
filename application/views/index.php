<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  

    <title>Stumps</title>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.3/angular.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.3/angular-route.min.js"></script>
 

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


<!-- Latest compiled and minified BOOTSTRAP CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">



<link rel="stylesheet" href="<?php echo base_url('assets/css/accueilPublic.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/menu.css'); ?>" />

<script>
      var site_url="http://localhost/stumps/";
      var base_url="http://localhost/stumps/";
    </script> 

</head>
<body ng-app="stumps-app" class="body-log" ng-controller="cfgController" id="formu">
<div ng-show="overlay.getVisible()" class="overlay"></div>


<header>
  <nav class="wrapper_site  ">
      <div class="col-xs-12 no-padding">
          <!--<div class="container">-->
          <div class="logo-top col-xs-3">
            <a href="#">
              <h2 style="color: white;">STUMPS</h2>
            </a>

          </div>
            <div id="navbar" class=" col-xs-9">
              
              <ul class="menu-top">
                                   
                  <?php if($this->session->userdata('id_joueur') != NULL){?>               
                      <li><a style="color: white;" href="#/moi" >Moi</a></li>                                     
                      <li><a href="#/ville" style="color: white;" >Ville</a></li>
                      <li ><a href="#/" >blabla</a></li>
                      <li><a href="<?php echo base_url('connexion/deconnexion')?>" class="desd">Déconnexion</a></li>
                  <?php }else{ ?>


                      <div class="connection_header col-xs-12">
                         <div class="form-group col-xs-5" >
                           <label>Pseudo :</label>
                           <input  ng-required=""  id="pseudo" type="pseudo" class="form-control" name="pseudo" ng-model="connexionPseudo"/>
                         </div>

                         <div class="form-group col-xs-5" >
                           <label>Mot de passe :</label>
                           <input  ng-required="" type="password" class="form-control" name="password" ng-model="connexionPassword"/>
                         </div>
                         
                         <button type="button" ng-click="connexion()" class="btn btn-primary col-xs-2">Connexion</button>
                   </div>

                  <?php } ?>

                              
              </ul>
            </div>
          <!--</div>-->
          </div>
        </nav>

      </header>             
    <div class="content">
      <div class="titre_qui_suis_je">
        <div class="container_titre wrapper_site">
          <h3  class="titrePage"> {{titrePage.getTitre()}}</h3> <img ng-src="{{logoFilleGarcon}}" />
        </div>
      </div>
      <div ng-view class="animated fadeIn"></div>
    </div>
  




</body>
</html>


<script type="text/javascript">
  var app=angular.module('stumps-app',['ngRoute']);



app.config(function($routeProvider){

    var connecte = '<?php echo $this->session->userdata("id_joueur");?>';

      $routeProvider
          .when('/',{
                templateUrl: '<?php echo base_url('assets/views/public/accueil.html');?>', controller:'accueilCtrl',
          })      
          .when('/moi',{
                templateUrl: '<?php echo base_url('assets/views/prive/joueur/accueilJoueur.html');?>', controller:'accueilJoueurCtrl',
                resolve:{function($location){if(connecte === ""){window.location.href = base_url;}}}                 
          })
          .when('/ville/:id',{
                templateUrl: '<?php echo base_url('assets/views/prive/joueur/maVille.html');?>', controller:'maVilleCtrl',
                resolve:{function($location){if(connecte === ""){window.location.href = base_url;}}}                  
          })

          .otherwise({redirectTo: '/'});


});

app.controller('cfgController',function($scope,$location,$http, $window){



/******************************************************************************
      // Fonction connexion depuis le header
******************************************************************************/

   $scope.connexion=function(){
    
    var FormData = {    
      'pseudo' : $scope.connexionPseudo,
      'password' : $scope.connexionPassword
    };


    console.log(FormData);

    $http({
      method: 'POST',
      url: base_url+'connexion/connexion',
      data: FormData,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    }).
    success(function(response) {
     
   console.log(response);

    if(response == 'ok')
     {
      $window.location.href = base_url+'connexion';
     }else{
      alert('Mauvais identifiants');
     }

        
    }).
    error(function(response) {
        $scope.codeStatus = response || "Request failed";
        //console.log(response);
    });
    return false;


}

    });





</script>



<script src="<?php echo base_url('assets/js/public/accueilCtrl.js');?>"></script>
<script src="<?php echo base_url('assets/js/prive/joueur/accueilJoueurCtrl.js');?>"></script>
<script src="<?php echo base_url('assets/js/prive/joueur/maVilleCtrl.js');?>"></script>