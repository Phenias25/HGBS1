<?php
include('connect.php');

if (isset($_POST['page'])) {
    $page = $_POST['page'];
} else {
    $page = 1;
}

$limit = 5; // Number of entries to show in a page
$start_from = ($page - 1) * $limit;

$query = "SELECT * FROM updates order by updates_id desc limit $start_from,$limit;";
$result = mysqli_query($conn, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
?>
