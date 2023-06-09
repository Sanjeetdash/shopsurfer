<?php
include "connection.php";

// Check if filter value is set
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';

// Construct the SQL query based on the filter
$sql = "SELECT * FROM resturant_product";
if ($filter === 'veg') {
    $sql .= " WHERE dish_type = 'veg'";
} elseif ($filter === 'nonveg') {
    $sql .= " WHERE dish_type = 'nonveg'";
}

$result = $con->query($sql);
$dishes = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dishes[] = $row;
    }
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($dishes);

$con->close();
?>
