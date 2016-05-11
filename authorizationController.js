var authorizationController = angular.module('authorizationController', []);
 
authorizationController.controller('loginCtrl', ['$scope', 'authorizationCompany', '$location', 
function($scope, authorizationCompany, $location){
  $scope.loginClick = function() {
    if (authorizationCompany.login($scope.login, $scope.pass)) {
      $location.path('/company');
    } else {
      alert('Данные введены неверно');
    }
  }
}]);
 
authorizationController.company('authorizationCompany',['$userProvider',
  function($userProvider){
    var login = function(login, pass){
      if (pass !== '123456') {
        return false;
      }
      if (login === 'admin') {
        $userProvider.setUser({Login: login, Roles: [$userProvider.rolesEnum.Admin]});
      } 
      return true;
    }
 
    return {
      login: login,
    }
}]);
 
authorizationController.company('$userProvider', function(){
  var rolesEnum = {
    Admin: 0
  };
  var setUser = function(u){
    user = u;
  }
  var getUser = function(){
    return user;
  }
 
  return {
    getUser: getUser,
    setUser: setUser,
    rolesEnum: rolesEnum
  }
});