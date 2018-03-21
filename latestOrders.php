<!doctype html>
<?php
        
    if(isset($_POST['selectCust']) ){  
        $customerToSearch = $_POST["selectCust"];        
        setcookie("query_sql_latest",$customerToSearch,time()+3600);
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
        
        <!--Bootstrap Select -->      
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
        
    </head>
    <body>
        <form id="principal" method="POST">  
            
            <div class="container">                
                    <h1 align="center">PREVIOUS MONTH ORDERS</h1>
                        <div ng-app="myApp" ng-controller="miControlador">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Order Id</th>
                                    <th scope="col">Total $</th>
                                    <th scope="col">Delivery Addres</th>
                                    <th scope="col">Products</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="x in orders"> 
                                        <td>{{x.Date}}</td>    
                                        <td>{{x.Id}}</td>
                                        <td>{{x.Total}}</td>
                                        <td>{{x.Addres}}</td>                                        
                                        <td>{{x.Info}}</td>
                                    </tr>
                                </tbody>
                            </table>                
                        </div>
                    </div>
                    <script>
                        var app = angular.module("myApp", []);
                        app.controller('miControlador', function($scope,$http){
                            $http.get("http://localhost/beitech/jsonDataPhp/jsonLatestOrders.php").
                            then(function(response){
                                $scope.orders = response.data.records;           
                            });                    
                        });            
                    </script>                    
            
            <button type="button" class="btn btn-primary" onclick=" location.href='searchLO.php' " >Back</button>
            <script src="js/app.js" charset="utf-8"></script>
        </form>
        
    </body>
</html>