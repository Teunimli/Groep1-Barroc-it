<?php require_once '../../header.php';?>

<?php
$id = $_GET['customer_id'];
$sql = "SELECT * FROM tbl_appointment WHERE customer_id = :customer_id";
$q = $db->prepare($sql);
$q->bindParam(':customer_id', $id);
$q->execute();

$appointment = $q->fetch();

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
            <h2 class="text-center subhead tophead">Add Appointment</h2>
        </div>
        <form action="../../../app/controllers/authController.php" method="POST">
            <input type="hidden" name="type" value="logout">
            <nav role="navigation" class="navbar navbar-default">

                <ul class="nav navbar-nav">
                    <li><a href="../dashboard/dashboard.php">Home</a></li>
                    <li><a href="../customers/customerinfo.php?id=<?= $customer['id'] ?>">Customer Info</a></li>
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
        <form action="../../../app/controllers/appointmentController.php" method="POST">
            <input type="hidden" name="type" value="add">
            <div class="grid">
                <div class="col-6">
                    <div class="form-group">
                        <label for="customer_id" class="col-4">Customer ID:</label>
                        <input type="text" name="customer_id" value="<?= $customer['id'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="contact_name" class="col-4">Customer name:</label>
                        <input type="text" name="contact_name" value="<?= $customer['contact_name'] . ' ' . $customer['contact_lastname'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="employee" class="col-4">Employee:</label>
                        <input type="text" name="employee">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <h3>Appointment</h3>
                        <label for="appointment_date" class="col-4">date:</label>
                        <input type="date" name="appointment_date">
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-4">Discription:</label>
                        <input type="text" name="description">
                    </div>

                    <div class="form-group">
                        <label for="created_at" class="col-4">Date of input:</label>
                        <input type="date" name="created_at" value="<?= date('Y-m-d')?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="lastcontact" class="col-4">Last contact:</label>
                        <input type="date" name="lastcontact">
                    </div>




                    <div class="buttons">
                        <input class="btn btn-primary" type="submit" value="Submit">
                        <a style="float: right" class="btn btn-primary" onclick="goBack()">Back</a>
                    </div>
        </form>


    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>
