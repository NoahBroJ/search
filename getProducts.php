<?php
/*Establish connection*/
require "connect.php";

/*Select everything from the products table*/
if (!empty($tags)) {
    
    $sql = "SELECT * FROM products WHERE";
    
    for ($i = 0; $i < sizeof($tags); $i++) {
        if ($i == 0) {
            $sql = $sql." tags LIKE '%".$tags[$i]."%'";
        } else {
            $sql = $sql." OR tags LIKE '%".$tags[$i]."%'";
        }
    }
    
    $sql = $sql." ORDER BY id DESC";
    
    $statement = $dbh->prepare($sql);
    $statement->execute();
    
} else {
    $statement = $dbh->prepare("SELECT * FROM products ORDER BY id DESC");
    $statement->execute();
}


/*Go through all products*/
while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
?>
    <div class="product">
        <h3><?php echo $row["name"] ?></h3>
        <p class="price"><?php echo $row["price"] ?> kr.</p>
        <p class="description"><?php echo $row["description"] ?></p>
    </div>
<?php
}

/*Close connection*/
$dbh = null;
?>