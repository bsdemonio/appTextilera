var phonecatApp = angular.module('phonecatApp', ['ngSanitize']);

phonecatApp.controller('ContentDCCCtrl', ['$scope','$http', function($scope,$http) {
  //$scope.templateNameVariable ="s";
  $http({method: 'GET', url: '/index/index'}).
    success(function(data, status, headers, config) {
      $scope.contentMenuSelected=data.MSG;
    }).
    error(function(data, status, headers, config) {
      alert('something went wrong');
    });
    
    
 }]);