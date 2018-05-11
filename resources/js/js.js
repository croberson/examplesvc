var app = angular.module("superpowerApp", []);

app.controller("mainCtrl", ['$scope', '$http', function($scope, $http){
    //this object will hold all the data that goes to the view
    $scope.data = {};
    
    //and these ones will keep track of which pairs are in edit mode.
    $scope.editMode = [];
    $scope.editModeDefaults = [];
    
    $scope.updatePairings = function(pairings) {
        $scope.data.pairings = pairings;
        
        //make sure edit mode is off for each of the pairings
        pairings.forEach(function(p) {
            $scope.editMode[p.id] = false;
        });
    };
    
    //first, get pairings from the database.
    $scope.getPairings = function() {
        $http({
           method:  'GET',
           url:     'api/api.php?action=getPairings'
        }).then(function(response) {
            $scope.updatePairings(response.data.pairings);
        });
    };
    $scope.getPairings();
    
    $scope.submitAddForm = function() {
        if($scope.name && $scope.power) {
            //do ajax stuff here
            $http({
                method: 'POST',
                data:   {'name' : $scope.name, 'power' : $scope.power},
                url:    'api/api.php?action=add'
            }).then(function(response) {
                $scope.getPairings();
                $scope.$applyAsync();
            });
        }
    };
    
    $scope.editPairing = function(pairing) {
        if($scope.pairing) {
            $http({
                method: 'PUT',
                data:   {'pairing' : pairing},
                url:    'api/api.php?action=edit'
            }).then(function(response) {
                $scope.getPairings();
                $scope.$applyAsync();
            });
        }
    };
    
    $scope.deletePairing = function(pairing) {
        //do ajax stuff here
        $http({
            method: 'DELETE',
            data:   {'pairing' : pairing},
            url:    'api/api.php?action=delete'
        }).then(function(response) {
            //grab the pairings and hand them off to the view
            $scope.getPairings();
            $scope.$applyAsync();
        });
    };
    
    $scope.enterEditMode = function(pairing) {
        $scope.editMode[pairing.id] = true;
        $scope.editModeDefaults[pairing.id] = pairing;
    };
    
    $scope.exitEditMode = function(pairing) {
        $scope.editMode[pairing.id] = false;
        
        //restore default value
        $scope.getPairings();
    };
}])

.controller("addCtrl", ['$scope', '$http', function($scope, $http) {
    
}]);
    