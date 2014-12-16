/**
 * Master Controller
 */
angular.module('Dashboard')
    .controller('MasterCtrl', ['$scope', '$rootScope', '$cookieStore', '$http' , MasterCtrl])
    .run(['$location', '$rootScope', function($location, $rootScope) {
        $rootScope.$on('$routeChangeSuccess', function (event, current, previous) {
            $rootScope.title = current.$$route.title;
        });
    }]);

function MasterCtrl($scope, $rootScope, $cookieStore, $http) {

    // Notificaciones
    $scope.notifications = [];

    $rootScope.$on('notification', function (e, not){
        console.log(e, not);
        $scope.notifications.push({'message': not});
    });

    /**
     * Get Menu
     */

    $scope.predicate = "order";
    $scope.menuDash = [];
    $scope.showLoading = true;

    $http({method: 'GET', url: '/b/menu'}).
        success(function(data, status, headers, config) {
            $scope.menuDash = data;
            $scope.showLoading = false;
        }).
        error(function(data, status, headers, config) {
         console.log(data, status);
        });


    /**
     * Sidebar Toggle & Cookie Control
     *
     */
    var mobileView = 992;

    $scope.getWidth = function() { return window.innerWidth; };

    $scope.$watch($scope.getWidth, function(newValue, oldValue)
    {
        if(newValue >= mobileView)
        {
            if(angular.isDefined($cookieStore.get('toggle')))
            {
                if($cookieStore.get('toggle') == false)
                {
                    $scope.toggle = false;
                }
                else
                {
                    $scope.toggle = true;
                }
            }
            else
            {
                $scope.toggle = true;
            }
        }
        else
        {
            $scope.toggle = false;
        }

    });

    $scope.toggleSidebar = function(e)
    {
        e.preventDefault();
        $scope.toggle = ! $scope.toggle;

        $cookieStore.put('toggle', $scope.toggle);
    };

    window.onresize = function() { $scope.$apply(); };
}
