<?php

function prefered_language($available_languages, $user_language) {
	$available_languages = array_flip($available_languages);
	$langs = array();

	preg_match_all(
		'~([\w-]+)(?:[^,\d]+([\d.]+))?~',
		strtolower($user_language),
		$matches,
		PREG_SET_ORDER
	);

	foreach ($matches as $match) {
		list($a, $b) = explode('-', $match[1]) + array('', '');
		$value = isset($match[2]) ? (float) $match[2] : 1.0;

		if (isset($available_languages[$match[1]])) {
			$langs[$match[1]] = $value;

			continue;
		}

		if (isset($available_languages[$a])) {
			$langs[$a] = $value - 0.1;
		}
	}

	if ($langs) {
		arsort($langs);

		return key($langs);
	} else {
		return $available_languages[0];
	}
}

$sql = "SELECT * FROM languages";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

	while ($a = mysqli_fetch_assoc($result)) {
		$languages[$a['code']] = $a;
    }
}

$available_languages = array_keys($languages);

if ( ! isset($_SESSION['lang'])) {
	$_SESSION['lang'] = $_SERVER["HTTP_ACCEPT_LANGUAGE"];
}

$user_language = $_SESSION['lang'];

if (isset($_GET['lang'])) {
	$user_language = $_SESSION['lang'] = $_GET['lang'];
}

$lang = prefered_language($available_languages, strtolower($user_language));
