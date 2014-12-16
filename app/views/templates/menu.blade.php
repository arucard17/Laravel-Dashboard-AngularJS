<div class="row animated fadeIn">
  <div class="col-lg-6">
    <div class="widget">
      <div class="widget-header"><i class="fa fa-users"></i>Menú
        <a href="#" title="Agregar elemento" ng-click="addMenu($event)" class="btn btn-info btn-sm"><i class="fa fa-plus"></i></a>
        <a href="#" title="Guardar menú" ng-show="showSaveModMenu" ng-click="saveMenu($event)" class="btn btn-info btn-sm pull-right">Guardar</a>
        <div class="clearfix"></div>
      </div>
      <div class="widget-body no-padding large">
        <ul ui-sortable="sortableOptions" ng-model="menu" class="menu-list">
            <li ng-repeat="m in menu">@{{ m.name }}
              <ul ui-sortable="sortableOptions" ng-model="m.submenus">
                <li ng-repeat="subm in m.submenus">@{{ subm.name }}</li>
              </ul>
            </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div ng-show="showNewTmpl" class="widget">
      <div class="widget-header">@{{ title_menu }}</div>
      <div class="widget-body large no-padding">
        <div class="col-lg-12 form-container">
          <form role="form" ng-submit="submit()" class="form-horizontal">
            <div class="form-group">
              <label for="name" class="col-sm-3 control-label">Nombre</label>
              <div class="col-sm-7">
                <input id="name" type="text" ng-model="_menu.name" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="shortcut" class="col-sm-3 control-label">Nombre corto</label>
              <div class="col-sm-7">
                <input id="shortcut" type="text" placeholder="Usado como Link" ng-model="_menu.shortcut" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="icon" class="col-sm-3 control-label">Icono</label>
              <div class="col-sm-7">
                <input id="icon" type="text" placeholder="Clase del icono" ng-model="_menu.icon" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="parent" class="col-sm-3 control-label">Sub-menú de</label>
              <div class="col-sm-7">
                <select id="parent" ng-init="_menu.parent = parents[0]._id" ng-model="_menu.parent" ng-options="parent._id as parent.name for parent in parents" class="form-control"></select>
              </div>
            </div>
            <div class="form-group form-btn">
              <button type="button" ng-click="volver()" class="btn btn-info">Cancelar</button>
              <button type="submit" class="btn btn-info">Registrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>