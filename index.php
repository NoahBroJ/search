<?php
    if (!empty($_GET["search"])) {
        $tags = explode(",", $_GET["search"]);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Look at all these fucking products!</h1>
    </header>
    
    <form action="index.php" method="get">
        <input name="search" type="text" placeholder="Search tags...">
        <input type="submit" value="Search">
    </form>
    
    <main id="container">
        <?php require "getProducts.php"; ?>
    </main>
</body>
</html>