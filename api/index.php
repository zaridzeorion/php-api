<?php
header("Access-Control-Allow-Origin: *");

$pdo = new PDO('mysql:host=localhost;dbname=mynewdatabase', 'root', ''); // Connection
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Error handling
$statement = $pdo->query("SELECT * FROM posts"); // Retrieve table data

$api = array();

$i = 0;
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
    $api[$i]['id'] = $row['id'];
    $api[$i]['user_id'] = $row['user_id'];
    $api[$i]['title'] = $row['title'];
    $api[$i]['body'] = $row['body'];

    $i++;
}

echo json_encode($api);
?>
