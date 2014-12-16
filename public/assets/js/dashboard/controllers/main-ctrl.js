angular.module('Dashboard')
    .controller('MainCtrl', [
    	'$scope', 
    	'$rootScope', 
    function ($scope, $rootScope){
        $rootScope.subtitle = 'Dashboard';

    }]);
