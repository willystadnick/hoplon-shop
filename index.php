<?php

$breadcrumbs = 'Home';

include('html/header.php');

include('html/index01.php');

include('lib/history.php');

include('html/index02.php');

$sql = "SELECT * FROM products";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($a = mysqli_fetch_assoc($result)) {
        include('lib/product.php');

        if ($name == '[not translated]') {
            continue;
        }

		include('html/product01.php');
    }
} else {
    echo "No results";
}

include('html/index03.php');

include('html/footer.php');
