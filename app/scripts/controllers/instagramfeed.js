'use strict';

/**
 * @ngdoc function
 * @name normliV2App.controller:InstagramfeedCtrl
 * @description
 * # InstagramfeedCtrl
 * Controller of the normliV2App
 */
angular.module('normliV2App')
  .controller('InstagramfeedCtrl', function ($scope,instagram,$log) {
    var payload = {
      count:30
    };

    $scope.pics =[];
    $scope.showMore=false;
    $scope.searchTerm ='';

    $scope.getMore = function(){
      instagram.mostRecent(payload,
        function success(response){
          if(response.pagaination){
          payload.max_id = response.pagination.next_max_id || null;
          }
          angular.forEach(response.data,function(item){
            if($scope.searchTerm && (item.tags.indexOf($scope.searchTerm) >-1)){
              $scope.pics.push(item);
            }
            else if(!$scope.searchTerm){
              $scope.pics.push(item);
            }
          });
          //todo: Somehow filter server side so we know if there are more
          $scope.showMore=$scope.pics.length>0;
          $log.debug("show more: ",$scope.showMore);

          $log.warn(response)
        },
        function error(error){
          throw new Error(error);
        }
      );
    };

    $scope.search = function(){
      $scope.pics =[];
      payload.max_id = null;
      $scope.getMore();
    };

    $scope.search();

  });
