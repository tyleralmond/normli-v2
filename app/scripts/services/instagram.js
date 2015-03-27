'use strict';

/**
 * @ngdoc service
 * @name normliV2App.instagram
 * @description
 * # instagram
 * Factory in the normliV2App.
 */
// angular.module('normliV2App')
//   .factory('instagram', function () {
//     // Service logic
//     // ...

//     var meaningOfLife = 42;

//     // Public API here
//     return {
//       someMethod: function () {
//         return meaningOfLife;
//       }
//     };
//   });



angular.module('normliV2App')
  .factory('instagram', function($resource) {
    // Service logic
    // ...

  return {
    fetchUser: function(callback){

      // The ngResource module gives us the $resource service. It makes working with
      // AJAX easy. Here I am using the client_id of a test app. Replace it with yours.

      // https://api.instagram.com/v1/users/{user-id}/media/recent/?access_token=ACCESS-TOKEN
      // https://api.instagram.com/v1/users/{user-id}/media/recent/?client_id=YOUR-CLIENT_ID
      var api = $resource('https://api.instagram.com/v1/users/30062308/media/recent/?client_id=:clientId&callback=JSON_CALLBACK',{
        userId: 30062308,
        accessToken: '30062308.086a543.11e4c8437be24cd4bbb02de70b3bf645',
        clientId: '086a5436cfd547a59c04dfa7933be3a0',
      },{
        // This creates an action which we've chosen to name "fetch". It issues
        // an JSONP request to the URL of the resource. JSONP requires that the
        // callback=JSON_CALLBACK part is added to the URL.

        fetch:{method:'JSONP'}
      });

      api.fetch(function(response){

        // Call the supplied callback function
        callback(response.data);

      });
    }
  };
});


// The controller. Notice that I've included our instagram service which we
// defined below. It will be available inside the function automatically.

function instagramFeed($scope, instagram){

  // Use the instagram service and fetch a list of the popular pics
  instagram.fetchUser(function(data){

    // Assigning the pics array will cause the view
    // to be automatically redrawn by Angular.
    $scope.pics = data;
  });

}