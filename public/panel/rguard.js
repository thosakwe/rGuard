var rguard = angular.module('rguard', [
    'ui.router'
]);

rguard.filter('dateToISO', function() {
    return function(input) {
        return new Date(input).toISOString();
    };
});

rguard.service('Rguard', Rguard);
rguard.service('User', User);