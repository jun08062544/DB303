<?php
include 'db_connect.php';
if(isset($_POST['submit'])){
    $dir = './images/';
    $filename = microtime(true).'.'.pathinfo($_FILES['pic']['name'],PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['pic']['tmp_name'],$dir.$filename);
    $sql = "insert into images(path) values('$filename')";
    try {
        $conn->query($sql);
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}
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
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="pic" required>
        <input type="submit" value="ส่งไฟล์" name="submit">
    </form> 
    <div>
<?php
    $sql = 'select path from images';
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
?>
        <img src="./images/<?=$row['path']?>" style="height:100px;">
<?php
    }
    $conn->close();
?>
    </div>
</body>
</html>