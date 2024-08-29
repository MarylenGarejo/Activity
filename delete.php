<?php
include "C:/xampp/htdocs/act1/datab.php"; 

if (isset($_GET['ID'])) {
    $id = $_GET['id'];

   
    $sql = "DELETE FROM `product1` WHERE `ID` = :ID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_INT);

   
    if ($stmt->execute()) {
        header("Location: index.php?msg=Record deleted successfully");
    } else {
        header("Location: index.php?msg=Failed to delete record");
    }
} else {
    header("Location: create.php");
}
?>