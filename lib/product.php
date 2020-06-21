<?php

$id = (int) $a['id'];

$sql_name = 'select value from tr_varchar where language_id = ' . $languages[$lang]['id'] . ' and
	code = \'' . $a['name'] . '\' limit 1';
$result_name = mysqli_query($conn, $sql_name);

if (mysqli_num_rows($result_name) > 0) {

    while ($a_name = mysqli_fetch_assoc($result_name)) {
        $name = $a_name['value'];
	}
} else {
	$name = '[not translated]';
}

$name_code = $a['name'];

$price = null;

$sql_price = 'select value from tr_float where language_id = ' . $languages[$lang]['id'] . ' and
	code = \'' . $a['price'] . '\' limit 1';
$result_price = mysqli_query($conn, $sql_price);

if (mysqli_num_rows($result_price) > 0) {

    while ($a_price = mysqli_fetch_assoc($result_price)) {
        $price = $a_price['value'];
	}
}

$price_code = $a['price'];

$sale_start = null;
$sale_end = null;
$sale_price = null;
$off = null;

if ( ! empty($a['sale_start'])) {
	$sale_start = strtotime($a['sale_start']);
	$sale_end = strtotime($a['sale_end']);
	$now = time();
	$sql_sale_price = 'select value from tr_float where language_id = ' . $languages[$lang]['id'] . ' and code = \'' . $a['sale_price'] . '\' limit 1';
	$result_sale_price = mysqli_query($conn, $sql_sale_price);

	if (mysqli_num_rows($result_sale_price) > 0) {

		while ($a_sale_price = mysqli_fetch_assoc($result_sale_price)) {
			$sale_price = $a_sale_price['value'];
		}
	}

	if ($sale_start <= $now && $now <= $sale_end) {
		$off = $price - $sale_price;
	}
}

$sale_price_code = $a['sale_price'];

$price_formatted = $languages[$lang]['currency'] . ' '
	. number_format($price, 2, $languages[$lang]['decimals'], $languages[$lang]['thousands']);
$off_formatted = $languages[$lang]['currency'] . ' '
	. number_format($off, 2, $languages[$lang]['decimals'], $languages[$lang]['thousands']);
$sale_start_formatted = $sale_start ? date('Y-m-d H:i:s', $sale_start) : null;
$sale_end_formatted = $sale_end ? date('Y-m-d H:i:s', $sale_end) : null;
$sale_price_formatted = $languages[$lang]['currency'] . ' '
	. number_format($sale_price, 2, $languages[$lang]['decimals'], $languages[$lang]['thousands']);

$sold = 0;
$sql_sold = 'select count(*) sold from history where language_id = ' . $languages[$lang]['id'] . ' and
	product_id = ' . $id . ' group by product_id order by sold desc';
$result_sold = mysqli_query($conn, $sql_sold);

if (mysqli_num_rows($result_sold) > 0) {

    while ($a_sold = mysqli_fetch_assoc($result_sold)) {
        $sold = $a_sold['sold'];
	}
}
