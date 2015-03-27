'use strict';

/**
 * @ngdoc service
 * @name normliV2App.instagram
 * @description
 * # instagram
 * Factory in the normliV2App.
 */
 angular.module('normliV2App')
   .factory('instagram', function ($resource) {
   // Public API here
     return $resource('https://api.instagram.com/v1/users/:userId/media/recent/?access_token=:accessToken&callback=JSON_CALLBACK',{},{
       mostRecent:{
         method:'JSONP',
         params:{
           accessToken: '30062308.086a543.11e4c8437be24cd4bbb02de70b3bf645',
           userId:'30062308'
         }
       }

     })

   });
