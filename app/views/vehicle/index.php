<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vehicle Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">


    <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Long of Chattanooga</h1>
    <h3 class="font-weight-light text-center text-lg-left mt-4 mb-0">Vehicle Details</h3>

    <hr class="mt-2 mb-5">

    <div class="row text-center text-lg-left">


        <a href="http://localhost/inventory/display" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="/images/image<?=$data['autoId']?>.jpg" alt="">
        </a><BR><?=$data['year']?> <?=$data['make']?> <?=$data['model']?><BR><?=$data['newused']?> - <?=$data['price']?> - <?=$data['miles']?> miles<BR>

    </div>

    <div class="text-center">
        <BR><BR><a href="http://localhost/inventory/display"><button type="button" class="btn btn-success">Back to Inventory</button></a> <BR><BR><BR><BR><a href="/index.php"><button type="button" class="btn btn-info">Sign Out</button></a>
    </div>

</div>
</body>
</html>
