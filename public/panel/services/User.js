function User($http) {
    this.get = function() {
        return $http.get(userBaseUrl);
    }
}