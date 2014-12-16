<div class="row animated fadeIn">
    <div class="col-lg-12">
        <div class="widget">
            <div class="widget-header">
                <i class="fa fa-flag"></i>Maestro Artículo<a href="#/article/new" class="btn btn-info btn-sm"><i class="fa fa-plus"></i></a>
                <input type="text" placeholder="Search" ng-model="search" class="col-lg-4 form-control input-sm pull-right">
                <div class="clearfix"></div>
            </div>
            <div class="widget-body no-padding static-height">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Titulo</th>
                                <th class="text-center">URL</th>
                                <th class="text-center">Texto</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <div ng-hide="showLoading">
                                <tr ng-repeat="article in catchData(filtered = (articles | filter:search)) | orderBy:predicate:reverse | offset:(currentPage-1)*itemsPerPage | limitTo: itemsPerPage" class="text-center tr-click" ng-click="loadView($event, article.id)" ng-mouseenter="hover(article)" ng-mouseleave="hover(article)" style="height:50px;">
                                    <td>@{{ article.title }}</td>
                                    <td>@{{ article.url }}</td>
                                    <td>@{{ article.text }}</td>
                                    <td class="actions" style="width:20%;">
                                        <button ng-show="article.show" ng-click="onEdit($event, article.id)" class="btn btn-info"><i class="fa fa-edit"></i></button>
                                        <button ng-show="article.show" ng-click="onDelete($event, article.id)" class="btn btn-info"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            </div>
                        </tbody>
                    </table>
                </div>
                <div ng-show="showLoading">
                    <rd-loading></rd-loading>
                </div>
            </div>
        </div>
        <pagination total-items="totalItems" items-per-page="itemsPerPage" max-size="maxSize" boundary-links="true" rotate="false" ng-model="currentPage" ng-change="pageChanged()" next-text="›" previous-text="‹" first-text="«" last-text="»"></pagination>
    </div>
</div>

<script id="tmplDelete" type="text/ng-template">
    <div class="modal-header">
        <h3 class="modal-title">Eliminar Artículo</h3>
    </div>
    <div class="modal-body">
        <p>¿Está seguro que quiere eliminar el registro?</p>
    </div>
    <div class="modal-footer">
        <button ng-click="cancel()" class="btn btn-default">Cancelar</button>
        <button ng-click="ok()" class="btn btn-info">Eliminar</button>
    </div>
</script>
