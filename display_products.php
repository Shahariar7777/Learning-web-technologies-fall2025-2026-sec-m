<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Products</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 5px; }
        fieldset { width: 350px; }
    </style>
</head>
<body>
    <fieldset>
        <legend style="font-weight: bold;">DISPLAY</legend>
        <table style="width: 100%;">
            <tr>
                <th>NAME</th>
                <th>PROFIT</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            // Requirement: Only select where display is 1 (Yes)
            $sql = "SELECT * FROM products WHERE display = 1";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                // Calculation: Profit = Selling - Buying
                $profit = $row['selling_price'] - $row['buying_price'];
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $profit . "</td>";
                echo "<td><a href='edit_product.php?id=" . $row['id'] . "'>edit</a></td>";
                echo "<td><a href='delete_product.php?id=" . $row['id'] . "'>delete</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </fieldset>
    <br>
    <a href="add_product.php">Add New Product</a> | <a href="search_product.php">Search Products</a>
</body>
</html>