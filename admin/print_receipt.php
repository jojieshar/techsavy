<?php 
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <title>Tech Savy POS </title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/icons/main.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/icons/main.png">
    <link rel="manifest" href="assets/img/icons/site.webmanifest">
    <link rel="mask-icon" href="assets/img/icons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="assets/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/jquery.js"></script>
    <style>
        body {
            margin-top: 20px;
        }
    </style>
</head>
</style>
<?php

$order_code = $_GET['order_code'];
$ret = "SELECT * FROM  rpos_orders WHERE order_code = '$order_code'";
$stmt = $mysqli->prepare($ret);
$stmt->execute();
$res = $stmt->get_result();
while ($order = $res->fetch_object()) {
    $total = ($order->prod_price * $order->prod_qty);

?>

    <body>
        <div class="container">
            <div class="row">
                <div id="Receipt" class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <address>
                                <strong>Calapan City Oriental Mindoro</strong>
                                <br>
                                127-0-0-1
                                <br>
                                5200 Calapan City
                                <br>
                                Tech Savy
                                <br>
                                (+000) 123-456-789
                            </address>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <p>
                                <em>Date: <?php echo date('d/M/Y g:i', strtotime($order->created_at)); ?></em>
                            </p>
                            <p>
                                <em style="color: #fb6340; font-weight: bold;">Receipt #: <?php echo $order->order_code; ?></em>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-center">
                        <h2>Payment Receipt</h2>
                </div>
                <table class="table table-bordered receipt-table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><em><?php echo $order->prod_name; ?></em></td>
                            <td class="text-center"><?php echo $order->prod_qty; ?></td>
                            <td class="text-center">₱<?php echo $order->prod_price; ?></td>
                            <td class="text-center">₱<?php echo $total; ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="total-section" style="text-align: right;">
                    <p><strong>Subtotal:</strong> ₱<?php echo $total; ?></p>
                    <p><strong>Tax:</strong> 14%</p>
                    <strong><h4>Total: ₱<?php echo $total; ?></strong></h4>
                </div>
            </div>
                </div>
                <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                    <button id="print"  style="background-color: #fb6340; color:#ffffff;" onclick="printContent('Receipt');" class="btn btn-lg text- btn-block">
                        Print <span class="fas fa-print" ></span>
                    </button>
                </div>
            </div>
        </div>
    </body>

</html>
<script>
  function printContent(el) {
    var restorepage = $('body').html();
    var printcontent = $('#' + el).clone();
    $('body').empty().html(printcontent);
    window.print();
    $('body').html(restorepage);
}

</script>
<?php } ?>