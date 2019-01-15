var app =  angular.module('main-App',['ngRoute','angularUtils.directives.dirPagination']);
app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/', {
                templateUrl: 'templates/home.html',
                controller: 'AdminController'
            }).
            when('/books', {
                templateUrl: 'templates/books.html',
                controller: 'BookController'
            }).
            when('/users', {
                templateUrl: 'templates/users.html',
                controller: 'UserController'
            }).
            when('/borrows', {
                templateUrl: 'templates/borrows.html',
                controller: 'BorrowController'
            });
}]);