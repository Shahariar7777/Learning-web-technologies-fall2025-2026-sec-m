<?php
include 'db_connect.php';

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $buying = $_POST['buying'];
    $selling = $_POST['selling'];
    // Checkbox: if checked, value is 1 (Yes), else 0 (No)
    $display = isset($_POST['display']) ? 1 : 0;

    $sql = "INSERT INTO products (name, buying_price, selling_price, display) 
            VALUES ('$name', '$buying', '$selling', '$display')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Product Added!'); window.location='display_products.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Add Product</title></head>
<body>
    <fieldset style="width: 300px;">
        <legend style="font-weight: bold; color: #333;">ADD PRODUCT</legend>
        <form method="POST">
            <label>Name</label><br>
            <input type="text" name="name" required><br><br>
            
            <label>Buying Price</label><br>
            <input type="number" name="buying" step="0.01" required><br><br>
            
            <label>Selling Price</label><br>
            <input type="number" name="selling" step="0.01" required><br><hr>
            
            <input type="checkbox" name="display" value="1"> <label>Display</label><br><hr>
            
            <input type="submit" name="save" value="SAVE">
        </form>
    </fieldset>
</body>
</html>