<?php
include('config/config.php');

if (isset($_GET['term'])) {
    $search = $_GET['term'];

    $query = "SELECT * FROM rpos_customers WHERE customer_name LIKE '%$search%' ORDER BY created_at DESC";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $res = $stmt->get_result();

    $results = array();
    while ($cust = $res->fetch_object()) {
        $results[] = array(
            "id" => $cust->customer_id,
            "text" => $cust->customer_name
        );
    }

    echo json_encode($results);
}
?>
 