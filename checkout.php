<?php

$breadcrumbs = 'Store';

include('html/header.php');

$id = $_GET['id'];

$sql = 'SELECT * FROM products WHERE id = ' . $id;

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

	while ($a = mysqli_fetch_assoc($result)) {
		include('lib/product.php');
	}

	$sale = $off ? 1 : 0;
	$date = date('Y-m-d H:i:s');

	$sql = 'INSERT INTO history (product_id, language_id, price, sale, date) VALUES (' . $id . ',' . $languages[$lang]['id'] . ',' . $price . ',' . $sale . ',\'' . $date . '\')';

	if (mysqli_query($conn, $sql) !== true) {
		die('Query failed: ' . mysqli_error($conn));
	}
}

include('html/checkout01.php');
