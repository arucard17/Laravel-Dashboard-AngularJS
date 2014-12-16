/**
 * Dashbord Service
 */
angular.module('Dashboard').factory('Article', function($resource) {
  return $resource('/api/article/:id', { id : '@id' }, {
    update: {
        method: 'PUT'
    }
  });
});
