<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-spacing: 0;
        }
        td {
            border:1px solid black;
            width: 32px;
            height: 32px;
        }
        .black {
            background-color: black;
        }
        .while {
            background-color: white;
        }
    </style>
</head>
<body>
    <table>
    <?php
  for($i = 0; $i < 8; $i++) {
    echo '<tr>';
    for($j = 0; $j < 8; $j++) {
        $class = ($i+$j)%2==0 ? 'black' : 'whote';
        echo '<td class=" '.$class . '"></td>';
    }
    echo '</tr>';
  }
  ?>
    </table>
</body>
</html>