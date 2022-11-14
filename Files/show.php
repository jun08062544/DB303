<?php
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Category Name</th>
            <th>Picture</th>
        </tr>
<?php
$sql = 'select CategoryName, Picture from categories';
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    echo '<tr>';
    echo '<td>'.$row['CategoryName'].'</td>';
    echo '<td><img src="data:image/png;base64,'.base64_encode($row['Picture']).'"></td';
    echo '</tr>';
}
$conn->close();
?>
    </table>
</body>
</html>