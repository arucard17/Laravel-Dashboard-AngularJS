<div class="row">
    <div class="col-lg-8 center-col">
        <div class="widget">
            <div class="widget-header">Modificando @{{ article.title }}</div>
            <div class="widget-body no-height">
                <div class="alert alert-danger" ng-show="showError">
                    <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                    <strong>Error!</strong> Existen errores en el formulario.
                </div>
                <div class="col-lg-12 form-container">
                    <form role="form" name="form" ng-submit="submit()" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Titulo</label>
                            <div class="col-sm-7">
                                <input id="title" name="title" type="text" placeholder="Titulo" ng-model="article.title" class="form-control" required>
                                <div class="error-container"
                                ng-show="form.title.$dirty && form.title.$invalid">
                                <p ng-show="form.title.$error.required" class="help-block">El title es obligatorio.</p>
                                <p ng-show="form.title.$error.backend" ng-bind="b.errors.title[0]" class="help-block"></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="url" class="col-sm-3 control-label">URL</label>
                        <div class="col-sm-7">
                            <input id="url" name="url" type="text" placeholder="URL" ng-model="article.url" class="form-control" required>
                            <div class="error-container"
                            ng-show="form.url.$dirty && form.url.$invalid">
                            <p ng-show="form.url.$error.required" class="help-block">La URL es obligatoria.</p>
                            <p ng-show="form.url.$error.backend" ng-bind="b.errors.url[0]" class="help-block"></p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text" class="col-sm-3 control-label">Texto</label>
                    <div class="col-sm-7">
                        <textarea id="text" name="text" ng-model="article.text" class="form-control" rows="4" cols="50" required>
                        </textarea>
                        <div class="error-container" ng-show="form.text.$dirty && form.text.$invalid">
                            <p ng-show="form.text.$error.required" class="help-block">El texto es obligatorio.</p>
                            <p ng-show="form.text.$error.backend" ng-bind="b.errors.text[0]" class="help-block"></p>
                        </div>
                    </div>
                </div>
                <div class="form-group form-btn">
                    <button type="button" ng-click="volver()" class="btn btn-info">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
