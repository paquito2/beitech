<!doctype html>
<?php
    include('database/database_conection.php');        
    $mysqli = conexion();                
    //$mysqli = new mysqli('localhost','root',' ','beitech_db'); 
    $sql = 'SELECT * FROM customer';
    
    $result = $mysqli->query($sql);
    $sel = '';               
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        $sel .= "<option value = '".$rs["CUSTOMER_ID"]."'>".$rs["CUSTOMER_NAME"]."</option>";
    }   
    $mysqli->close(); 
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

        <!--Bootstrap Date Picker -->
        <script src="libs/bootstrapDatePicker/js/bootstrap-datepicker.min.js" charset="utf-8"></script>
        <link rel="styleheet" href="libs/bootstrapDatePicker/css/bootstrap-datepicker.css"> </link>
        <link rel="styleheet" href="css/style.css"> </link>
        <!--Bootstrap Select -->      
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
        
    </head>
    <body>
        <div class="container">
            <h1 align="center">
                Development Test Beitech
            </h1>
        </div>
        <div class="container">
            <br />
                
            <div class="row">
                <div class='col-sm-4'>
                    <div class="form-group">
                        <form action="tienda.php" id="form1" method="POST">
                            Customer<select name="selectCust" class="selectpicker">                            
                                <?php
                                    echo $sel;                                   
                                ?>
                            </select>
                            <br>
                            Addres<input type="text" placeholder="Addres" name="txtAddres"/>
                            <div id="filterDate1">
                                <!-- Datepicker as text field -->         
                                Send Date
                                <div class="input-group date">
                                <input required=true type="text" class="form-control" name="date1">
                                    <div class="input-group-addon" >
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                </div>
                            </div> 
                            <button class="btn btn-primary">New Order</button>
                        </form>                
                    </div>
                </div>
                <div class='col-sm-3'>
                    <div class="form-group">
                        <form action="searchOrders.php" id="form2">
                            <button class="btn btn-primary">List Orders for dates</button>
                        </form>
                    </div>
                </div>
                <div class='col-sm-3'>
                    <div class="form-group">
                        <form action="searchLO.php" id="form3">
                            <button class="btn btn-primary" >Latest Orders</button>
                        </form>                    
                    </div>
                </div>
            </div>
        </div>        
        <script src="js/app.js" charset="utf-8"></script>
    </body>
</html>