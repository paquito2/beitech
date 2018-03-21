<?php  
    #headers JSON
    header("Content_Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *");
     
    #Libs for SQL
    require_once('../dataBase/database_credentials.php');
    include('../dataBase/database_conection.php');   
    
    $customerToSearch = $_COOKIE["query_sql_latest"];        
        
    $monthPrevious = date('Y-m-d', strtotime('-1 month')) ; // rest one month

    $mysqli = conexion();
    $outp = '';  
    $outp2 = '';
    $sum = 0;
    
    $sql = 'SELECT CUSTOMER_NAME FROM CUSTOMER WHERE CUSTOMER_ID ="'.$customerToSearch.'"';
    $rs = $mysqli->query($sql);      
    $name = $rs->fetch_array(MYSQLI_ASSOC);     
        
    $sql = 'SELECT * FROM `ORDER_` WHERE (CUSTOMER_ID= "'.$customerToSearch.'") AND ORDER_DATE > "'.$monthPrevious.'"';
    
    $result = $mysqli->query($sql);

    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "") {
            $outp .= ",";
        }
            
        $outp.='{"Id":"' .$rs["ORDER_ID"].'",';
        
        
        $sql = 'SELECT * FROM ORDER_DETAIL WHERE ORDER_ID= '.$rs["ORDER_ID"];    
        $res = $mysqli->query($sql);        
        
        while($rs2 = $res->fetch_array(MYSQLI_ASSOC)) {                       
            $sql = 'SELECT * FROM `PRODUCT` WHERE PRODUCT_ID= '.$rs2["PRODUCT_ID"];      
            $resu = $mysqli->query($sql);
            $pname = $resu->fetch_array(MYSQLI_ASSOC);            
            $outp2.=$rs2["ORDERDETAIL_QUANTITY"].' X '.$pname["PRODUCT_NAME"].' ';
            $sum += $rs2["ORDERDETAIL_QUANTITY"]*$pname["PRODUCT_PRICE"];
        }   
        $outp.='"Total":"' .$sum.'",';
        $outp.='"Addres":"' .$rs["ORDER_DELIVERYADDRES"].'",';
        $outp.='"Date":"' .$rs["ORDER_DATE"].'",';        
        $outp.='"Info":"' .$outp2.'"}';
    }
    $outp ='{"records":['.$outp.']}';
    echo $outp;                                          
    $mysqli->close(); 
    
    
?>