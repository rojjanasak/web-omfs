<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
    <style>
	.card-map {
    /* padding: 0px !important; */
	}

	#map {
		height: 600px;
		width: 100%;
	}
	
	
	</style>

</head>


<body>

    <div class="container" style="padding: 10px">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-map">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
         </div>
    </div>
</body>
<script src="query.js"></script>

</html>