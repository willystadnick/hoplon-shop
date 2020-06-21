<?php

$quantity = 2;
$ids = [];
$sql = 'select product_id from history where language_id = ' . $languages[$lang]['id'] . ' group by product_id order by count(*) desc';
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($a = mysqli_fetch_assoc($result)) {
        $ids[] = $a['product_id'];
	}

    $ids = implode(', ', $ids);
    $sql = 'select * from products where id in (' . $ids . ') order by field (id, ' . $ids . ') limit ' . $quantity;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        include('html/history01.php');

        while ($a = mysqli_fetch_assoc($result)) {
            include('product.php');

            include('html/product01.php');
        }

        include('html/history02.php');
    }
}
