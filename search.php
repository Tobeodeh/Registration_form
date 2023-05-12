
<html>
  
<head>
    <title>Success</title>
    <link rel = "stylesheet" href = "./search.css">
  </head>

<body>
  <h1>Success</h1>       
  <p>You have successfully registered</p>
  <p>You can search through the table of records using the search input</p>
      
  <form method="post">
    <div>
      <input type="text" name="search_term" id="search_term" placeholder="search" value="<?php echo isset($_POST['search_term']) ? $_POST['search_term'] :'';?>">
      <input type = "submit" value="Search" class="search">
    </div>
    
</form>
<br>
<?php require "./sql_conn.php";
  

  $conn = OpenCon();
  $exclude_columns = array("Password", "Phone","ZipCode");

// Define the search term
  $search_term = isset($_POST["search_term"]) ? $_POST["search_term"] : "";

  // Build the SQL query
  $sql = "SELECT * FROM data_table";
  if($search_term){
    $sql = "SELECT * FROM data_table WHERE CONCAT_WS('', First_Name, Last_Name, Language, Gender, ZipCode) LIKE '%$search_term%' ";
  }
 
  $result = $conn->query($sql);

  // Build the table
  if ($result->num_rows > 0) {
      echo "<table>";
      echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Gender</th><th>Language</th><th>About</th></tr>";
      while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          foreach ($row as $key => $value) {
              if (!in_array($key, $exclude_columns)) {
                  echo "<td>" . $value . "</td>";
              }
          }
          echo "</tr>";
      }
      echo "</table>";
  } else {
      echo "No results found.";
  }

// Close the connection
$conn->close();
   
?>
</body>
</html>