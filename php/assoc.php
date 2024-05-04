<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $assoc =[
        [
   "name"=>"ali",
   "course"=>"full stack development",
   "join date"=>"20-02-2024"     
    ],
    [
   "name"=>"ali",
   "course"=>"full stack development",
   "join date"=>"20-02-2024"     
    ],
    [
   "name"=>"ali",
   "course"=>"full stack development",
   "join date"=>"20-02-2024"     
    ]

];
    // echo $assoc["name"];
foreach($assoc as $key => $value){
    echo $key."   : ".$value."<br>";

}
    ?>
</body>
</html>