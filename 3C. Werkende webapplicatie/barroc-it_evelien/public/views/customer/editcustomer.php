<?php require_once '../../header.php';?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM contacts WHERE id = :id";
$q= $db->prepare($sql);
$q->bindParam(':id', $id);
$q->execute();

$customer = $q->fetch();
?>

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
                        <input type="text" name="firstname" value="<?= $customer['contact_name'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="lastname">Customer lastname *:</label>
                        <input type="text" name="lastname" value="<?= $customer['contact_lastname'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="companyname">Company name *:</label>
                        <input type="text" name="companyname" value="<?= $customer['companyname'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="address">address *:</label>
                        <input type="text" name="address"value="<?= $customer['first_address'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="housenumber">Housenumber *:</label>
                        <input type="text" name="housenumber" value="<?= $customer['first_housenumber'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="zipcode">Zipcode *:</label>
                        <input type="text" name="zipcode" value="<?= $customer['first_zipcode'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="city">City *:</label>
                        <input type="text" name="city" value="<?= $customer['first_city'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="address2">address 2:</label>
                        <input type="text" name="address2" value="<?= $customer['second_address'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="housenumber2">Housenumber 2:</label>
                        <input type="text" name="housenumber2" value="<?= $customer['second_housenumber'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="zipcode2">Zipcode 2:</label>
                        <input type="text" name="zipcode2" value="<?= $customer['second_zipcode'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="city2">City 2:</label>
                        <input type="text" name="city2" value="<?= $customer['second_city'] ?>">
                    </div>
                </div><!--end col-6--->

                <div class="col-6">
                    <div class="form-group">
                        <label for="contactperson">Contactperson:</label>
                        <input type="text" name="contactperson" value="<?= $customer['contactperson'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="telephone1">Tel 1:</label>
                        <input type="text" name="telephone1" value="<?= $customer['first_telephonenumber'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="telephone2">Tel 2:</label>
                        <input type="text" name="telephone2" value="<?= $customer['second_telephonenumber'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="faxnumber">Faxnumber:</label>
                        <input type="text" name="faxnumber" value="<?= $customer['fax'] ?>">
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



<?php require_once __DIR__ . '../../footer.php';?>



