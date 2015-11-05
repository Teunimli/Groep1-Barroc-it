<?php require_once '../../header.php';?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_invoices WHERE projects_id = :id";
$q= $db->prepare($sql);
$q->bindParam(':id', $id);
$q->execute();

$invoices = $q->fetchAll(PDO::FETCH_ASSOC);

$id = $_GET['id'];
$sql = "SELECT * FROM tbl_projects WHERE id = :id";
$q= $db->prepare($sql);
$q->bindParam(':id', $id);
$q->execute();

$project = $q->fetch();

if($messageBag->hasMsg()){
    echo $messageBag->show();
}
?>

<div class="container">
    <header>
        <div class="top-img">
            <img src="../../assets/img/jumbotron_small.jpg" alt="barroc-it image" class="barroc-img">
            <h1 class="barroc-title">BARROC IT. </h1>
            <h2 class="text-center subhead tophead">Invoices</h2>
        </div>
        <form action="../../../app/controllers/authController.php" method="POST">
            <input type="hidden" name="type" value="logout">
            <nav role="navigation" class="navbar navbar-default">

                <ul class="nav navbar-nav">
                    <li><a href="../dashboard/dashboard.php">Home</a></li>
                    <li><a href="../customers/customerinfo.php?id=<?= $project['customer_id'] ?>">Customer Info</a></li>
                    <li class="active"><a href="../project/viewprojects.php?id=<?= $project['customer_id'] ?>">Projects</a></li>
                    <?php if(in_array("Sales",$_SESSION['user']) || in_array("Admin",$_SESSION['user'])) { ?>  <li><a href="../sales/appointments.php?id=<?= $project['customer_id'] ?>">Appointments</a></li> <?php } ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a><input type="submit" value="LOGOUT" class="logout"></a></li>
                </ul>

            </nav>
        </form>

    </header>
    <div class="container-content">
        <h1>Invoices</h1>
        <ul class="list-group">
            <li class="list-group-item">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Invoice id</th>
                        <th>Date of invoice</th>
                        <th>End of invoice</th>
                        <th>paid</th>
                    </tr>
                    </thead>


                    <tbody> <?php foreach($invoices as $invoice){ ?>
                        <tr class="buttons">

                            <td> <?= $invoice['id']; ?> </td>
                            <td> <?= date('d.m.Y',$invoice['date_of_invoice']); ?> </td>
                            <td> <?= date('d.m.Y',$invoice['end_invoice_date']); ?> </td>
                            <td> <?if($invoice['paid'] == 1){ echo'Yes';}else{echo'No';} ?> </td>
                            <td> <a class="btn btn-primary" href="<?= '../finance/editinvoice.php?id=' . $invoice['id'] . '&projectid='.$invoice['projects_id']. '&customerid=' . $_GET['customerid']?>">Edit</a></td>

                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </li>
        </ul>

        <div class="buttons">
            <a style="float: right" class="btn btn-primary" onclick="goBack()">Back</a>
        </div>
    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>




