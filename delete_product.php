<?php
include 'db_connect.php';
$id = $_GET['id'];

// Get details to show before deleting
$sql = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['delete'])) {
    $delSql = "DELETE FROM products WHERE id = $id";
    if (mysqli_query($conn, $delSql)) {
        header("Location: display_products.php");
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <fieldset style="width: 300px;">
        <legend style="font-weight: bold;">DELETE PRODUCT</legend>
        <form method="POST">
            <p>Name: <?php echo $row['name']; ?></p>
            <p>Buying Price: <?php echo $row['buying_price']; ?></p>
            <p>Selling Price: <?php echo $row['selling_price']; ?></p>
            <p>Displayable: <?php echo ($row['display'] == 1) ? 'Yes' : 'No'; ?></p>
            <hr>
            <input type="submit" name="delete" value="Delete">
        </form>
    </fieldset>
</body>
</html>