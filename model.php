<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Model Description</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<body>
<h1>Model Description</h1>
<a href="modelDetails.php">Select a different model</a>

<?php
//Step 1: connect to the database
$conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361589','gc200361589', 'RUxpI_An__');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Step 2: create a SQL command
$sql = "SELECT * FROM cars";

//Step 3: prepare the SQL command
$cmd = $conn->prepare($sql);

//Step 4: execute and store the results
$cmd->execute();
$cars = $cmd->fetchAll();
//Step 5: disconnect from the db
$conn = null;

//create a table and display the results
echo '<table class="table table-striped table-hover">
                <tr>
                    <th>year</th>
                    <th>make</th>
                    <th>model</th>
                    <th>colour</th>
                    <th>milage</th></tr>';
foreach($cars as $car)
{
    echo '<tr><td>'. $car['year'].'</td>
                        <td>'.$car['make'].'</td>
                        <td>'.$car['model'].'</td>
                        <td>'.$car['colour'].'</td>
                        <td>'.$car['milage'].'</td></tr>';
}
echo '</table>';
?>
</body>
<!--Latest jQuery -->
<script src="js/jquery-3.2.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>

</html>
