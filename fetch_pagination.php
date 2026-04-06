<?php
include('connect.php');

$query = "SELECT COUNT(*) FROM updates";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_row($result);
$total_records = $row[0];

$limit =   5; // Number of entries to show in a page
$total_pages = ceil($total_records / $limit);

echo json_encode($total_pages);
?>
