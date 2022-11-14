<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .spades, .slubs {
            color: black ;
        }
        .hearts, .diams {
            color: red;
        }
    </style>
</head>
<body>
<?php
   $score = explode(',','A,2,3,4,5,6,7,8,9,10,J,Q,K');
   $suite = ['spades','clubs','hearts','diams'];
   $deck = [];
   foreach ($score as $sc){
     foreach($suite as $su){
        $deck[] = ['score' =>$sc, 'suite' =>$su];
     }
   }
   $keys = array_rand($deck,2);
   $card1 = $deck[$keys[0]];
   $card2 = $deck[$keys[1]];
   echo '<h1>ไพ่ที่ได้</h1>';
   echo "<h1>";
   echo '<span class = "' . $card1['suite'] . '">';
   echo "{$card1['score']}&{$card1['suite']};";
   echo '</span>';
   echo '+';
   echo '<span class="' . $card2['suite'] .'">';
   echo "{$card2['score']}&{$card2['suite']};";
   echo '</span>';
   echo "</h1>";
?>
</body>
</html>