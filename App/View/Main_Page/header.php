<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="<?php echo PUBLICS."css\product.css"; ?>"> -->

    <style>
        <?php
        require PUBLICS . "css" . DIRECTORY_SEPARATOR . "product.css";
        ?>
    </style>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        .footer {
            text-align: center;

        }
    </style>
    <title>Main page</title>
</head>

<body>
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <nav class="navbar navbar-inverse" style="margin-bottom: 0;">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Manga</a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav">
                                <!-- <li class="active"><a href="#">Home</a></li> -->
                                <li>
                                    <form class="form-inline navbar-form" action="">
                                        <input type="text" class="form-control" name="search_name" placeholder="Search">
                                        <button class="btn btn-info btn-md" type="submit">
                                            <i class="glyphicon glyphicon-search"></i>
                                    </form>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <nav class="navbar navbar-default">
                    <div class="container">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="#"><span class="glyphicon glyphicon-home"> Home</span></a>
                            </li>
                            <li><a href="#">Hot</a></li>
                            <li><a href="#">Follow </a></li>
                            <li><a href="#">History</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Category <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Adventure</a></li>
                                    <li><a href="#">Fantasy</a></li>
                                    <li><a href="#">Isekai</a></li>
                                    <li><a href="#">Drama</a></li>
                                    <li><a href="#">Love story</a></li>
                                    <li><a href="#">Other</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Rank <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Most views</a></li>
                                    <li><a href="#">Most rates</a></li>
                                    <li><a href="#">Other</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>