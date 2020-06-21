<?php

$breadcrumbs = 'Admin';

include('html/header.php');

include('html/admin01.php');

$sql = "SELECT * FROM products";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

	while ($a = mysqli_fetch_assoc($result)) {
		include('lib/product.php');

		include('html/admin02.php');
    }
}

include('html/admin03.php');

include('html/footer.php');
