<?php
    include('database/database_conection.php');   
    $mysqli = conexion();     
    include('php/header.php');
    
    if(isset($_POST["selectCust"]) && isset($_POST["txtAddres"]) && isset($_POST["date1"])){
        /*$customer = $_POST["selectCust"];
        $addres = $_POST["txtAddres"];
        $date = $_POST["date1"];*/
        $_SESSION["customer"] = $_POST["selectCust"];
        $_SESSION["addres"] = $_POST["txtAddres"];
        $_SESSION["date"] = $_POST["date1"];
    }else{
        $_SESSION["customer"] = 0;
        $_SESSION["addres"] = 0;
        $_SESSION["date"] = 0;
    }
    
    #Query to get available products
    $sql = 'SELECT P.PRODUCT_ID,P.PRODUCT_NAME,P.PRODUCT_PRICE,P.PRODUCT_DESCRIPTION FROM AVAILABLE_PRODUCTS AS AP ,PRODUCT AS P WHERE AP.CUSTOMER_ID = "'.$_SESSION["customer"].'" AND AP.PRODUCT_ID = P.PRODUCT_ID';
    
    $result = $mysqli->query($sql);   
    ?>
    <table class="table"> 
        <tr> 
            <th>Name</th> 
            <th>Description</th> 
            <th>Price</th>
        </tr>     
    <?php
        while ($rs = $result->fetch_array(MYSQLI_ASSOC)) { 
        ?> 
            <tr> 
                <td><?php echo $rs['PRODUCT_NAME'] ?></td> 
                <td><?php echo $rs['PRODUCT_DESCRIPTION'] ?></td> 
                <td><?php echo $rs['PRODUCT_PRICE'] ?>$</td> 
                <td><button class="but_ord" value="<?php echo $rs['PRODUCT_ID'] ?>">Add</button></td>
            </tr> 
        <?php       
        } 
    ?> 
    </table>
    <?php include('php/footer.php'); ?>