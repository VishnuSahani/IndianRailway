<?php
// This is a simplified example. In a real-world scenario, you may fetch data from a database.

$sampleData = ["Apple", "Banana", "Cherry", "Date", "Grape", "Lemon", "Orange", "Peach", "Pear"];

$query = $_GET['query'];
$results = [];

foreach ($sampleData as $item) {
  if (stripos($item, $query) !== false) {
    $results[] = $item;
  }
}

echo json_encode($results);
?>
