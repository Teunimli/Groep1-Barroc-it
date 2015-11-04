<?php require_once '../../header.php';?>
<?php

$id = $_GET['id'];
$sql = "SELECT * FROM tbl_customer WHERE id = :id";
$q = $db->prepare($sql);
$q->bindParam(':id', $id);
$q->execute();

$contact = $q->fetch();

?>

    <header>


        <nav role="navigation" class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->

            <!-- Collection of nav links and other content for toggling -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="../dashboard/dashboard.php">Home</a></li>

                </ul>

            </div>
        </nav>

    </header>
<div class="container">
    <div class="container-content">

        <form action="../../../app/controllers/customercontroller.php" method="POST">
            <div class="message">
                <?php
                if($messageBag->hasMsg()){
                    echo $messageBag->show();
                }
                ?>
            </div>
            <h2 class="text-center subhead">Edit customer</h2>
            <input type="hidden" name="type" value="edit">
            <input type="hidden" name="id" value="<?= $contact['id'] ?>" />

            <div class="grid">
                <div class="col-6">
                    <div class="form-group">
                        <label for="contact_name" class="col-4">Contact firstname *:</label>
                        <input type="text" name="contact_name" value="<?= $contact['contact_name']?>">
                    </div>

                    <div class="form-group">
                        <label for="contact_lastname" class="col-4">Contact lastname *:</label>
                        <input type="text" name="contact_lastname" value="<?= $contact['contact_lastname']?>">
                    </div>

                    <div class="form-group">
                        <label for="initials" class="col-4">Initials *:</label>
                        <input type="text" name="initials" value="<?= $contact['initials']?>">
                    </div>

                    <div class="form-group">
                        <label for="companyname" class="col-4">Company name *:</label>
                        <input type="text" name="companyname" value="<?= $contact['companyname']?>">
                    </div>

                    <div class="form-group">
                        <label for="first_adress" class="col-4">Address *:</label>
                        <input type="text" name="first_adress" value="<?= $contact['first_adress']?>">
                    </div>

                    <div class="form-group">
                        <label for="first_zipcode" class="col-4">Zipcode *:</label>
                        <input type="text" name="first_zipcode" value="<?= $contact['first_zipcode']?>">
                    </div>

                    <div class="form-group">
                        <label for="first_city" class="col-4">City *:</label>
                        <input type="text" name="first_city" value="<?= $contact['first_city']?>">
                    </div>

                    <div class="form-group">
                        <label for="first_housenumber" class="col-4">housenumber *:</label>
                        <input type="text" name="first_housenumber" value="<?= $contact['first_housenumber']?>">
                    </div>

                    <div class="form-group">
                        <label for="second_adress" class="col-4">Address 2:</label>
                        <input type="text" name="second_adress" value="<?= $contact['second_adress']?>">
                    </div>

                    <div class="form-group">
                        <label for="second_zipcode" class="col-4">Zipcode 2:</label>
                        <input type="text" name="second_zipcode" value="<?= $contact['second_zipcode']?>">
                    </div>

                    <div class="form-group">
                        <label for="second_city" class="col-4">City 2:</label>
                        <input type="text" name="second_city" value="<?= $contact['second_city']?>">
                    </div>

                    <div class="form-group">
                        <label for="second_housenumber" class="col-4">Housenumber 2:</label>
                        <input type="text" name="second_housenumber" value="<?= $contact['second_housenumber']?>">
                    </div>
                </div><!--end col-6--->

                <div class="col-6">
                    <div class="form-group">
                        <label for="first_telephonenumber" class="col-4">Tel 1:</label>
                        <input type="text" name="first_telephonenumber" value="<?= $contact['first_telephonenumber']?>">
                    </div>

                    <div class="form-group">
                        <label for="second_telephonenumber" class="col-4">Tel 2:</label>
                        <input type="text" name="second_telephonenumber" value="<?= $contact['second_telephonenumber']?>">
                    </div>

                    <div class="form-group">
                        <label for="fax" class="col-4">Faxnumber:</label>
                        <input type="text" name="fax" value="<?= $contact['fax']?>">
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-4">Email:</label>
                        <input type="email" name="email" value="<?= $contact['email']?>">
                    </div>

                    <div class="form-group">
                        <label for="ledgeraccountnumber" class="col-4">Ledger account number:</label>
                        <input type="text" name="ledgeraccountnumber" value="<?= $contact['ledgeraccountnumber']?>">
                    </div>

                    <div class="form-group">
                        <label for="taxcode" class="col-4">Taxcode:</label>
                        <input type="text" name="taxcode" value="<?= $contact['taxcode']?>">
                    </div>

                    <div class="form-group">
                        <label for="creditworthy" class="col-4">Credit Worthy:</label>
                        <input type="text" name="creditworthy" value="<?php if($contact['creditworthy']) { echo 'Yes'; } else {echo 'No';}?>">
                    </div>

                    <div class="form-group">
                        <label for="bkrcheck" class="col-4">BKR-check:</label>
                        <input type="text" name="bkrcheck" value="<?php if($contact['bkrcheck']) { echo 'Yes'; } else {echo 'No';}?>">
                    </div>

                    <div class="form-group">
                        <label for="open_project" class="col-4">Open project:</label>
                        <input type="text" name="open_project" value="<?php if($contact['open_project']) { echo 'Yes'; } else {echo 'No';}?>">
                    </div>

                </div><!--end col-6--->

            </div><!--end grid--->
        <div class="buttons">
            <input type="submit" value="Save" class="btn btn-primary">
            </form>
            <a onclick="goBack()" class="btn btn-primary">Back</a>
        </div>

    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>



