<?php require_once '../../header.php';?>
<?php

$id = $_GET['id'];
$sql = "SELECT * FROM tbl_customer WHERE id = :id";
$q = $db->prepare($sql);
$q->bindParam(':id', $id);
$q->execute();

$contact = $q->fetch();

?>
<div class="container">
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
    <div class="container-content">

    <form action="../../../app/controllers/customercontroller.php" method="POST">
        <div class="message">
            <?php
            if($messageBag->hasMsg()){
                echo $messageBag->show();
            }
            ?>
        </div>
         <h2 class="text-center">Edit customer</h2>
         <input type="hidden" name="type" value="edit">
        <input type="hidden" name="id" value="<?= $contact['id'] ?>" />

        <div class="grid">
            <div class="col-6">
                <div class="form-group">
                    <label for="contact_name">Contact firstname *:</label>
                    <input type="text" name="contact_name" value="<?= $contact['contact_name']?>">
                </div>

                <div class="form-group">
                    <label for="contact_lastname">Contact lastname *:</label>
                    <input type="text" name="contact_lastname" value="<?= $contact['contact_lastname']?>">
                </div>

                <div class="form-group">
                    <label for="initials">Initials *:</label>
                    <input type="text" name="initials" value="<?= $contact['initials']?>">
                </div>

                <div class="form-group">
                    <label for="companyname">Company name *:</label>
                    <input type="text" name="companyname" value="<?= $contact['companyname']?>">
                </div>

                <div class="form-group">
                    <label for="first_adress">address *:</label>
                    <input type="text" name="first_adress" value="<?= $contact['first_adress']?>">
                </div>

                <div class="form-group">
                    <label for="first_zipcode">Zipcode *:</label>
                    <input type="text" name="first_zipcode" value="<?= $contact['first_zipcode']?>">
                </div>

                <div class="form-group">
                    <label for="first_city">City *:</label>
                    <input type="text" name="first_city" value="<?= $contact['first_city']?>">
                </div>

                <div class="form-group">
                    <label for="first_housenumber">housenumber *:</label>
                    <input type="text" name="first_housenumber" value="<?= $contact['first_housenumber']?>">
                </div>

                <div class="form-group">
                    <label for="second_adress">address 2:</label>
                    <input type="text" name="second_adress" value="<?= $contact['second_adress']?>">
                </div>

                <div class="form-group">
                    <label for="second_zipcode">Zipcode 2:</label>
                    <input type="text" name="second_zipcode" value="<?= $contact['second_zipcode']?>">
                </div>

                <div class="form-group">
                    <label for="second_city">City 2:</label>
                    <input type="text" name="second_city" value="<?= $contact['second_city']?>">
                </div>

                <div class="form-group">
                    <label for="second_housenumber">Housenumber 2:</label>
                    <input type="text" name="second_housenumber" value="<?= $contact['second_housenumber']?>">
                </div>
            </div><!--end col-6--->

            <div class="col-6">
                <div class="form-group">
                    <label for="first_telephonenumber">Tel 1:</label>
                    <input type="text" name="first_telephonenumber" value="<?= $contact['first_telephonenumber']?>">
                </div>

                <div class="form-group">
                    <label for="second_telephonenumber">Tel 2:</label>
                    <input type="text" name="second_telephonenumber" value="<?= $contact['second_telephonenumber']?>">
                </div>

                <div class="form-group">
                    <label for="fax">Faxnumber:</label>
                    <input type="text" name="fax" value="<?= $contact['fax']?>">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="<?= $contact['email']?>">
                </div>
                <?php if(in_array("Finance",$_SESSION['user'])) { ?>
                <div class="form-group">
                    <label for="ledgeraccountnumber">Ledger account number:</label>
                    <input type="text" name="ledgeraccountnumber" value="<?= $contact['ledgeraccountnumber']?>">
                </div>

                <div class="form-group">
                    <label for="taxcode">Taxcode:</label>
                    <input type="text" name="taxcode" value="<?= $contact['taxcode']?>">
                </div>

                <div class="form-group">
                    <label for="creditworthy">Credit Worthy:</label>
                    <input type="text" name="creditworthy" value="<?php if($contact['creditworthy']) { echo 'Yes'; } else {echo 'No';}?>">
                </div>

                <div class="form-group">
                    <label for="bkrcheck">BKR-check:</label>
                    <input type="text" name="bkrcheck" value="<?php if($contact['bkrcheck']) { echo 'Yes'; } else {echo 'No';}?>">
                </div>

                <div class="form-group">
                    <label for="open_project">Open project:</label>
                    <input type="text" name="open_project" value="<?php if($contact['open_project']) { echo 'Yes'; } else {echo 'No';}?>">
                </div>
                <?php } ?>
            </div><!--end col-6--->

        </div><!--end grid--->
        <input type="submit" value="Save">
    </form>
        <a onclick="goBack()">Back</a>

    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>



