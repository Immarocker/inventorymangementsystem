require_once 'core.php';

$orderId = $_POST['orderId'];

$sql = "SELECT order_date, client_name, client_contact, sub_total, vat, total_amount, discount, grand_total, paid, due, payment_place, gstn FROM orders WHERE order_id = $orderId";

$orderResult = $connect->query($sql);
$orderData = $orderResult->fetch_array();

$orderDate = $orderData[0];
$clientName = $orderData[1];
$clientContact = $orderData[2];
$subTotal = $orderData[3];
$vat = $orderData[4];
$totalAmount = $orderData[5];
$discount = $orderData[6];
$grandTotal = $orderData[7];
$paid = $orderData[8];
$due = $orderData[9];
$payment_place = $orderData[10];
$gstn = $orderData[11];

$orderItemSql = "SELECT order_item.product_id, order_item.rate, order_item.quantity, order_item.total,
                 product.product_name FROM order_item
                 INNER JOIN product ON order_item.product_id = product.product_id 
                 WHERE order_item.order_id = $orderId";
$orderItemResult = $connect->query($orderItemSql);

$table = '<style>
.star img {
    visibility: visible;
}
</style>
<table align="center" cellpadding="0" cellspacing="0" style="width: 100%;border:1px solid black;margin-bottom: 10px;">
    <tbody>
        <tr>
            <td colspan="5" style="text-align:center;font-size: 25px;">TAX INVOICE</td>
        </tr>
        <tr>
            <td rowspan="8" colspan="2" style="border-left:1px solid black;" background-image="logo.png"><img src="./logo.png" alt="logo" width="110px;"></td>
            <td colspan="3" >ORIGINAL</td>
        </tr>
        <tr>
            <td colspan="3" >DUPLICATE</td>
        </tr>
        <tr>
            <td colspan="3" style="font-style: italic;font-weight: 600;text-decoration: underline;font-size: 25px;">Simple Inventory System</td>
        </tr>
        <tr>
            <td colspan="3" >Nr. Your First Address,</td>
        </tr>
        <tr>
            <td colspan="3" >Cityname,Pincode</td>
        </tr>
        <tr>
            <td colspan="3" >Tele: 1234567890,1478523690.</td>
        </tr>
        <tr>
            <td colspan="3" >Email: info@yoursite.com</td>
        </tr>
        <tr>
            <td colspan="3" style="text-decoration: underline;">info@yoursite.com</td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 0px;vertical-align: top;border-right:1px solid black;">
                <table align="left" cellpadding="0" cellspacing="0" style="border: thin solid black; width: 100%">
                    <tbody>
                        <tr>
                            <td style="width: 74px;vertical-align: top;" rowspan="3">TO, </td>
                            <td style="border-bottom-style: solid; border-bottom-width: thin;" colspan="4">'
