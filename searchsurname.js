
function SearchSurname($scope, $http) {
	$scope.url = 'search.php'; 
		
		$scope.search = function() {
		
		$http.post($scope.url, { "Surname" : $scope.keywords}).
		success(function(Surname, Status) {
			$scope.Surname = Surname;
			$scope.Status = Status;
			$scope.Name = Name;
			$scope.Secname = Secname;
			$scope.firedStatus = firedStatus;
		})
		.
		error(function(Surname, status) {
			$scope.Surname = Surname || "";
			$scope.Status = Status;			
		});
	};
}

