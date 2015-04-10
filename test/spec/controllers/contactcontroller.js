'use strict';

describe('Controller: ContactcontrollerCtrl', function () {

  // load the controller's module
  beforeEach(module('normliV2App'));

  var ContactcontrollerCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    ContactcontrollerCtrl = $controller('ContactcontrollerCtrl', {
      $scope: scope
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(scope.awesomeThings.length).toBe(3);
  });
});
