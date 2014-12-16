<div class="row">
    <div class="col-lg-8 center-col">
        <div class="widget">
            <div class="widget-header">@{{ article.name }}</div>
            <div class="widget-body no-height no-padding clearfix">
                <div ng-hide="showLoading">
                    <div class="col-lg-12 view-element">
                        <div class="group clearfix">
                            <label for="title" class="col-sm-3 control-label">Titulo</label>
                            <div class="col-sm-7">@{{ article.title }}</div>
                        </div>
                        <div class="group clearfix">
                            <label for="url" class="col-sm-3 control-label">URL</label>
                            <div class="col-sm-7">@{{ article.url }}</div>
                        </div>
                        <div class="group clearfix">
                            <label for="text" class="col-sm-3 control-label">Texto</label>
                            <div class="col-sm-7">@{{ article.text }}</div>
                        </div>
                        <div class="group form-btn clearfix">
                            <button type="button" ng-click="volver()" class="btn btn-info">Volver</button>
                        </div>
                    </div>
                </div>
                <div ng-show="showLoading">
                    <rd-loading></rd-loading>
                </div>
            </div>
        </div>
    </div>
</div>
