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
        <h2 class="text-center subhead">Add Appointment</h2>
        <form action="../../../app/controllers/appointmentController.php" method="POST">
            <input type="hidden" name="type" value="add">
            <div class="grid">
                <div class="col-6">
                    <div class="form-group">
                        <label for="customer_id" class="col-4">Customer ID:</label>
                        <input type="text" name="customer_id" value="<?= $customer['id'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="contact_name" class="col-4">Customer name:</label>
                        <input type="text" name="contact_name" value="<?= $customer['contact_name'] . ' ' . $customer['contact_lastname'] ?>">
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
                        <input type="text" name="created_at" value="<?php echo date('d/m/y');?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="lastcontact" class="col-4">Last contact:</label>
                        <input type="text" name="lastcontact">
                    </div>





                    <input type="submit" value="Submit">
        </form>
        <a onclick="goBack()">Back</a>

    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>
