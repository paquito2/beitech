<?php  
    #headers JSON
    header("Content_Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *");
     
    #Libs for SQL
    require_once('../dataBase/database_credentials.php');
    include('../dataBase/database_conection.php');   
    
    //echo var_dump($_COOKIE);
    #cookies info
    $start_date = $_COOKIE["query_sql_date1"];
    $end_date = $_COOKIE["query_sql_date2"];
    $customerToSearch = $_COOKIE["query_sql_customer"];        

    #Database Conection
    $mysqli = conexion();

    #Json Var
    $outp = '';  
    $outp2 = '';

    #Query to get Name of a Customer
    $sql = 'SELECT CUSTOMER_NAME FROM CUSTOMER WHERE CUSTOMER_ID ="'.$customerToSearch.'"';
    $rs = $mysqli->query($sql);      
    $name = $rs->fetch_array(MYSQLI_ASSOC);     
    
    #Query to Get Orders Between Two Dates
    $sql = 'SELECT * FROM `ORDER_` WHERE (CUSTOMER_ID= "'.$customerToSearch.'") AND ORDER_DATE BETWEEN "'.$start_date.'" AND "'.$end_date.'"';
    $result = $mysqli->query($sql);

    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "") {
            $outp .= ",";
        }
            
        $outp.='{"Id":"' .$rs["ORDER_ID"].'",';
        $outp.='"Customer":"' .$name["CUSTOMER_NAME"].'",';
        $outp.='"Addres":"' .$rs["ORDER_DELIVERYADDRES"].'",';        
        //$outp.='"Date":"' .$rs["ORDER_DATE"].'"}';
        $outp.='"Date":"' .$rs["ORDER_DATE"].'",';
        
        $sql = 'SELECT * FROM ORDER_DETAIL WHERE ORDER_ID= '.$rs["ORDER_ID"];    
        $res = $mysqli->query($sql);        
        
        while($rs2 = $res->fetch_array(MYSQLI_ASSOC)) {                       
            $sql = 'SELECT * FROM `PRODUCT` WHERE PRODUCT_ID= '.$rs2["PRODUCT_ID"];      
            $resu = $mysqli->query($sql);
            $pname = $resu->fetch_array(MYSQLI_ASSOC);            
            $outp2.=$rs2["ORDERDETAIL_QUANTITY"].' X '.$pname["PRODUCT_NAME"].' ';
        }   
        
        
        $outp.='"Info":"' .$outp2.'"}';
        
    }
    $outp ='{"records":['.$outp.']}';
    echo $outp;                                          
    $mysqli->close(); 
    
    
?>