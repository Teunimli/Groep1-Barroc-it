<?php
require_once '../../header.php';
?>


<?php
// de query die gedaan moet worden

$id = $_GET['id'];
$sql = "SELECT * FROM tbl_appointment WHERE customer_id = :customer_id";
$q = $db->prepare($sql);
$q->bindParam(':customer_id', $id);
$q->execute();

// de query wordt opgeslagen

// de data wordt opgeslagen
$customers = $q->fetchAll();

$sql = "SELECT * FROM tbl_customer WHERE id = :id";
$q= $db->prepare($sql);
$q->bindParam(':id', $id);
$q->execute();

$customer = $q->fetch();


if(! in_array("Sales",$_SESSION['user'])) {
    var_dump($_SESSION);
    $messageBag->add('w','Please log in as Sales');
    header('location: ../dashboard/dashboard.php');
}
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
                    <li><a href="../project/viewprojects.php?id=<?= $customer['id'] ?>">Projects</a></li>
                    <li class="active"><a href="../sales/appointments.php?id=<?= $customer['id'] ?>">Appointments</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a><input type="submit" value="LOGOUT" class="logout"></a></li>
                </ul>


            </nav>
        </form>

    </header>
    <table class="table">
        <thead>
        <tr>
            <th>Appointment_date</th>
            <th>Description</th>

        </tr>
        </thead>


        <tbody> <?php foreach($customers as $customer){ ?>
            <?php if(time() <= $customer['appointment_date']) {?>
            <tr class="buttons">
                <td> <?= date('d/m/Y', $customer['appointment_date']); ?></td>
                <td> <?= $customer['description']; ?> </td>
                <td>  <a style="float: right" class="btn btn-primary" href="editAppointment.php<?php echo '?customer_id=' . $customer['customer_id'] . '&id=' . $customer['id']?>">Edit</a> </td>

            </tr>
        <?php } } ?>
        </tbody>

    </table>
    <div class="buttons">
        <a class="btn btn-primary" href="addAppointment.php<?php echo '?customer_id=' . $id ?>">Add Appointment</a>
        <a style="float: right" class="btn btn-primary" onclick="goBack()">Back</a>
    </div>
</div>
