
var INTEGER_REGEXP = /^\-?\d+$/;
appDash.directive('integer', function() {
  return {
    require: 'ngModel',
    link: function(scope, elm, attrs, ctrl) {
      ctrl.$parsers.unshift(function(viewValue) {
        if (INTEGER_REGEXP.test(viewValue)) {
          // it is valid
          ctrl.$setValidity('integer', true);
          return viewValue;
        } else {
          // it is invalid, return undefined (no model update)
          ctrl.$setValidity('integer', false);
          return undefined;
        }
      });
    }
  };
});

var FLOAT_REGEXP = /^\-?\d+((\.|\,)\d+)?$/;
appDash.directive('smartFloat', function() {
  return {
    require: 'ngModel',
    link: function(scope, elm, attrs, ctrl) {
      ctrl.$parsers.unshift(function(viewValue) {
        if (FLOAT_REGEXP.test(viewValue)) {
          ctrl.$setValidity('float', true);
          return parseFloat(viewValue.replace(',', '.'));
        } else {
          ctrl.$setValidity('float', false);
          return undefined;
        }
      });
    }
  };
});


appDash.directive("formGroup", function () {
    return {
        restrict: "C",
        //get the controller in the link function
        require: "formGroup",
        link: function ($scope, element, attributes, controller) {
            var errorList = {};
            controller.inputError = function () {
                element.addClass("has-error");
            };
            controller.inputValid = function () {
                element.removeClass("has-error");
            };
        },
        //the controller is initialized in link function
        controller: function() {return {};}
    };
});

appDash.directive("input", function () {
    return {
        restrict: "E",
        //require controlllers of ngModel and parent directive
        //formGroup
        //they're injected as array parameter of link function
        require: ["?ngModel", "^?formGroup"],
        link: function ($scope, element, attributes, controllers) {
            var modelController = controllers[0];
            var formGroupController = controllers[1];
            if (!modelController || !formGroupController) return;
            var hasBeenVisited = false;
            // check if user has left the field
            element.on("keydown", function () {
                $scope.$apply(function () {
                    hasBeenVisited = true;
                });
            });
            // Watch the validity of the input
            $scope.$watch(function () {
                return modelController.$invalid && hasBeenVisited;
            }, function () {
                // $emit messages to the control group
                if (modelController.$invalid && hasBeenVisited) {
                    formGroupController.inputError();
                } else {
                    formGroupController.inputValid();
                }
            });
        }
    };
});