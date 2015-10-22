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

if(! in_array("Sales",$_SESSION['user'])) {
    var_dump($_SESSION);
    $messageBag->add('w','Please log in as Sales');
    header('location: ../dashboard/dashboard.php');
}
?>

<table class="table">
    <thead>
    <tr>
        <th>Appointment_date</th>
        <th>Description</th>

    </tr>
    </thead>


    <tbody> <?php foreach($customers as $customer){ ?>
        <tr>
            <td> <?= date('m/d/Y', $customer['appointment_date']); ?></td>
            <td> <?= $customer['description']; ?> </td>
            <td>  <a href="editAppointment.php<?php echo '?customer_id=' . $customer['customer_id'] . '&id=' . $customer['id']?>"<button>Edit</button></a> </td>

        </tr>
    <?php } ?>
    </tbody>
    <a href="addAppointment.php<?php echo '?customer_id=' . $id ?>"><button>Add Appointment</button></a>
    <a onclick="goBack()">Back</a>
</table>

