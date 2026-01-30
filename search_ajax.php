<?php
include 'db_connect.php';

$q = isset($_GET['q']) ? $_GET['q'] : '';

// Search by name, ensuring we only show Display=Yes products (based on context of previous pages)
$sql = "SELECT * FROM products WHERE name LIKE '%$q%' AND display = 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $profit = $row['selling_price'] - $row['buying_price'];
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $profit . "</td>";
        echo "<td><a href='edit_product.php?id=" . $row['id'] . "'>edit</a></td>";
        echo "<td><a href='delete_product.php?id=" . $row['id'] . "'>delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No products found</td></tr>";
}
?>