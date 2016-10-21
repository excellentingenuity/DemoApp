<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="../css/dashboard.css" type="text/css" rel="stylesheet" />
    <script>
        window.Laravel = <?php echo json_encode([
                                                        'csrfToken' => csrf_token(),
                                                ]); ?>
    </script>

</head>
<body>
<div id="dashboard" class="container">
    <header class="row">
        <nav class="navbar navbar-default navbar-static-top col-md-12">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('dashboard/') }}">Dashboard</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('dashboard/expos/') }}">Expos</a></li>
                        <li><a href="#">Reservations</a></li>
                        <li><a href="#">Locations</a></li>
                        <li><a href="#">Companies</a></li>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </header>
    @yield('content')
    <footer class="row">
        <div class="col-md-12 container">
            <p class="copyright">
                &copy; 2016 Excellent InGenuity LLC
            </p>
        </div>
        <div class="col-md-12">
            <p class="version">
                Version 1.0.0
            </p>
        </div>
    </footer>

</div>
<script src="../js/dashboard.js"></script>
</body>
</html>