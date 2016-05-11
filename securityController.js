angular.module('securityModule', ['authorizationModule'])
.factory('$pagesSecurityService', ['$userProvider', '$location',
    function ($userProvider, $location) {
 
        var checkAuthorize = function(path) {
            if ($userProvider.getUser() == null) {
                $location.path('/login');
            }
            switch (path) {
              //запрещенный ресурс
              case '/company':
                  return checkPageSecurity({
                      //роли текущего пользователя
                      UserRoles: $userProvider.getUser().Roles,
                      //роли, которым доступен ресурс
                      AvailableRoles: [
                          $userProvider.rolesEnum.Admin
                      ]
                  });
            default:
                return true;
            }
        };
 
        var checkPageSecurity = function (config) {
            var authorize = false;
            for (var i in config.UserRoles) {
                if ($.inArray(config.UserRoles[i], config.AvailableRoles) == -1) {
                    authorize = false;
                } else {
                    authorize = true;
                    break;
                }
            }
            return authorize;
        };
 
        return {
            checkAuthorize: checkAuthorize,
        };
    }]);