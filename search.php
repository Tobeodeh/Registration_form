
<html>
  
<head>
    <title>Success</title>
    <link rel = "stylesheet" href = "./search.css">
  </head>

<body>
  <h1>Success</h1>       
  <p>You have successfully registered</p>
      
  <form method="get">
    <label for="search">Search:</label>
    <input type="text" name="search" id="search" placeholder="search" value="<?php 
  
 if (isset($_GET['search'])) {
    $data = trim($_GET['search']);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = str_replace("+", "", $data);

    echo $data;
    } ?>
    ">
</form>
<br>
<?php require "./sql_conn.php";
  

  $conn = OpenCon();
    // Check if the search form was submitted
    if (isset($_GET['search'])) {
    
        // Get the search term from the form input
        $search_term = $_GET['search'];

        // Build the SQL query
        $query = "SELECT * FROM data_table WHERE First_Name LIKE '%{$search_term}%' OR Last_Name LIKE '%{$search_term}%' ";

        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if any results were found
        if (mysqli_num_rows($result) > 0) {
        // Display the results in an HTML table
        echo "<table>";
        echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Gender</th><th>About</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr><td>".$row["First_Name"]."</td><td>".$row["Last_Name"]."</td><td>".$row["Email"]."</td><td>". $row["Gender"]."</td><td>". $row["About"]."</td></tr>" ;
        echo "<table>";
        
        // <table>
        // <tr>
        //   <th>First Name</th>
        //   <th> Last Name</th>
        //   <th>Email</th>
        //   <th>Gender</th>
        //   <th>About</th>
        // </tr>
        // <?php
        
        
            // echo "First Name: " "<br>";
            // echo "Last Name: " "<br>";
            // echo "Email: " "<br>";
            // echo "Gender: " "<br>";
            // echo "About: " "<br>";
            // echo "<hr>";
        }
        } else {
        // Display a message if no results were found
        echo '<p>No results found.</p>';
        }

        // Close the database connection
        CloseCon($conn);
    }
?>
</body>
</html>