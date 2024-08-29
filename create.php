<?php
include "C:/xampp/htdocs/act1/datab.php";

$sql = "SELECT * FROM `product1`";
$stmt = $db->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>

<h3>Product List</h3>
<a href="insert.php">Add New Product</a>

<?php if (isset($_GET['msg'])): ?>
    <p><?php echo htmlspecialchars($_GET['msg']); ?></p>
<?php endif; ?>

<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo htmlspecialchars($product['Name']); ?></td>
                <td><?php echo htmlspecialchars($product['Description']); ?></td>
                <td><?php echo htmlspecialchars($product['Price']); ?></td>
                <td><?php echo htmlspecialchars($product['Quantity']); ?></td>
                <td><?php echo htmlspecialchars($product['CreateAt']); ?></td>
                <td><?php echo htmlspecialchars($product['UpdateAt']); ?></td>
                <td>
                    <a href="insert.php?id=<?php echo $product['id']; ?>">Insert</a>
                    <a href="delete.php?id=<?php echo $product['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>

