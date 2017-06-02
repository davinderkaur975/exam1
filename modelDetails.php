<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Model Details</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<body>
<main class="container">
    <h1>Model Details</h1>

    <!--        set action attribute for form-->
    <form method="post" action="saveModel.php">
        <fieldset class="form-group">
            <label for="manufacturers" class="col-sm-1">Make: *</label>
            <select name="manufacturers" id="manufacturers">
                <?php
                //Step 1- connect to the DB
                $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361589','gc200361589', 'RUxpI_An__');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //Step 2- create the SQL statement
                $sql = "SELECT * FROM manufacturers";
                //Step 3- prepare & execute the SQL statement
                $cmd = $conn->prepare($sql);
                $cmd->execute();
                $manufacturers = $cmd->fetchAll();
                //Step 4- loop over the results to build the list with <option> </option>
                foreach ($manufacturers as $manufacturer)
                {

                    echo '<option>' . $manufacturer['manufacturer'] . '</option>';

                }
                //Step 5- disconnect from the database
                $conn = null;

                ?>
            </select>
        </fieldset>
        <button class="btn btn-success col-sm-offset-1">Save model</button>
        </form>
    </main>
</body>
        <!--Latest jQuery -->
<script src="js/jquery-3.2.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>
</html>
