<!DOCTYPE html>
<?php

   //global $sql;
    if((isset($_POST['date1']) && !empty($_POST['date1'])) && (isset($_POST['date2']) && !empty($_POST['date2']))
        && isset($_POST['selectCust']) ){  
        $start_date = $_POST["date1"];
        $end_date = $_POST["date2"];
        $customerToSearch = $_POST["selectCust"];        
        //cookies with the necesary info to create the querys
        setcookie("query_sql_date1",$start_date,time()+3600);
        setcookie("query_sql_date2",$end_date,time()+3600);
        setcookie("query_sql_customer",$customerToSearch,time()+3600);
    }
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Test Beitech</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">    
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        
        

    </head>
    <body>
        <form method="POST">
            <div class="container">                
                <h1 align="center">LIST OF ORDERS BETWEEN TWO DATES</h1>
                    <div ng-app="myApp" ng-controller="miControlador">
                        <table  class="table">
                            <thead>
                                <tr>
                                <th scope="col">ORDER ID</th>
                                <th scope="col">CUSTOMER NAME</th>
                                <th scope="col">ADDRES</th>
                                <th scope="col">DATE</th>
                                <th scope="col">DETAILS</th>
                                </tr>
                            </thead>
                            <tbody>                                
                                <tr ng-repeat="x in orders">                                     
                                    <td>{{x.Id}}</td>
                                    <td>{{x.Customer}}</td>
                                    <td>{{x.Addres}}</td>
                                    <td>{{x.Date}}</td>
                                    <td>{{x.Info}}</td>
                                </tr>
                            </tbody>
                        </table>                
                    </div>
            </div>

            <button type="button" class="btn btn-primary" onclick=" location.href='searchOrders.php' " >Back</button>
            <script>
                var app = angular.module("myApp", []);
                app.controller('miControlador', function($scope,$http){
                    $http.get("http://localhost/beitech/jsonDataPhp/jsonOrdersDates.php").
                    then(function(response){
                        $scope.orders = response.data.records;                                
                    });                    
                });                    
            </script>
            
        </form>
    </body>
</html>