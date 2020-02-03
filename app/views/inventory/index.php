<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vehicle Inventory</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">

    <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Long of Chattanooga</h1>
    <h3 class="font-weight-light text-center text-lg-left mt-4 mb-0">Vehicle Inventory</h3>

    <hr class="mt-2 mb-5">

    <div class="row text-center text-lg-left">
    <?php
        foreach ($data as $vehicleArr) {
            foreach ($vehicleArr as $key=>$value) {
             }
            echo "<div class=\"col-lg-3 col-md-4 col-6\">";
            echo "<a href=\"http://localhost/vehicle/display/".$vehicleArr['autoId']."\" class=\"d-block mb-4 h-100\">";
            echo "<img class=\"img-fluid img-thumbnail\" src=\"/images/image".$vehicleArr['autoId'].".jpg\" alt=\"\">";
            echo "</a><BR>".$vehicleArr['year']." ".$vehicleArr['make']." ".$vehicleArr['model']."<BR>".$vehicleArr['newused']." - ".$vehicleArr['price']." - ".$vehicleArr['miles']." miles<BR>";
            echo "</div>";
        }
    ?>
    </div>


    <div class="text-center">
        <BR><BR><BR><a href="/index.php"><button type="button" class="btn btn-info">Sign Out</button></a>
    </div>

</div>
</body>
</html>
