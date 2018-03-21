<?php 
    include('database/database_conection.php');        
    session_start();    
    $mysqli = conexion();
    $idOrder = 0;
    $sql = 'SELECT MAX(ORDER_ID) AS norder FROM order_';
    $result = $mysqli->query($sql);
    $rs = $result->fetch_array(MYSQLI_ASSOC);
    $idOrder = $rs['norder'] + 1;
    $sql = 'INSERT INTO ORDER_ VALUES ('.$idOrder.','.$_SESSION["customer"].',"'.$_SESSION["addres"].'","'.$_SESSION["date"].'")';
    $result = $mysqli->query($sql);
    $products = explode("-",$_SESSION['products']);
    for($i = 0;$i<count($products);$i++){
        if(isset($_SESSION['nproduct'][$products[$i]])){
            $sql = 'INSERT INTO ORDER_DETAIL VALUES ('.$idOrder.','.$products[$i].','.$_SESSION['nproduct'][$products[$i]].')';
            //$sql = 'SELECT PRODUCT_NAME,PRODUCT_PRICE FROM PRODUCT WHERE PRODUCT_ID = '.$products[$i];
            $result = $mysqli->query($sql);            
        }
    }
    $mysqli->close(); 
    session_destroy();

?>
<script>
alert('Your Order has been registered');
window.location =  "index.php";
</script>