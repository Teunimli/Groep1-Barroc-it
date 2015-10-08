<?php require_once '../header.php';?>
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
        <h2 class="text-center">Edit customer</h2>
        <form action="">
            <div class="grid">
                <div class="col-6">
                    <div class="form-group">
                        <label for="firstname">Customer firstname *:</label>
                        <input type="text" name="firstname" value="<?= $customer['firstname'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="lastname">Customer lastname *:</label>
                        <input type="text" name="lastname" value="<?= $customer['lastname'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="companyname">Company name *:</label>
                        <input type="text" name="companyname" value="<?= $customer['companyname'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="address">address *:</label>
                        <input type="text" name="address"value="<?= $customer['address'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="housenumber">Housenumber *:</label>
                        <input type="text" name="housenumber" value="<?= $customer['housenumber'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="zipcode">Zipcode *:</label>
                        <input type="text" name="zipcode" value="<?= $customer['zipcode'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="city">City *:</label>
                        <input type="text" name="city" value="<?= $customer['city'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="address2">address 2:</label>
                        <input type="text" name="address2" value="<?= $customer['address2'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="housenumber2">Housenumber 2:</label>
                        <input type="text" name="housenumber2" value="<?= $customer['housenumber2'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="zipcode2">Zipcode 2:</label>
                        <input type="text" name="zipcode2" value="<?= $customer['zipcode2'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="city2">City 2:</label>
                        <input type="text" name="city2" value="<?= $customer['city2'] ?>">
                    </div>
                </div><!--end col-6--->

                <div class="col-6">
                    <div class="form-group">
                        <label for="contactperson">Contactperson:</label>
                        <input type="text" name="contactperson" value="<?= $customer['contactperson'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="telephone1">Tel 1:</label>
                        <input type="text" name="telephone1" value="<?= $customer['telephone1'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="telephone2">Tel 2:</label>
                        <input type="text" name="telephone2" value="<?= $customer['telephone2'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="faxnumber">Faxnumber:</label>
                        <input type="text" name="faxnumber" value="<?= $customer['faxnumber'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="<?= $customer['email'] ?>">
                    </div>
                </div><!--end col-6--->

            </div><!--end grid--->
            <input type="submit" value="Edit">
        </form>
        <a href="">Back</a>

    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../footer.php';?>



