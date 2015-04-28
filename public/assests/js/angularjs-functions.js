function TasksController($scope, $http){
    $scope.tasks = [
        {   name : "Task 1" },
        {   name : "Task 2" },
    ];

    $http.get("/tasks")
    .success(function(response) {$scope.tasks = response;});
}