@extends('layouts.master')

@section('css-top')
    <link rel="stylesheet" type="text/css" href="/assets/lib/sweetalert/lib/sweet-alert.css">
@stop

@section('content')
    <div ng-controller="MasterCtrl">
        <div id="page-wrapper" ng-class="{'active': toggle}" ng-cloak="">
            <!-- Sidebar-->
            <div id="sidebar-wrapper">
                <ul class="sidebar">
                    <li class="sidebar-main">
                        <a href="#" ng-click="toggleSidebar($event)">Dashboard<span class="menu-icon glyphicon glyphicon-transfer"></span></a></li>
                    <div ng-show="showLoading">
                        <rd-loading></rd-loading>
                    </div>
                    <div ng-repeat="menud in menuDash | orderBy:predicate" ng-hide="showLoading">
                        <li class="sidebar-title"><span>@{{ menud.name }}</span></li>
                        <li ng-repeat="submenu in menud.submenus | orderBy:predicate" class="sidebar-list"><a href="#/@{{ submenu.shortcut }}">@{{ submenu.name }}<span class="menu-icon @{{ submenu.icon }}"></span></a></li>
                    </div>
                </ul>
                <div class="sidebar-footer">
                    <div class="col-xs-4"><a href="https://github.com/Ehesp/Responsive-Dashboard" target="_blank">Github</a></div>
                    <div class="col-xs-4"><a href="#" target="_blank">About</a></div>
                    <div class="col-xs-4"><a href="#">Support</a></div>
                </div>
            </div>
            <!-- End Sidebar-->
            <div id="content-wrapper">
                <div class="page-content">
                    <!-- Header Bar-->
                    <div class="row header">
                        <div class="col-xs-12">
                            <div class="user pull-right">
                                <div class="item dropdown">
                                    <a href="#" class="dropdown-toggle"><img src="assets/img/avatar.jpg"></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-header">{{{ $user->name }}} {{{ $user->last }}}</li>
                                        <li class="divider"></li>
                                        <li class="link"><a href="#">Profile</a></li>
                                        <li class="divider"></li>
                                        <li class="link"><a href="/logout">Logout</a></li>
                                    </ul>
                                </div>
                                <div class="item dropdown"><a href="#" class="dropdown-toggle"><i class="fa fa-bell-o"></i><span class="badge">@{{ notifications.length }}</span></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-header">Notifications</li>
                                        <li class="divider"></li>
                                        <li ng-repeat="not in notifications"><a href="#">@{{ not.message | limitTo:10 }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="meta">
                                <div class="page">@{{ title }}</div>
                                <div class="breadcrumb-links">Dashboard / @{{ subtitle }} </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Header Bar-->
                    <!-- Main Content-->
                    <section ng-view=""></section>
                </div>
                <!-- End Page Content-->
            </div>
            <!-- End Content Wrapper-->
        </div>
        <!-- End Page Wrapper-->
    </div>
    <!-- End Controller-->
@stop

@section('js-bot')
    <!-- SCRIPTS -->

    <!-- DEPS -->
    <script src="/assets/lib/jquery/dist/jquery.js"></script>
    <script src="/assets/lib/angular/angular.js"></script>
    <script src="/assets/lib/jquery-ui/jquery-ui.js"></script>
    <script src="/assets/lib/angular-ui-sortable/sortable.js"></script>
    <script src="/assets/lib/underscore/underscore.js"></script>
    <script src="/assets/lib/sweetalert/lib/sweet-alert.min.js"></script>
    <script src="/assets/lib/angular-cookies/angular-cookies.js"></script>
    <script src="/assets/lib/angular-bootstrap/ui-bootstrap.js"></script>
    <script src="/assets/lib/angular-bootstrap/ui-bootstrap-tpls.js"></script>
    <script src="/assets/lib/angular-ui-router/release/angular-ui-router.js"></script>
    <script src="/assets/lib/angular-resource/angular-resource.js"></script>
    <script src="/assets/lib/angular-cookies/angular-cookies.js"></script>
    <script src="/assets/lib/angular-sanitize/angular-sanitize.js"></script>
    <script src="/assets/lib/angular-touch/angular-touch.js"></script>
    <script src="/assets/lib/angular-route/angular-route.js"></script>
    <script src="/assets/lib/angular-animate/angular-animate.js"></script>

    <script src="/assets/js/plugins.js"></script>

    <!-- APP -->
    <script src="/assets/js/dashboard/module.js"></script>
    <script src="/assets/js/dashboard/routes.js"></script>
    <script src="/assets/js/dashboard/filters.js"></script>
    <script src="/assets/js/dashboard/controllers/master-ctrl.js"></script>
    <script src="/assets/js/dashboard/services/article-srv.js"></script>
    <script src="/assets/js/dashboard/directives/loading.js"></script>
    <script src="/assets/js/dashboard/directives/validation.js"></script>
    <script src="/assets/js/dashboard/controllers/main-ctrl.js"></script>
    <script src="/assets/js/dashboard/controllers/article-ctrl.js"></script>
    <script src="/assets/js/dashboard/controllers/alerts-ctrl.js"></script>
    <script src="/assets/js/dashboard/controllers/menu-ctrl.js"></script>
    <!-- SCRIPTS -->
@stop
