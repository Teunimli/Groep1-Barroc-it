<?php require_once '../../header.php';?>

<?php

$id = $_GET['customer_id'];
$sql = "SELECT * FROM tbl_customer WHERE id = :id";
$q = $db->prepare($sql);
$q->bindParam(':id', $id);
$q->execute();

$customer = $q->fetch();


$appointment_id = $_GET['id'];
$sql = "SELECT * FROM tbl_appointment WHERE id = :appointment_id";
$q = $db->prepare($sql);
$q->bindParam(':appointment_id', $appointment_id);
$q->execute();

$appointment = $q->fetch();



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
                    <?php if(!in_array("Development",$_SESSION['user'])){ ?><li><a href="../customers/customerinfo.php?id=<?= $customer['id'] ?>">Customer Info</a></li> <?php } ?>
                    <li><a href="../project/viewprojects.php?id=<?= $customer['id'] ?>">Projects</a></li>
                    <?php if(in_array("Sales",$_SESSION['user']) || in_array("Admin",$_SESSION['user'])) { ?>  <li class="active"><a href="../sales/appointments.php?id=<?= $customer['id'] ?>">Appointments</a></li> <?php } ?>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a><input type="submit" value="LOGOUT" class="logout"></a></li>
                </ul>


            </nav>
        </form>

    </header>
    <div class="container-content">
        <div class="message">
            <?php
            if($messageBag->hasMsg()){
                echo $messageBag->show();
            }
            ?>
        </div>
        <form action="../../../app/controllers/appointmentController.php" method="POST">
            <input type="hidden" name="type" value="edit">
            <input type="hidden" name="appointment_id" value="<?= $appointment['id'] ?>">
            <input type="hidden" name="id" value="<?= $customer['id'] ?>">


                    <div class="form-group">
                        <label for="contact_name">Customer name:</label>
                        <input type="text" name="contact_name" value="<?= $customer['contact_name'] . ' ' . $customer['contact_lastname'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="employee">Employee:</label>
                        <input type="text" name="employee" value="<?= $appointment['employee'] ?>">
                    </div>

                    <div class="form-group">
                        <h3>Appointment</h3>
                        <label for="appointment_date">date:</label>
                        <input type="date" name="appointment_date" value="<?= date('Y-m-d',$appointment['appointment_date'])?>">
                    </div>



                    <div class="form-group">
                        <label for="description">Discription:</label>
                        <input type="text" name="description" value="<?= $appointment['description'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="created_at">Date of input:</label>
                        <input type="date" name="created_at" value="<?= date('Y-m-d',$appointment['created_at'])?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="lastcontact">Last contact:</label>
                        <input type="date" name="lastcontact" value="<?= date('Y-m-d',$appointment['lastcontact'])?>">
                    </div>



            <div class="buttons">
                <input class="btn btn-primary" type="submit" value="Submit">
                <a style="float: right" class="btn btn-primary" href="appointments.php<?php echo '?id=' . $customer['id']?>">Back</a>
            </div>
        </form>


    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>
