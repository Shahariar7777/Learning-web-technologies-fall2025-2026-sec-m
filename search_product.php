<!DOCTYPE html>
<html>
<head>
    <title>Search Product</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 5px; }
    </style>
    <script>
        function searchData() {
            var input = document.getElementById("searchInput").value;
            
            // Create AJAX Request
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("resultTable").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "search_ajax.php?q=" + input, true);
            xhttp.send();
        }
    </script>
</head>
<body>
    <fieldset style="width: 350px;">
        <legend style="font-weight: bold;">SEARCH</legend>
        <!-- The onkeyup event triggers the search as you type -->
        <input type="text" id="searchInput" onkeyup="searchData()">
        <button type="button">Search By Name</button>
        <br><br>
        
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>PROFIT</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody id="resultTable">
                <!-- Ajax results will appear here -->
            </tbody>
        </table>
    </fieldset>
</body>
</html>