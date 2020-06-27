<?php

session_start();

include_once(__DIR__ . '/../lib/connection.php');

include_once(__DIR__ . '/../lib/language.php');

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt_BR">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-Store</title>

    <link rel="shortcut icon" href="http://www.hoplon.com/site/img/img-hoplon-brand.png">
    <link rel="stylesheet" type="text/css" href="frontend/style.css">

</head>
<body>

    <div id="header">
        <a href="index.php">
            <img src="http://www.hoplon.com/site/img/logo-hoplon.svg"/>
            <h1>E-Store</h1>
        </a>
        <ul id="langs">
            <?php foreach ($languages as $language) { ?>
                <li class="<?php if ($_SESSION['lang'] == $language['code']) { print 'selected'; } ?>">
                    <a href="index.php?lang=<?php echo $language['code']; ?>"><?php echo $language['code']; ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>

    <div id="crambs">
        <span><?php echo $breadcrumbs; ?></span>
        <span class="admin"><a href="admin.php">Admin</a></span>
    </div>

    <div id="content">
