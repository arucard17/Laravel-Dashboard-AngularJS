
/**
 * Menú Controller
 */

appDash
    .controller('MenuCtrl', ['$scope', '$rootScope', '$modal', '$http'
        , function ($scope, $rootScope, $modal, $http){

            var originalMenu = [];
            $scope.menu = [];
            $scope._menu = {};
            $scope.title_menu = '';
            $scope.showNewTmpl = false;
            $scope.showSaveModMenu = false; // Variable que hará mostrar el botón para guardar la modificación de posiciones del menú

            $rootScope.subtitle = 'Menú';

            $scope.sortableOptions = {
                axis: 'y',
                stop: function(e, ui) {
                    console.log($scope.menu, originalMenu, _.isEqual($scope.menu, originalMenu));
                    if(!_.isEqual($scope.menu, originalMenu))
                        $scope.showSaveModMenu = true;
                    else
                        $scope.showSaveModMenu = false;
                 },
            };

            $http({method: 'GET', url: '/b/menu'}).
                success(function(data, status, headers, config) {

                    $scope.menu = _.deepClone(data);
                    originalMenu = _.deepClone(data);

                    updateParents();
                }).
                error(function(data, status, headers, config) {
                    console.log(data, status);
                });


            $scope.addMenu = function (e){
                e.preventDefault();
                $scope.showNewTmpl = true;
                $scope.title_menu = 'Nuevo Menú';
            };

            $scope.submit = function (){

                $http.post('/b/menu', $scope._menu).
                    success( function(data){

                        addElement(data);

                        $scope.showNewTmpl = false;
                        $scope.title_menu = '';
                        $scope._menu = {};
                    }).
                    error(function(data, status){
                        console.log(data, status)
                    });

            };

            function addElement(_menu){
                var menu = _.find($scope.menu, function (m){
                    return (_menu._id+"") == (m._id+"");
                });

                if(menu){
                    menu.submenus.push(_menu);
                }else
                    $scope.menu.push(_menu);

            };


            function updateParents() {
                $scope.parents = _.filter($scope.menu, function(item) {
                    return item.parent == null;
                });
            }


        }
    ]);
