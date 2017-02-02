<?php
include_once "config/database.php";
include_once "objects/product.php";

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

$product->name = $_POST['name'];
$product->description = $_POST['description'];
$product->price = $_POST['price'];

date_default_timezone_set("Asia/Taipei");
$product->created = date('Y-m-d H:i:s');

$product->create();

?>