<?php require_once '../../header.php';?>
<?php

$id = $_GET['id'];
$sql = "SELECT * FROM tbl_customer WHERE id = :id";
$q = $db->prepare($sql);
$q->bindParam(':id', $id);
$q->execute();

$customer = $q->fetch();

?>
<div class="container">
    <header>
        <div class="top-img">
            <img src="../../assets/img/jumbotron_small.jpg" alt="barroc-it image" class="barroc-img">
            <h1 class="barroc-title">BARROC IT. </h1>
            <h2 class="text-center subhead tophead">Edit Customer</h2>
        </div>
        <form action="../../../app/controllers/authController.php" method="POST">
            <input type="hidden" name="type" value="logout">
            <nav role="navigation" class="navbar navbar-default">

                <ul class="nav navbar-nav">
                    <li><a href="../dashboard/dashboard.php">Home</a></li>
                    <?php if(!in_array("Development",$_SESSION['user'])){ ?><li class="active"><a href="../customers/customerinfo.php?id=<?= $customer['id'] ?>">Customer Info</a></li> <?php } ?>
                    <li><a href="../project/viewprojects.php?id=<?= $customer['id'] ?>">Projects</a></li>
                    <?php if(in_array("Sales",$_SESSION['user']) || in_array("Admin",$_SESSION['user'])) { ?>  <li><a href="../sales/appointments.php?id=<?= $customer['id'] ?>">Appointments</a></li> <?php } ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a><input type="submit" value="LOGOUT" class="logout"></a></li>
                </ul>

            </nav>
        </form>

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
            <input type="hidden" name="type" value="edit">
            <input type="hidden" name="id" value="<?= $customer['id'] ?>" />

            <div class="grid">
                <div class="col-6">
                    <div class="form-group">
                        <label for="contact_name" class="col-4">Contact firstname *:</label>
                        <input type="text" name="contact_name" value="<?= $customer['contact_name']?>">
                    </div>

                    <div class="form-group">
                        <label for="contact_lastname" class="col-4">Contact lastname *:</label>
                        <input type="text" name="contact_lastname" value="<?= $customer['contact_lastname']?>">
                    </div>

                    <div class="form-group">
                        <label for="initials" class="col-4">Initials *:</label>
                        <input type="text" name="initials" value="<?= $customer['initials']?>">
                    </div>

                    <div class="form-group">
                        <label for="companyname" class="col-4">Company name *:</label>
                        <input type="text" name="companyname" value="<?= $customer['companyname']?>">
                    </div>

                    <div class="form-group">
                        <label for="first_adress" class="col-4">Address *:</label>
                        <input type="text" name="first_adress" value="<?= $customer['first_adress']?>">
                    </div>

                    <div class="form-group">
                        <label for="first_zipcode" class="col-4">Zipcode *:</label>
                        <input type="text" name="first_zipcode" value="<?= $customer['first_zipcode']?>">
                    </div>

                    <div class="form-group">
                        <label for="first_city" class="col-4">City *:</label>
                        <input type="text" name="first_city" value="<?= $customer['first_city']?>">
                    </div>

                    <div class="form-group">
                        <label for="first_housenumber" class="col-4">housenumber *:</label>
                        <input type="text" name="first_housenumber" value="<?= $customer['first_housenumber']?>">
                    </div>

                    <div class="form-group">
                        <label for="second_adress" class="col-4">Address 2:</label>
                        <input type="text" name="second_adress" value="<?= $customer['second_adress']?>">
                    </div>

                    <div class="form-group">
                        <label for="second_zipcode" class="col-4">Zipcode 2:</label>
                        <input type="text" name="second_zipcode" value="<?= $customer['second_zipcode']?>">
                    </div>

                    <div class="form-group">
                        <label for="second_city" class="col-4">City 2:</label>
                        <input type="text" name="second_city" value="<?= $customer['second_city']?>">
                    </div>

                    <div class="form-group">
                        <label for="second_housenumber" class="col-4">Housenumber 2:</label>
                        <input type="text" name="second_housenumber" value="<?= $customer['second_housenumber']?>">
                    </div>
                </div><!--end col-6--->

                <div class="col-6">
                    <div class="form-group">
                        <label for="first_telephonenumber" class="col-4">Tel 1 *:</label>
                        <input type="text" name="first_telephonenumber" value="<?= $customer['first_telephonenumber']?>">
                    </div>

                    <div class="form-group">
                        <label for="second_telephonenumber" class="col-4">Tel 2:</label>
                        <input type="text" name="second_telephonenumber" value="<?= $customer['second_telephonenumber']?>">
                    </div>

                    <div class="form-group">
                        <label for="fax" class="col-4">Faxnumber:</label>
                        <input type="text" name="fax" value="<?= $customer['fax']?>">
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-4">Email *:</label>
                        <input type="email" name="email" value="<?= $customer['email']?>">
                    </div>

                    <div class="form-group">
                        <label for="creditworthy" class="col-4">Credit Worthy:</label>
                        <input type="text" name="creditworthy" value="<?php if($customer['creditworthy']) { echo 'Yes'; } else {echo 'No';}?>" <?php if(!in_array("Finance",$_SESSION['user'])) { ?> readonly <?php } ?>>
                    </div>
                    <?php if(in_array("Finance",$_SESSION['user']) || in_array("Admin",$_SESSION['user'])) { ?>
                    <div class="form-group">
                        <label for="ledgeraccountnumber" class="col-4">Ledger account number:</label>
                        <input type="text" name="ledgeraccountnumber" value="<?= $customer['ledgeraccountnumber']?>">
                    </div>

                    <div class="form-group">
                        <label for="taxcode" class="col-4">Taxcode:</label>
                        <input type="text" name="taxcode" value="<?= $customer['taxcode']?>">
                    </div>

                    <div class="form-group">
                        <label for="bkrcheck" class="col-4">BKR-check:</label>
                        <input type="text" name="bkrcheck" value="<?php if($customer['bkrcheck']) { echo 'Yes'; } else {echo 'No';}?>">
                    </div>
                    <?php } ?>

                </div><!--end col-6--->

            </div><!--end grid--->
            <div class="buttons">
                <input class="btn btn-primary" type="submit" value="Save">
                <a style="float: right" class="btn btn-primary" href="customerinfo.php?id=<?= $customer['id'] ?>">Back</a>
            </div>
        </form>


    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>



