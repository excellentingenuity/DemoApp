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
                            <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">Link</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">One more separated link</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-left">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Link</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>
        <section class="row">
            <div class="col-md-5 col-md-offset-1 metrics">
                <div class="col-md-10 col-md-offset-1 metrics-widget">
                    <h3>Metrics</h3>
                    <ul>
                        <li>Expos: {{ $expos }}</li>
                        <li>Reservations: {{ $reservations }}</li>
                        <li>Locations: {{ $locations }}</li>
                        <li>Companies: {{ $companies }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5 col-md-offset-1 upcoming-expos">
                <div class="col-md-10 col-md-offset-1 upcoming-expos-widget">
                    <h3>Upcoming Expos</h3>
                    <ul>
                        DO v-for expos from /api/expos/upcoming
                    </ul>
                </div>
            </div>
        </section>
        <footer class="row navbar navbar-fixed-bottom">
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