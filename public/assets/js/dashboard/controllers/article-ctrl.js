
/**
 * Artíulo Controller
 */

angular.module('Dashboard')
    .controller('ArticleCtrl', ['$scope', '$rootScope', 'Article', '$location', '$modal',
        function ($scope, $rootScope, Article, $location, $modal){

        // Obtengo todos los articles
        $scope.articles = Article.query(function (){
            // Inicializo el paginador
            updatePaginator();
            setShowStatus();
            $scope.showLoading = false;
        });

        $scope.showLoading = true;
        $rootScope.subtitle = 'Artículos';

        // $rootScope.$emit('notification', 'Error al traer la información!');


        // Filter
        $scope.predicate = 'id';
        $scope.reverse = false;


        ////////////////
        // Paginación //
        ////////////////

         $scope.currentPage = 1
       , $scope.maxSize = 5
       , $scope.itemsPerPage = 5;

        // Función para definir el tamaño de los elementos del pagionador
        function setTotalItems(total) {
            $scope.totalItems = total;
        };

        function updatePaginator(){
            setTotalItems($scope.articles.length);
            $scope.pageChanged();
        }

       // Función para actualizar la página actual del paginador
        $scope.setPage = function (pageNo) {
            $scope.currentPage = pageNo;
        };


        // Evento que se ejecuta al recibir un cambio de página
        $scope.pageChanged = function() {};

        // On update filter
        $scope.catchData = function (filteredData) {
            setTotalItems(filteredData.length);
            return filteredData;
        }

        // Eliminar Elemento
        function removeElement(id){
            $scope.articles = _.reject($scope.articles, function (item){
                return item.id == id;
            });
        }

        ///////////////
        // Funciones //
        ///////////////

        function setShowStatus(){
            $scope.articles = _.map($scope.articles, function (article){
                article.show = true;
                return article; 
            });
        }

        ///////////////////
        // Eventos Vista //
        ///////////////////

        $scope.hover = function(article) {
            // Shows/hides the delete button on hover
            return article.show = ! article.show;
        };

        // Función evento para ver la información completa del registro seleccionado
        $scope.loadView = function(e, id){
            e.stopPropagation();
            $location.path('/article/'+ id +'/view');
        };

        // Función evento para ver el registro seleccionado
        $scope.onEdit = function(e, id){
            e.stopPropagation();
            $location.path('/article/'+ id +'/edit')
        };

        // Función evento para cuando se desea eliminar un registro
        $scope.onDelete = function(e, id){
            e.stopPropagation();

            swal({
                title: "Eliminar Artículo",
                text: "¿Está seguro que desea eliminar el artículo?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sí, eliminar!",
                cancelButtonText: "No, cancelar!",
                closeOnConfirm: false,
                closeOnCancel: true
            }, function(isConfirm){
                if (isConfirm) {
                    var article = Article.get({ id: id}, function (a){
                        if(article){
                            article.$delete(function (data){
                                if(data.success){
                                    removeElement(id);
                                    swal("Eliminado!", "La actividad se ha eliminado correctamente", "success");
                                }else
                                    swal("Oops...", "Problema al eliminar el artículo", "error");
                            }, function (err){
                                console.log(err);
                                if(err.errors)
                                    swal("Oops...", err.errors, "error");
                                else
                                    swal("Oops...", "Problema con el servidor", "error");
                            });
                        }else
                            swal("Oops...", "No se encontró el artículo", "error");
                    });
                }
            });


        };

    }]);




/////////////////////
// View Controller //
/////////////////////

angular.module('Dashboard')
    .controller('ArticleViewCtrl', ['$scope', '$rootScope', '$routeParams', '$location', 'Article', function ($scope, $rootScope,  $routeParams, $location, Article){

        // Obtengo la información del elemento seleccionado
        $scope.article = Article.get({ id: $routeParams.id}, function (){
            $scope.showLoading = false;
            $rootScope.subtitle = 'Artículo / '+ $scope.article.title;
        });

        $scope.showLoading = true;

        $rootScope.subtitle = 'Artículo / ';

        ///////////////////
        // Eventos Vista //
        ///////////////////

        // Evento para retornar a la vista inicial
        $scope.volver = function (){
            $location.path('/article');
        };

    }]);




////////////////////
// New Controller //
////////////////////

angular.module('Dashboard')
    .controller('ArticleCreateCtrl', ['$scope', '$rootScope', '$location', 'Article', function ($scope, $rootScope, $location, Article){

        $rootScope.subtitle = 'Nuevo Artículo';

        // Creo una nueva instancia del model
        $scope.article = new Article();

        // Error del formulario
        $scope.showError = false;
        $scope.b = {
            errors: {}
        };

        ///////////////////
        // Eventos Vista //
        ///////////////////

        // On Submit
        $scope.submit = function (){
            $scope.showError = false;

            if($scope.form.$valid){
                $scope.article.$save(function (data){
                    swal("Creado!", "El artículo se ha creado exitosamente.", "success");
                    $location.path('/article');
                }, function (err){
                    // console.log(err);

                    $scope.showError = true;
                    $scope.b.errors = err.data.errors;

                    for(var e in $scope.b.errors){
                        if($scope.form[e])
                            $scope.form[e].$setValidity('backend', false);
                    }

                });
            }

        };

        // Evento para volver a la vista principal
        $scope.volver = function (){
            $location.path('/article');
        };

    }]);


/////////////////////
// Edit Controller //
/////////////////////

angular.module('Dashboard')
    .controller('ArticleEditCtrl', ['$scope', '$rootScope', '$location', 'Article', '$routeParams', function ($scope, $rootScope, $location, Article, $routeParams){

        console.log($scope);

        // Obtengo el artículo para editar
        $scope.article = Article.get({ id: $routeParams.id}, function (){
            $scope.showLoading = false;
            $rootScope.subtitle = 'Artículo / '+ $scope.article.title;
        });

        $scope.showLoading = true;
        $rootScope.subtitle = 'Artículo / ';

        ///////////////////
        // Eventos Vista //
        ///////////////////

        // On Submit
        $scope.submit = function (){
            $scope.article.$update(function (){
                swal("Actializado!", "El artículo se ha actualizado correctamente.", "success");
                $location.path('/article');
            }, function (err){
                if(err.errors)
                    swal("Oops...!", err.errors, "error");
                else
                    swal("Oops...!", "Error con el servidor.", "error");
            });
        };

        // Evento para volver a la vista principal
        $scope.volver = function (){
            $location.path('/article');
        };

    }]);
