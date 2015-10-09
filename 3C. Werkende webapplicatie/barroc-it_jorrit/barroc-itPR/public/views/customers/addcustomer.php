<?php require_once '../../header.php';?>
<div class="contaier">
    <header>


        <nav role="navigation" class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->

            <!-- Collection of nav links and other content for toggling -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>

                </ul>

            </div>
        </nav>

    </header>
    <div class="container-content">

    <form action="../../../app/controllers/customercontroller.php" method="POST">
         <h2 class="text-center">Add customer</h2>
         <input type="hidden" name="type" value="add">

        <div class="grid">
            <div class="col-6">
                <div class="form-group">
                    <label for="contact_name">Contact firstname *:</label>
                    <input type="text" name="contact_name">
                </div>

                <div class="form-group">
                    <label for="contact_lastname">Contact lastname *:</label>
                    <input type="text" name="contact_lastname">
                </div>

                <div class="form-group">
                    <label for="initials">Initials *:</label>
                    <input type="text" name="initials">
                </div>

                <div class="form-group">
                    <label for="companyname">Company name *:</label>
                    <input type="text" name="companyname">
                </div>

                <div class="form-group">
                    <label for="first_adress">address *:</label>
                    <input type="text" name="first_adress">
                </div>

                <div class="form-group">
                    <label for="first_zipcode">Zipcode *:</label>
                    <input type="text" name="first_zipcode">
                </div>

                <div class="form-group">
                    <label for="first_city">City *:</label>
                    <input type="text" name="first_city">
                </div>

                <div class="form-group">
                    <label for="first_housenumber">housenumber *:</label>
                    <input type="text" name="first_housenumber">
                </div>

                <div class="form-group">
                    <label for="second_adress">address 2:</label>
                    <input type="text" name="second_adress">
                </div>

                <div class="form-group">
                    <label for="second_zipcode">Zipcode 2:</label>
                    <input type="text" name="second_zipcode">
                </div>

                <div class="form-group">
                    <label for="second_city">City 2:</label>
                    <input type="text" name="second_city">
                </div>

                <div class="form-group">
                    <label for="second_housenumber">Housenumber 2:</label>
                    <input type="text" name="second_housenumber">
                </div>
            </div><!--end col-6--->

            <div class="col-6">
                <div class="form-group">
                    <label for="first_telephonenumber">Tel 1:</label>
                    <input type="text" name="first_telephonenumber">
                </div>

                <div class="form-group">
                    <label for="second_telephonenumber">Tel 2:</label>
                    <input type="text" name="second_telephonenumber">
                </div>

                <div class="form-group">
                    <label for="fax">Faxnumber:</label>
                    <input type="text" name="fax">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email">
                </div>
            </div><!--end col-6--->

        </div><!--end grid--->
        <input type="submit" value="Create">
    </form>
        <a href="">Back</a>

    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>



