<?php 

// Database connection
$conn = new mysqli("localhost", "root", "", "user_info");

$name                    = $_POST['name'];
$email                   = $_POST['email'];
$designation             = $_POST['designation'];
$salary                  = $_POST['salary'];



$query = "INSERT INTO `crud_info`(`id`, `name`, `email`, `designation`, `salary`) VALUES ('NULL','$name','$email','$designation','$salary')";
$result = mysqli_query($conn, $query);

if($result){
// echo 'success';
}


$sql = "SELECT * FROM `crud_info` ORDER BY  id ASC";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
  $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
              <tr>
                <th width="60px">Id </th>
                <th>Name</th>
                <th>Email</th>
                <th>Designation</th>
                <th>Salary</th>
              </tr>';

              while($row = mysqli_fetch_assoc($result)){
                $output .= "<tr>
                <td>{$row["id"]}</td>
                <td>{$row["name"]} </td>
                <td> {$row["email"]}</td>
                <td>{$row["designation"]}</td>
                <td> {$row["salary"]}</td>
                </tr>";
              }
    $output .= "</table>";

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}

 


?>