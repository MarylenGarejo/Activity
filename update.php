<?php
include "C:/xampp/htdocs/act1/datab.php";

if (!isset($_GET['id'])) {
    header("Location: index.php?msg=No product ID specified");
    exit;
}

$id = $_GET['ID'];

if (isset($_POST['submit'])) {
    $name = $_POST['Name'];
    $description = $_POST['Description'];
    $price = $_POST['Price'];
    $quantity = $_POST['Quantity'];

    $sql = "UPDATE `product1` SET `Name` = ?, `Description` = ?, `Price` = ?, `Quantity` = ?, `UpdateAt` = NOW() WHERE `ID` = ?";
    $stmt = $db->prepare($sql);

    try {
        $stmt->execute([$name, $description, $price, $quantity, $id]);
        header("Location: index.php?msg=Product updated successfully");
        exit;
    } catch (PDOException $e) {
        echo "Failed: " . $e->getMessage();
    }
}

$sql = "SELECT * FROM `product1` WHERE `id` = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    header("Location: index.php?msg=Product not found");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>

<h3>Edit Product</h3>

<form action="" method="post">
    <label>Name:</label>
    <input type="text" name="Name" value="<?php echo htmlspecialchars($product['Name']); ?>" required>
    <br>
    <label>Description:</label>
    <input type="text" name="Description" value="<?php echo htmlspecialchars($product['Description']); ?>" required>
    <br>
    <label>Price:</label>
    <input type="text" name="Price" value="<?php echo htmlspecialchars($product['Price']); ?>" required>
    <br>
    <label>Quantity:</label>
    <input type="text" name="Quantity" value="<?php echo htmlspecialchars($product['Quantity']); ?>" required>
    <br>
    <button type="submit" name="submit">Update</button>
    <a href="create.php">Cancel</a>
</form>

</body>
</html>