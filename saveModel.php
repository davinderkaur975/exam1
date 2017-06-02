<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saving information</title>
</head>
<body>
<?php

$manufacturers = $_POST['manufacturers'];
echo 'manufacturers: '.$manufacturers.'<br />';



//Step 1: Connect to the database
$conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361589','gc200361589', 'RUxpI_An__');
//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Step 2: create the SQL command to INSERT a record

               $sql = "INSERT INTO cars (year, make, model, colour, milage)
        VALUES  (:year, :make, :model, :colour, :milage);";

//Step 3: Prepare the SQL command and bind the arguments to prevent SQL injection
$cmd = $conn->prepare($sql);
$cmd->bindParam(':year', $year, PDO::PARAM_INT);
$cmd->bindParam(':make', $make, PDO::PARAM_STR, 30);
$cmd->bindParam(':model', $model, PDO::PARAM_STR, 20);
$cmd->bindParam(':colour', $colour, PDO::PARAM_STR, 20);
$cmd->bindParam(':milage', $milage, PDO::PARAM_INT);


//Step 4: execute
$cmd->execute();

//Step 5: disconnec
//t from the database
$conn = null;

//Step 6: redirect to the albums page
header('location:model.php');

?>
</body>
</html>
