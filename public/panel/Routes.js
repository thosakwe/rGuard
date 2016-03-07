rguard.config(function($stateProvider, $urlRouterProvider, $locationProvider) {

    $locationProvider.html5Mode(true);

    $stateProvider
        .state('index', {
            controller: ['User', LicensesCtrl],
            controllerAs: 'licenses',
            templateUrl: panelBaseUrl + '/views/index.html',
            url: '/'
        })
    ;

    $urlRouterProvider.otherwise('/');
});