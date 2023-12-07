<html>
    <head>
        <title>Read User</title>
    </head>
    <body>
<h1>Read User</h1>


 <?php

if (strlen($_GET['userid']) > 0) //only if proceed

{
       $servername = "localhost";
       $username = "root";
       $password = "usbw";
       $dbname = "test1";

       // Create connection

       $conn = mysqli_connect($servername, $username, $password, $dbname);

       $sql = "SELECT id, name, email, date FROM employees WHERE id ='" . $_GET['userid'] . "'";

       if ($result = mysqli_query($conn, $sql)) {
           if (mysqli_num_rows($result) > 0) {
               echo "<table border=1><tr><th width=15%>Id</th><th width=15%>Name</th><th width=15%>Email</th><th width=15%>Created Date</th></tr>";

               while ($row = mysqli_fetch_array($result)) {
                   echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["date"] . "</td><tr>";
               }

               echo "</table>";
               mysqli_free_result($result);
           }
           else {
               echo "No results matching your query";
           }
       }
       else {
           echo "Error: Could not execute query: " . $sql . "<br><br>" . mysqli_error($conn);
       }

       mysqli_close($conn);
}

 ?>
 </body>
</html>