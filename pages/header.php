<!DOCTYPE html>

<html lang="en">

    <head>

        <!-- https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta -->
        <meta charset="utf-8"/>
        <meta content="initial-scale=1, width=device-width" name="viewport"/>

        <!-- documentation at http://getbootstrap.com/, alternative themes at https://www.bootstrapcdn.com/bootswatch/ -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>

        <!-- site's own stylesheet -->
		<link href="static/style.css" rel="stylesheet"/>
		
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
        <title>Medihisne</title>

    </head>

    <body>

        <div class="container-fluid">
			<!-- start of nav bar -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button aria-expanded="false" class="navbar-toggle collapsed" data-target="#navbar" data-toggle="collapse" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">NameLess</span></a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar">
                        <?php if(!empty($_SESSION['id'])): ?>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-camera"></span> Hey <?php echo $_SESSION["name"]; ?>!
									<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
										<li><a href="#">Waiting to be discover</a></li>
										
									</ul>
								</li>
                            </ul>
                        <?php else: ?>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in"></span> Log In</a></li>
                                <li><a href="register.php" ><span class="glyphicon glyphicon-user"></span> Register</a></li>
                            </ul>
                        <?php endif ?>
                    </div>
                </div>
            </nav>
			<!-- End of nav bar -->
			
			<!-- Start of the main content -->
            <main>