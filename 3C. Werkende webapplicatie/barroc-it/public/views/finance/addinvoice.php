<?php require_once '../../header.php';?>
<?php

$id = $_GET['id'];
$sql = "SELECT * FROM tbl_projects WHERE id = :id";
$q = $db->prepare($sql);
$q->bindParam(':id', $id);
$q->execute();

$project = $q->fetch();


$customerid = $_GET['customerid'];
$sql = "SELECT * FROM tbl_customer WHERE id = :id";
$q = $db->prepare($sql);
$q->bindParam(':id', $customerid);
$q->execute();

$customer = $q->fetch();

?>
<div class="container">
    <header>
        <div class="top-img">
            <img src="../../assets/img/jumbotron_small.jpg" alt="barroc-it image" class="barroc-img">
            <h1 class="barroc-title">BARROC IT. </h1>
            <h2 class="text-center subhead tophead">Add Invoice</h2>
        </div>
        <form action="../../../app/controllers/authController.php" method="POST">
            <input type="hidden" name="type" value="logout">
            <nav role="navigation" class="navbar navbar-default">

                <ul class="nav navbar-nav">
                    <li><a href="../dashboard/dashboard.php">Home</a></li>
                    <li><a href="../customers/customerinfo.php?id=<?= $customer['id'] ?>">Customer Info</a></li>
                    <li class="active"><a href="../project/viewprojects.php?id=<?= $customer['id'] ?>">Projects</a></li>
                    <?php if(in_array("Sales",$_SESSION['user']) || in_array("Admin",$_SESSION['user'])) { ?>  <li><a href="../sales/appointments.php?id=<?= $customer['id'] ?>">Appointments</a></li> <?php } ?>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a><input type="submit" value="LOGOUT" class="logout"></a></li>
                    </ul>


            </nav>
        </form>

    </header>
    <div class="container-content">

        <form action="<? echo '../../../app/controllers/invoiceController.php'?>"  method="POST">
            <div class="message">
                <?php
                if($messageBag->hasMsg()){
                    echo $messageBag->show();
                }
                ?>
            </div>
            <h2 class="text-center">Add invoice</h2>
            <input type="hidden" name="type" value="add">
            <input type="hidden" name="customerid" value="<?= $customer['id'] ?>" />
            <input type="hidden" name="id" value="<?= $project['id'] ?>" />

            <div class="grid">
                <div class="col-6">
                    <div class="form-group">
                        <label for="contact_name" class="col-4">Contact firstname:</label>
                        <input type="text" name="contact_name" value="<?= $customer['contact_name']?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="contact_lastname" class="col-4">Contact lastname:</label>
                        <input type="text" name="contact_lastname" value="<?= $customer['contact_lastname']?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="companyname" class="col-4">Company name:</label>
                        <input type="text" name="companyname" value="<?= $customer['companyname']?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="first_adress" class="col-4">address:</label>
                        <input type="text" name="first_adress" value="<?= $customer['first_adress']?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="first_zipcode" class="col-4">Zipcode:</label>
                        <input type="text" name="first_zipcode" value="<?= $customer['first_zipcode']?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="first_city" class="col-4">City*:</label>
                        <input type="text" name="first_city" value="<?= $customer['first_city']?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="first_housenumber" class="col-4">housenumber:</label>
                        <input type="text" name="first_housenumber" value="<?= $customer['first_housenumber']?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="first_telephonenumber" class="col-4">Tel 1:</label>
                        <input type="text" name="first_telephonenumber" value="<?= $customer['first_telephonenumber']?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="second_telephonenumber" class="col-4">Tel 2:</label>
                        <input type="text" name="second_telephonenumber" value="<?= $customer['second_telephonenumber']?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-4">Email:</label>
                        <input type="email" name="email" value="<?= $customer['email']?>" readonly>
                    </div>

                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="projectname" class="col-4">Projectname:</label>
                        <input type="text" name="projectname" value="<?= $project['projectname']?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="project_start_date" class="col-4">Project start date:</label>
                        <input type="date" name="project_start_date" value="<?= date('Y-m-d',$project['start_date'])?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="project_end_date" class="col-4">Project end date:</label>
                        <input type="date" name="project_end_date" value="<?= date('Y-m-d',$project['end_date'])?>"readonly>
                    </div>

                </div><!--end col-6--->

                <div class="col-6">
                    <div class="form-group">
                        <label for="date_of_invoie" class="col-4">today date:*</label>
                        <input type="date" name="date_of_invoie">
                    </div>

                    <div class="form-group">
                        <label for="end_invoice_date" class="col-4">Expiration date*:</label>
                        <input type="date" name="end_invoice_date">
                    </div>

                    <div class="form-group">
                        <label for="invoicenumber" class="col-4">Invoice number:*</label>
                        <input type="text" name="invoicenumber">
                    </div>

                </div><!--end col-6--->
            </div><!--end grid--->
            <div class="grid">
                <div class="col-9">
                    <h2>Activities*</h2>
                    <div class="form-group">
                        <textarea name="activities"></textarea>
                    </div>
                </div>
                <div class="col-3">
                    <h2>Price*</h2>
                    <div class="form-group">
                        <input type="text" name="price">
                    </div>
                </div>
                <p>* You must fill these fields in</p>
            </div><!--end grid--->
            <div class="buttons">
                <input class="btn btn-primary" type="submit" value="Submit">
                <a style="float: right" class="btn btn-primary" onclick="goBack()">Back</a>
            </div>
        </form>


    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>



