<?php require_once '../../header.php';?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_customer WHERE id = :id";
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
                    <li class="active"><a href="../dashboard/dashboard.php">Home</a></li>

                </ul>

            </div>
        </nav>

    </header>
    <div class="container-content">
        <h2 class="text-center">Customer information</h2>
        <form action="">
            <div class="message">
                <?php
                if($messageBag->hasMsg()){
                    echo $messageBag->show();
                }
                ?>
            </div>
            <input type="hidden" name="id" value="<?= $customer['id'] ?>"/>
            <div class="grid">
                <div class="col-6">
                    <div class="form-group">
                        <label for="customerid" class="col-4">Customer id:</label>
                        <input type="text" name="firstname" value="<?= $customer['id'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-4">Customer firstname:</label>
                        <input type="text" name="firstname" value="<?= $customer['contact_name'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="lastname" class="col-4">Customer lastname:</label>
                        <input type="text" name="lastname" value="<?= $customer['contact_lastname'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="companyname" class="col-4">Company name:</label>
                        <input type="text" name="companyname" value="<?= $customer['companyname'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="first_adress" class="col-4">Address:</label>
                        <input type="text" name="first_adress"value="<?= $customer['first_adress'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="housenumber" class="col-4">Housenumber:</label>
                        <input type="text" name="housenumber" value="<?= $customer['first_housenumber'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="zipcode" class="col-4">Zipcode:</label>
                        <input type="text" name="zipcode" value="<?= $customer['first_zipcode'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="city" class="col-4">City:</label>
                        <input type="text" name="city" value="<?= $customer['first_city'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="second_adress"class="col-4">Address 2:</label>
                        <input type="text" name="second_adress" value="<?= $customer['second_adress'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="housenumber2" class="col-4">Housenumber 2:</label>
                        <input type="text" name="housenumber2" value="<?= $customer['second_housenumber'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="zipcode2" class="col-4">Zipcode 2:</label>
                        <input type="text" name="zipcode2" value="<?= $customer['second_zipcode'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="city2" class="col-4">City 2:</label>
                        <input type="text" name="city2" value="<?= $customer['second_city'] ?>" readonly>
                    </div>
                </div><!--end col-6--->
                <div class="col-6">
                    <div class="form-group">
                        <label for="telephone1" class="col-4">Tel 1:</label>
                        <input type="text" name="telephone1" value="<?= $customer['first_telephonenumber'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="telephone2" class="col-4">Tel 2:</label>
                        <input type="text" name="telephone2" value="<?= $customer['second_telephonenumber'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="faxnumber" class="col-4">Faxnumber:</label>
                        <input type="text" name="faxnumber" value="<?= $customer['fax'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-4">Email:</label>
                        <input type="email" name="email" value="<?= $customer['email'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-4">Potential customer:</label>
                        <input type="email" name="email" value="<?= $customer['email'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="creditworthy" class="col-4">Creditworthy:</label>
                        <input type="email" name="creditworthy" value="<?php if($customer['creditworthy']) { echo 'Yes'; } else {echo 'No';}?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-4">Appointment date:</label>
                        <input type="email" name="email" value="<?= $customer['email'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-4">Discription:</label>
                        <input type="email" name="email" value="<?= $customer['email'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="created_at" class="col-4">Date of input:</label>
                        <input type="date" name="created_at" value="<?= date('Y-m-d', $customer['created_at']); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="updated_at" class="col-4">Last contact:</label>
                        <input type="date" name="updated_at" value="<?= date('Y-m-d', $customer['updated_at']); ?>" readonly>
                    </div>
                </div><!--end col-6--->

            </div><!--end grid--->
        </form>
        <div class="buttons">
            <?php
            if(in_array("Sales",$_SESSION['user']) || in_array("Admin",$_SESSION['user'])) { ?>
                 <a href="../sales/appointments.php<?php echo '?id=' . $customer['id']?>">Appointments</a>
                <?php
            }
            ?>


                <a href="">Archive</a>
            <a href="<?php echo  '../project/viewprojects.php?id=' . $customer['id']?>">View project</a>
            <a href="<?php echo  '../project/addproject.php?id=' . $customer['id']?>">make project</a>
            <a onclick="goBack()">Back</a>
            <?php
            if(in_array("Sales",$_SESSION['user']) || in_array("Finance",$_SESSION['user']) || in_array("Admin",$_SESSION['user'])) { ?>
                <a href="../customers/editcustomer.php<?php echo '?id=' . $customer['id'] ?>">edit</a>
                <?php
            }
            ?>




        </div><!--end buttons-->

    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>



