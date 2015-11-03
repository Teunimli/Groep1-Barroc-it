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
            <h2 class="text-center subhead tophead">Edit Appointment</h2>
        </div>


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



            <input type="submit" value="Submit">
        </form>
        <a onclick="goBack()">Back</a>

    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>
