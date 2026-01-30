<?php
include 'db_connect.php';

$id = $_GET['id']; // Get ID from URL
$sql = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $buying = $_POST['buying'];
    $selling = $_POST['selling'];
    $display = isset($_POST['display']) ? 1 : 0;

    $updateSql = "UPDATE products SET name='$name', buying_price='$buying', selling_price='$selling', display='$display' WHERE id=$id";
    
    if (mysqli_query($conn, $updateSql)) {
        header("Location: display_products.php");
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <fieldset style="width: 300px;">
        <legend style="font-weight: bold;">EDIT PRODUCT</legend>
        <form method="POST">
            <label>Name</label><br>
            <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
            
            <label>Buying Price</label><br>
            <input type="number" name="buying" value="<?php echo $row['buying_price']; ?>"><br>
            
            <label>Selling Price</label><br>
            <input type="number" name="selling" value="<?php echo $row['selling_price']; ?>"><br><hr>
            
            <!-- Check the box if database says 1 -->
            <input type="checkbox" name="display" <?php if($row['display']==1) echo "checked"; ?>> <label>Display</label><br><hr>
            
            <input type="submit" name="update" value="SAVE">
        </form>
    </fieldset>
</body>
</html>