<?php
$mysqli = new mysqli("localhost","root","","wt");
// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id=$_POST['id'];
      $name=$_POST['name'];
      $class=$_POST['class'];
      $division=$_POST['div'];
      $city=$_POST['city'];
    if (isset($_POST['add'])) {
        $sql = "INSERT INTO students_info (stud_id, stud_name, class,division,city)
        VALUES (NULL, '$name', '$class','$division','$city')";
        
        if ($mysqli->query($sql) === TRUE) {
          echo "Student Added Successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
    }
    if (isset($_POST['update'])) {
        $sql = "UPDATE students_info SET stud_name='$name',class='$class',division='$division',city='$city' WHERE stud_id='$id'";

        if ($mysqli->query($sql) === TRUE) {
          echo "Record updated successfully";
        } else {
          echo "Error updating record: " . $conn->error;
        }
        
    }
    if (isset($_POST['delete'])) {
        $sql = "DELETE FROM students_info WHERE stud_id='$id'";
        if ($mysqli->query($sql) === TRUE) {
          echo "Record deleted successfully";
        } else {
          echo "Error deleting record: " . $conn->error;
        }
        
    }
  }
?>


<html>
    <head>
        <title> Students Data </title>
    </head>
    <body>
        
        <h1>Manage Students</h1>
        <form method="POST">
            ID
            <input type="text" name="id"/>
            </br>
            Name
            <input type="text" name="name"/>
            </br>
            Class
            <input type="text" name="class"/>
            </br>
            Division
            <input type="text" name="div"/>
            </br>
            City
            <input type="text" name="city"/>
            </br></br>
            <input type="submit" name="add" value="add"/>
            <input type="submit" name="update" value="update"/>
            <input type="submit" name="delete" value="delete"/>
        </form>
    </body>
</html>

<?php
echo "<table border='1'>

<tr>

<th>Id</th>

<th>Name</th>

<th>Class</th>

<th>Divison</th>
<th>City</th>

</tr>";
$sql = "SELECT * FROM students_info";
$result = mysqli_query($mysqli, $sql);

while($row = mysqli_fetch_array($result))

  {

  echo "<tr>";

  echo "<td>" . $row['stud_id'] . "</td>";

  echo "<td>" . $row['stud_name'] . "</td>";

  echo "<td>" . $row['class'] . "</td>";

  echo "<td>" . $row['division'] . "</td>";

  echo "<td>" . $row['city'] . "</td>";

  echo "</tr>";

  }

echo "</table>";
?>