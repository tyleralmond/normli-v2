'use strict';

describe('Service: instagram', function () {

  // load the service's module
  beforeEach(module('normliV2App'));

  // instantiate service
  var instagram;
  beforeEach(inject(function (_instagram_) {
    instagram = _instagram_;
  }));

  it('should do something', function () {
    expect(!!instagram).toBe(true);
  });

});
