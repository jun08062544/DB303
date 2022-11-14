<?php
session_start();
include 'db_connect.php';
$sql = "select ProductName, UnitsInStock from products where categories '{$_SESSION['categories']}'";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
</head>
<body>
  <table>
    <tr>
      <td>ProductName:</td>
      <td><?=$row['Category']?></td>
    </tr>
    <tr>
      <td>UnitsInStock:</td>
      <td><?=$row['Category']?></td>
    </tr>
    <tr>
      <th>Product name</th>
      <th>Units in stock</th>
    </tr>
  </table>
</body>
</html>