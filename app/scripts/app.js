'use strict';

/**
 * @ngdoc overview
 * @name normliV2App
 * @description
 * # normliV2App
 *
 * Main module of the application.
 */
angular
  .module('normliV2App', [
    'ngAnimate',
    'ngCookies',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch',
    'ngAria',
    'ngMaterial'
  ])
  .config(function ($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'views/main.html',
        controller: 'MainCtrl'
      })
      .when('/about', {
        templateUrl: 'views/about.html',
        controller: 'AboutCtrl'
      })
      .when('/contact', {
        templateUrl: 'views/contact.html',
        controller: ''
      })
      .otherwise({
        redirectTo: '/'
      });
  });
