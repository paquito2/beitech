$(document).ready(init)
function init(){
        $(".but_ord").click(add)
}
function add(){
    //$("#car_order").load("php/addOrder.php");
    $("#car_order").load("php/addOrder.php?p="+$(this).val());
}