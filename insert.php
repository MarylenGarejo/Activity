<?php
include "C:/xampp/htdocs/act1/datab.php"; 

if (isset($_POST["submit"])) {
    $name = $_POST['Name'];
    $description = $_POST['Description'];
    $price = $_POST['Price'];
    $quantity = $_POST['Quantity'];

    $sql = "INSERT INTO `product1` (`Name`, `Description`, `Price`, `Quantity`, `CreateAt`, `UpdateAt`) VALUES (?, ?, ?, ?, NOW(), NOW())";
    $stmt = $db->prepare($sql);
    try {
        $stmt->execute([$name, $description, $price, $quantity]);
        header("Location: index.php?msg=New record created successfully");
        exit;
    } catch (PDOException $e) {
        echo "Failed: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
</head>
<body>

<h3>Add New Product</h3>
<p>Complete the form below to add a new product</p>

<form action="" method="post">
    <label>Name:</label>
    <input type="text" name="Name" placeholder="Coke" required>
    <br>
    <label>Description:</label>
    <input type="text" name="Description" placeholder="Coke is..." required>
    <br>
    <label>Price:</label>
    <input type="text" name="Price" placeholder="28" required>
    <br>
    <label>Quantity:</label>
    <input type="text" name="Quantity" placeholder="1" required>
    <br>
    <button type="submit" name="submit">Add</button>
    <a href="index.php">Cancel</a>
</form>

</body>
</html>
