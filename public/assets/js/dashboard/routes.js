'use strict';

/**
 * Route configuration for the Dashboard module.
 */
angular
  .module('Dashboard')
  .config(function ($routeProvider) {
      $routeProvider
        .when('/', {
          title: 'Home',
          templateUrl: 'tpl/main',
          controller: 'MainCtrl'
        })

        // Artículo
        .when('/article', {
          title: 'Maestro Artículo',
          templateUrl: 'tpl/article',
          controller: 'ArticleCtrl'
        })
        .when('/article/:id/view', {
          title: 'Maestro Artículo',
          templateUrl: 'tpl/article-view',
          controller: 'ArticleViewCtrl'
        })
        .when('/article/new', {
          title: 'Maestro Artículo',
          templateUrl: 'tpl/article-add',
          controller: 'ArticleCreateCtrl'
        })
        .when('/article/:id/edit', {
          title: 'Maestro Artículo',
          templateUrl: 'tpl/article-edit',
          controller: 'ArticleEditCtrl'
        })

        // Menú
        .when('/menu', {
          title: 'Administrar Menú',
          templateUrl: 'tpl/menu',
          controller: 'MenuCtrl'
        })

        .otherwise({
          redirectTo: '/'
        });
    });
