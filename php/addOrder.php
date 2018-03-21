<?php 
    include('../database/database_conection.php');        
                    

    session_start();
    
    if(!isset($_SESSION['products'])){
        $_SESSION['products'] = '';   
    }
    /*if(!isset($_SESSION['cont'])){
        $_SESSION['cont'] = 0;
    }*/

    if(!isset($_SESSION['nproduct'][$_GET['p']])){
        if($_SESSION['cont'] < 4){
            $_SESSION['nproduct'][$_GET['p']] = 1;            
            $_SESSION['products'] .= $_GET['p'].'-';
            $_SESSION['cont'] += 1;            
        }elseif($_SESSION['cont']==4){
            $_SESSION['nproduct'][$_GET['p']] = 1; 
            $_SESSION['products'] .= $_GET['p'];
            $_SESSION['cont'] += 1;                   
        }else{
            ?>
            <script>alert('Solo puede ordenar 5 productos');</script>
            <?php
        }
    }else{
        $_SESSION['nproduct'][$_GET['p']] += 1; 
    }
        
    $products = explode("-",$_SESSION['products']);
    #Obtain the products to register on order
    $mysqli = conexion();
    $sumTotal = 0;
    ?>
    <table>
        <tr>
            <th>Num of units</th>
            <th>Product Name</th> 
            <th>Price</th>
        </tr>
    <?php
    for($i = 0;$i<count($products);$i++){
        if(isset($_SESSION['nproduct'][$products[$i]])){
            $sql = 'SELECT PRODUCT_NAME,PRODUCT_PRICE FROM PRODUCT WHERE PRODUCT_ID = '.$products[$i];
            $result = $mysqli->query($sql);
            $rs = $result->fetch_array(MYSQLI_ASSOC);
            $priceItemT = $_SESSION['nproduct'][$products[$i]] * $rs["PRODUCT_PRICE"];
            $sumTotal += $priceItemT;
            echo '<tr><td>'.$_SESSION['nproduct'][$products[$i]].'</td><td>'.$rs["PRODUCT_NAME"].'</td><td> $'.$priceItemT.'</td></tr>';            
        }
    }
    echo '<tr><td>Subtotal: </td><td>$'.$sumTotal.'</td></tr>';

    echo '</table>';
    $mysqli->close(); 
    
    
?>