var authorizationController = angular.module('authorizationController', []);
 
authorizationController.controller('loginCtrl', ['$scope', 'authorizationfactory', '$location', 
function($scope, authorizationFactory, $location){
  $scope.loginClick = function() {
    if (authorizationfactory.login($scope.login, $scope.pass)) {
      $location.path('/factory');
    } else {
      alert('Данные введены неверно');
    }
  }
}]);
 
authorizationController.factory('authorizationfactory',['$userProvider',
  function($userProvider){
    var login = function(login, pass){
      if (pass !== '123456') {
        return false;
      }
      if (login === 'admin') {
        $userProvider.setUser({Login: login, Roles: [$userProvider.rolesEnum.Admin]});
      } 
	  else {
		$userProvider.setUser({Login: login, Roles: [$userProvider.rolesEnum.User]});
	  }
      return true;
    }
 
    return {
      login: login,
    }
}]);
 
authorizationController.factory('$userProvider', function(){
  var rolesEnum = {
    Admin: 0,
	User: 1
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