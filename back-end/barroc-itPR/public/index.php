<?php require_once __DIR__ . '/header.php';?>
   <!--[if lt IE 7]>
   <!-- <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    <a href="views/customers/add.php" class="btn btn-primary">Add Contact</a>
    <div class="jumbotron ">
        <div class="container">
            <h1 class="text_1">BARROC IT. </h1>
            <h1 class="text_2">SOFTWARE FOR REAL.</h1>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-12" >
                <div class="">
                    <h2 class="subhead">Big Welcome to you!</h2>
                </div>

                <p>BARROC IT offers top notch software solutions on demand.</p> <p>From mainframe to cloud to mobile, BARROC IT helps thousands of businesses around the world manage complex technology to deliver extraordinary business performance. </p>
                <div class="">
                    <h3 class="subhead">Latest news</h3>
                </div>
                <div class="newsitems">
                    <ul>
                        <li>
                            <dt>hightech CMS for BARROC IT by Radius College</dt>
                            <dd>The elite students of the Radius College Development School in Breda has been offered a 'once-in-a-lifetime' chance to deliver a extended CMS system for BARROC IT. Can they pull it off?</dd>
                            <p><i><a href="#">Read More...</a></i></p>
                        </li>
                        <li>
                            <dt>Agile vs. Waterfall: Evaluating the Pros and Cons</dt>
                            <dd>Agile (scrum) and Waterfall are two distinct methods of software development. The Waterfall method cas essentially be described as a linear model of software design.</dd>
                            <p><i><a href="#">Read More...</a></i></p>
                        </li>
                        <li>
                            <dt>Teaching students to properly plan... In 5 steps </dt>
                            <dd>For most students it seems like applying proper planning is a myth. Here's the five simple steps we take at BARROC IT to easily achieve a proper planning for each and every project.</dd>
                            <p><i><a href="#">Read More...</a></i></p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-7 col-sm-12">
                <nav role="navigation" class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collection of nav links and other content for toggling -->
                    <div id="navbarCollapse" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                           
                                <li><a class="btn-secondary" href="#"><b>Dashboard</b></a></li>
                            
                                <li><a class="btn-secondary" href="login.php"><b>Login</b></a></li>
                            
                        </ul>
                    </div>
                </nav>
                <div class="services col-md-12">
                    <h2 class="text-center subhead">SOME OF OUR TOP SERVICES</h2>
                    <div class="service col-md-6">

                        <h3 class=text-center>"ADMINISTRATION DONE RIGHT"</h3>
                        <div class="thumbnail">
                            <p class="text-center">Evictus &copy</p>
                            <img src="assets/img/evictus.png" alt="" class="img-circle">

                            <button class="btn btn-success pull-right clear">FREE TRIAL</button>
                        </div>

                    </div>
                    <div class="service col-md-6">

                        <h3 class=text-center>"WAY BETTER THAN COMTAK"</h3>
                        <div class="thumbnail">
                            <p class="text-center">StudentTracker &copy</p>
                            <img src="assets/img/studentTracker.png" alt="" class="img-circle">

                            <button class="btn btn-success pull-right clear">FREE TRIAL</button>
                        </div>
                    </div>
                    <a href="#" class="pull-right">More Services >></a>

                </div>
            </div>
        </div>
    </div>

    <div class="map">
        <h1 class="text-center subhead">Here's how to find us</h1>
        <iframe style="pointer-events:none" width="100%" height="450" frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?q=terheijdenseweg%20350&amp;key=AIzaSyDEu2V_zELGg5wV3MLYJUQSeyI8sYLq9kc"></iframe>
    </div>
    <div class="row contact">
        <div class="" id="contact_hook">
            <h1 class="text-center subhead">Here's how to get in Contact</h1>
            <div class="col-md-4 col-md-offset-2">

                <form action="http://barroc.radiusdev.nl/form.php" method="post">
                    <h3 class="subhead text-center">Drop us a line!</h3>
                                        <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Message</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control" required></textarea>

                    </div>

                    <input type="submit" value="Send" name="submit_message" class="btn btn-primary">
                </form>
            </div>
            <div class="col-md-6">
                <h3 class="subhead text-center">Contact Details</h3>
                <address class="col-md-5 col-md-offset-1 address">
                    <h4 class="subhead">BARROC IT HEADQUARTERS</h4>
                    <p>Terheijdenseweg 350</p>
                    <p>4826AA Breda</p>
                    <p><span class="glyphicon glyphicon-phone"></span> 076-5733444</p>
                    <p><span class="glyphicon glyphicon-envelope"></span><a href="mailto:f.vangils@rocwb.nl"> info@barroc-it.com</a></p>
                    <p><span class="glyphicon glyphicon-globe"></span><a href="index.php"> www.barroc-it.com</a></p>

                    <h4 class="subhead">Your persons of contact:</h4>

                    <p><b>CEO:</b> Mr. F. van Krimpen <a href="mailto:f.vankrimpen@rocwb.nl"><span class="glyphicon glyphicon-envelope"></span></a></p>
                    </a>

                    <p><b>Financial Director:</b> Mr. M. Pot <a href="mailto:m.pot@rocwb.nl"><span class="glyphicon glyphicon-envelope"></span></a></p>
                    <p><b>Head R&D</b> Mr. S. Dijks <a href="mailto:s.dijks@rocwb.nl"><span class="glyphicon glyphicon-envelope"></span></a></p>
                    <p><b>Sales Director</b> Mr. P. van Steen <a href="mailto:p.vansteen@rocwb.nl"><span class="glyphicon glyphicon-envelope"></span></a></p>


                </address>
            </div>
        </div>
    </div>
    </div>
<div class="row">
<footer>
    <h1 class="subhead text-center">SOFTWARE FOR REAL.</h1>
    <p class="text-center">&copy; BARROC IT |  2014</p>
</footer>
</div>
<script src="../../../../../../../Users/School/GitHub/Groep1-Barroc-it/barroc.radiusdev.nl/js/vendor/jquery-1.11.0.min.js"></script>
<script src="../../../../../../../Users/School/GitHub/Groep1-Barroc-it/barroc.radiusdev.nl/js/vendor/bootstrap.min.js"></script>
<script src="../../../../../../../Users/School/GitHub/Groep1-Barroc-it/barroc.radiusdev.nl/js/main.js"> </script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
   <script src="assets/js/plugins.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>

<?php require_once __DIR__ . '/footer.php';?>


