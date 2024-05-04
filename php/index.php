<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table{
        border-collapse: collapse;
        width: 300px;
    }
</style>
<body>
    <?php
echo "<h1>this is php topic</h1>";
$x = "this is php topic";
?>
 <?php 
    for ($i = 1; $i <8 ; $i++) {
  
?>

<h2><?php echo $x . " ".$i?></h2>
<?php
    }?>

   <h1> table of 2</h1>
   <table border="1">
    <?php
    for($i = 1; $i<=20;$i++){
       ?>
       <tr>
    <td>2</td>
    <td>X</td>
    <td><?php echo $i ?></td>
    <td>=</td>
    <td><?php echo $i*2 ?></td>
</tr> 
       
       <?php 
    }
    ?>
  
</table>  
</body>
</html>