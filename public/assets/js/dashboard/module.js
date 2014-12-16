var appDash = angular.module('Dashboard', [
    'ngCookies',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch',
    'ngAnimate',
    'ui.bootstrap',
    'ui.sortable'
]);


// Global Plugins 
appDash.run(function($rootScope) {
     $rootScope.dateToTime = function(str){
        var patt2 = /(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/g;
        var r = patt2.exec(str);
        return r ? new Date(r[1], r[2]-1, r[3], r[4], r[5], r[6], 0) : new Date(str);
    };

    $rootScope.subtitle = 'Dashboard';
 });