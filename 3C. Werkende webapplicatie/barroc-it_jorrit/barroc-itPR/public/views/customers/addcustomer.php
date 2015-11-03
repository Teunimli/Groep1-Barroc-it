<?php require_once '../../header.php';?>
<div class="container">
    <header>
        <div class="top-img">
            <img src="../../assets/img/jumbotron_small.jpg" alt="barroc-it image" class="barroc-img">
            <h1 class="barroc-title">BARROC IT. </h1>
            <h2 class="text-center subhead tophead">Add Customer</h2>
        </div>

        <nav role="navigation" class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->

            <!-- Collection of nav links and other content for toggling -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <div class="message">
                        <?php
                        if($messageBag->hasMsg()){
                            echo $messageBag->show();
                        }
                        ?>
                    </div>
                    <li class="active"><a href="../dashboard/dashboard.php">Home</a></li>

                </ul>

            </div>
        </nav>

    </header>
    <div class="container-content">

        <form action="../../../app/controllers/customercontroller.php" method="POST">
            <input type="hidden" name="type" value="add">

            <div class="grid">
                <div class="col-6">
                    <div class="form-group">
                        <label for="contact_name" class="col-4 ">Contact firstname *:</label>
                        <input type="text" name="contact_name">
                    </div>

                    <div class="form-group">
                        <label for="contact_lastname" class="col-4">Contact lastname *:</label>
                        <input type="text" name="contact_lastname">
                    </div>

                    <div class="form-group">
                        <label for="initials" class="col-4">Initials *:</label>
                        <input type="text" name="initials">
                    </div>

                    <div class="form-group">
                        <label for="companyname" class="col-4">Company name *:</label>
                        <input type="text" name="companyname">
                    </div>

                    <div class="form-group">
                        <label for="first_adress" class="col-4">Address *:</label>
                        <input type="text" name="first_adress">
                    </div>

                    <div class="form-group">
                        <label for="first_zipcode" class="col-4">Zipcode *:</label>
                        <input type="text" name="first_zipcode">
                    </div>

                    <div class="form-group">
                        <label for="first_city" class="col-4">City *:</label>
                        <input type="text" name="first_city">
                    </div>

                    <div class="form-group">
                        <label for="first_housenumber" class="col-4">housenumber *:</label>
                        <input type="text" name="first_housenumber">
                    </div>

                    <div class="form-group">
                        <label for="second_adress" class="col-4">Address 2:</label>
                        <input type="text" name="second_adress">
                    </div>

                    <div class="form-group">
                        <label for="second_zipcode" class="col-4">Zipcode 2:</label>
                        <input type="text" name="second_zipcode">
                    </div>

                    <div class="form-group">
                        <label for="second_city" class="col-4">City 2:</label>
                        <input type="text" name="second_city">
                    </div>

                    <div class="form-group">
                        <label for="second_housenumber" class="col-4">Housenumber 2:</label>
                        <input type="text" name="second_housenumber">
                    </div>
                </div><!--end col-6--->

                <div class="col-6">
                    <div class="form-group">
                        <label for="first_telephonenumber" class="col-4">Tel 1:</label>
                        <input type="text" name="first_telephonenumber">
                    </div>

                    <div class="form-group">
                        <label for="second_telephonenumber" class="col-4">Tel 2:</label>
                        <input type="text" name="second_telephonenumber">
                    </div>

                    <div class="form-group">
                        <label for="fax" class="col-4">Faxnumber:</label>
                        <input type="text" name="fax">
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-4">Email:</label>
                        <input type="email" name="email">
                    </div>
                </div><!--end col-6--->

            </div><!--end grid--->
            <input class="btn btn-primary" type="submit" value="Create">
            <a class="btn btn-primary" onclick="goBack()">Back</a>
        </form>


    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>



