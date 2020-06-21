<?php

$breadcrumbs = 'Product';

include('html/header.php');

$next = '02';

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$sql = 'SELECT * FROM products WHERE id = ' . $id;

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		while ($a = mysqli_fetch_assoc($result)) {
			include('lib/product.php');

	        if ($name == '[not translated]') {
	            $name = null;
	        }
		}
	}
}

if (isset($_POST['name'])) {
	$alert = false;

	if (empty($_POST['name'])) {
		$alert = 'Please enter a valid name.';
	}

	$name = $_POST['name'];

	if (empty($_POST['price'])) {
		$alert = 'Please enter a valid price.';
	}

	$price = $_POST['price'];

	$sale = false;

	$sale_start_formatted = null;

	if ( ! empty($_POST['sale_start'])) {
		$sale = true;
		if (($timestamp = strtotime($_POST['sale_start'])) === false) {
			$alert = 'Please enter a valid sale start.';
			$sale_start_formatted = $_POST['sale_start'];
		} else {
			$sale_start_formatted = date('Y-m-d H:i:s', $timestamp);
		}
	}

	$sale_end_formatted = null;

	if ( ! empty($_POST['sale_end'])) {
		$sale = true;
		if (($timestamp = strtotime($_POST['sale_end'])) === false) {
			$alert = 'Please enter a valid sale end.';
			$sale_end_formatted = $_POST['sale_end'];
		} else {
			$sale_end_formatted = date('Y-m-d H:i:s', $timestamp);
		}
	}

	if ($sale && empty($_POST['sale_price'])) {
		$alert = 'Please enter a valid sale price.';
	}

	$sale_price = null;

	if ( ! empty($_POST['sale_price'])) {
		$sale_price = $_POST['sale_price'];
	}

	if ( ! $alert) {
		if (isset($_GET['id'])) {
			$sql = 'select * from tr_varchar where language_id = ' . $languages[$lang]['id'] . ' and code = \'' . $name_code . '\' limit 1';
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {

			    while ($a = mysqli_fetch_assoc($result)) {
					$sql = 'UPDATE tr_varchar SET value = \'' . $name . '\' WHERE id = ' . $a['id'];

					if (mysqli_query($conn, $sql) !== true) {
						$alert = 'Query update name failed: ' . mysqli_error($conn);
					}
				}
			} else {
				$sql = 'INSERT INTO tr_varchar (language_id, code, value) VALUES (' . $languages[$lang]['id'] . ', \'' . $name_code . '\', \'' . $name . '\')';

				if (mysqli_query($conn, $sql) !== true) {
					$alert = 'Query insert translate name failed: ' . mysqli_error($conn);
				}
			}

			$sql = 'select * from tr_float where language_id = ' . $languages[$lang]['id'] . ' and code = \'' . $price_code . '\' limit 1';
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {

			    while ($a = mysqli_fetch_assoc($result)) {
					$sql = 'UPDATE tr_float SET value = \'' . $price . '\' WHERE id = ' . $a['id'];

					if (mysqli_query($conn, $sql) !== true) {
						$alert = 'Query update price failed: ' . mysqli_error($conn);
					}
				}
			} else {
				$sql = 'INSERT INTO tr_float (language_id, code, value) VALUES (' . $languages[$lang]['id'] . ', \'' . $price_code . '\', \'' . $price . '\')';

				if (mysqli_query($conn, $sql) !== true) {
					$alert = 'Query insert translate price failed: ' . mysqli_error($conn);
				}
			}

			if ($sale_start_formatted) {
				$sql = 'UPDATE products SET sale_start = \'' . $sale_start_formatted . '\' WHERE id = ' . $id;

				if (mysqli_query($conn, $sql) !== true) {
					$alert = 'Query update sale start failed: ' . mysqli_error($conn);
				}
			}

			if ($sale_end_formatted) {
				$sql = 'UPDATE products SET sale_end = \'' . $sale_end_formatted . '\' WHERE id = ' . $id;

				if (mysqli_query($conn, $sql) !== true) {
					$alert = 'Query update sale end failed: ' . mysqli_error($conn);
				}
			}

			if ($sale_price) {
				$sql = 'select * from tr_float where language_id = ' . $languages[$lang]['id'] . ' and code = \'' . $sale_price_code . '\' limit 1';
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {

					while ($a = mysqli_fetch_assoc($result)) {
						$sql = 'UPDATE tr_float SET value = \'' . $sale_price . '\' WHERE id = ' . $a['id'];

						if (mysqli_query($conn, $sql) !== true) {
							$alert = 'Query update sale price failed: ' . mysqli_error($conn);
						}
					}
				} else {
					$sql = 'INSERT INTO tr_float (language_id, code, value) VALUES (' . $languages[$lang]['id'] . ', \'' . $sale_price_code . '\', \'' . $sale_price . '\')';

					if (mysqli_query($conn, $sql) !== true) {
						$alert = 'Query insert translate sale price failed: ' . mysqli_error($conn);
					}
				}
			}

			if ( ! $alert) {
				$action = 'editado';
				$next = '03';
			}
		} else {
			$fields = [
				'name',
				'price',
			];

			$values = [
				'\'' . $name . '\'',
				$price,
			];

			if ($sale_start_formatted) {
				$fields[] = 'sale_start';
				$values[] = '\'' . $sale_start_formatted . '\'';
			}

			if ($sale_end_formatted) {
				$fields[] = 'sale_end';
				$values[] = '\'' . $sale_end_formatted . '\'';
			}

			if ($sale_price) {
				$fields[] = 'sale_price';
				$values[] = $sale_price;
			}

			$fields = implode(', ', $fields);
			$values = implode(', ', $values);

			$sql = 'INSERT INTO products (' . $fields . ') VALUES (' . $values . ')';

			if (mysqli_query($conn, $sql) !== true) {
				$alert = 'Query insert failed: ' . mysqli_error($conn);
			}

			$id = mysqli_insert_id($conn);

			$sql = 'UPDATE products SET name = \'productname' . $id . '\', price = \'productprice' . $id . '\', sale_price = \'productsaleprice' . $id . '\' WHERE id = ' . $id;

			if (mysqli_query($conn, $sql) !== true) {
				$alert = 'Query update failed: ' . mysqli_error($conn);
			}

			$sql = 'INSERT INTO tr_varchar (language_id, code, value) VALUES (' . $languages[$lang]['id'] . ', \'productname' . $id . '\', \'' . $name . '\')';

			if (mysqli_query($conn, $sql) !== true) {
				$alert = 'Query insert translate name failed: ' . mysqli_error($conn);
			}

			$sql = 'INSERT INTO tr_float (language_id, code, value) VALUES (' . $languages[$lang]['id'] . ', \'productprice' . $id . '\', ' . $price . ')';

			if (mysqli_query($conn, $sql) !== true) {
				$alert = 'Query insert translate price failed: ' . mysqli_error($conn);
			}

			if ($sale_price) {
				$sql = 'INSERT INTO tr_float (language_id, code, value) VALUES (' . $languages[$lang]['id'] . ', \'productsaleprice' . $id . '\', ' . $sale_price . ')';

				if (mysqli_query($conn, $sql) !== true) {
					$alert = 'Query insert translate sale price failed: ' . mysqli_error($conn);
				}
			}

			if ( ! $alert) {
				$action = 'cadastrado';
				$next = '03';
			}
		}
	}
}

include('html/product' . $next . '.php');

include('html/footer.php');
