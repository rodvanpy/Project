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
    .state('eventmenu.usuarios',{
      url: "/usuarios",
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
    .state('eventmenu.paises',{
      url: "/paises",
      views: {
         'menuContent' :{
          templateUrl: "templates/paises.html"
        }

      }
    })
    .state('eventmenu.tipos-citas',{
      url: "/tipos-citas",
      views: {
         'menuContent' :{
          templateUrl: "templates/tiposCitas.html"
        }

      }
    })
    .state('eventmenu.estados-citas',{
      url: "/estados-citas",
      views: {
         'menuContent' :{
          templateUrl: "templates/estadosCitas.html"
        }

      }
    })
    .state('eventmenu.especialidades',{
      url: "/especialidades",
      views: {
         'menuContent' :{
          templateUrl: "templates/especialidades.html"
        }

      }
    })


  $urlRouterProvider.otherwise("/event/inicio");
})
