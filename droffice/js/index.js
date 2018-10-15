angular.module('ionicApp', ['ionic'])

.config(function($stateProvider, $urlRouterProvider) {

  $stateProvider
    .state('eventmenu', {
      url: "/event",
      abstract: true,
      templateUrl: "templates/event-menu.html"
    })
    .state('eventmenu.inicio', {
      url: "/inicio",
      views: {
         'menuContent' :{
          templateUrl: "templates/inicio.html"
        }
      }
    })
    .state('eventmenu.personas',{
      url: "/personas",
      views: {
         'menuContent' :{
          templateUrl: "templates/personas.html"
        }

      }



    })
    .state('eventmenu.roles',{
      url: "/roles",
      views: {
         'menuContent' :{
          templateUrl: "templates/roles.html"
        }

      }



    })


  $urlRouterProvider.otherwise("/event/inicio");
})
