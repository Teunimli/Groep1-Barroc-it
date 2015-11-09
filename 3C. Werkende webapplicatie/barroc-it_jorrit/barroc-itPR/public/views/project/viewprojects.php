<?php require_once '../../header.php';?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_projects WHERE tbl_projects.customer_id = :id";
$q= $db->prepare($sql);
$q->bindParam(':id', $id);
$q->execute();

$projects = $q->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="container">
    <header>
        <div class="top-img">
            <img src="../../assets/img/jumbotron_small.jpg" alt="barroc-it image" class="barroc-img">
            <h1 class="barroc-title">BARROC IT. </h1>
            <h2 class="text-center subhead tophead">Projects</h2>
        </div>
        <form action="../../../app/controllers/authController.php" method="POST">
            <input type="hidden" name="type" value="logout">
            <nav role="navigation" class="navbar navbar-default">

                <ul class="nav navbar-nav">
                    <li><a href="../dashboard/dashboard.php">Home</a></li>
                    <?php if(!in_array("Development",$_SESSION['user'])){ ?><li><a href="../customers/customerinfo.php?id=<?= $id ?>">Customer Info</a></li> <?php } ?>
                    <li class="active"><a href="../project/viewprojects.php?id=<?= $id ?>">Projects</a></li>
                    <?php if(in_array("Sales",$_SESSION['user']) || in_array("Admin",$_SESSION['user'])) { ?>  <li><a href="../sales/appointments.php?id=<?= $id ?>">Appointments</a></li> <?php } ?>

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
        <ul class="list-group">
            <li class="list-group-item">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Project name</th>
                        <th>start date</th>
                        <th>end date</th>
                        <th>hardware</th>
                        <th>software</th>
                        <th>operating system</th>
                        <th>status</th>
                        <th>desription</th>
                        <th>limit</th>
                        <th>maintenance contract</th>
                        <th>paid invoices</th>
                        <th>remaining invoices</th>
                        <th>deadline</th>
                        <th>active</th>
                    </tr>
                    </thead>


                    <tbody> <?php foreach($projects as $project){ ?>
                        <tr>
                            <td> <?= $project['projectname']; ?> </td>
                            <td> <?= date('d.m.Y',$project['start_date']); ?> </td>
                            <td> <?= date('d.m.Y',$project['end_date']); ?> </td>
                            <td> <?= $project['hardware']; ?> </td>
                            <td> <?= $project['software']; ?> </td>
                            <td> <?= $project['operating_system']; ?> </td>
                            <td> <?= $project['status']; ?> </td>
                            <td> <?= $project['description']; ?> </td>
                            <td> <?= $project['limiten']; ?> </td>
                            <td> <?if($project['maintenance_contract'] == 1){ echo'Yes';}else{echo'No';} ?> </td>
                            <?
                            $id = $project['id'];
                            $sql = "SELECT COUNT(paid) FROM tbl_invoices WHERE tbl_invoices.projects_id = :id AND paid = 1";
                            $q= $db->prepare($sql);
                            $q->bindParam(':id', $id);
                            $q->execute();
                            $in_paid = $q->fetch(); ?>
                            <td> <?= $in_paid['COUNT(paid)']; ?> </td>

                            <?
                            $id = $project['id'];
                            $sql = "SELECT COUNT(paid) FROM tbl_invoices WHERE tbl_invoices.projects_id = :id AND paid = 0";
                            $q= $db->prepare($sql);
                            $q->bindParam(':id', $id);
                            $q->execute();
                            $in_paid = $q->fetch(); ?>
                            <td> <?= $in_paid['COUNT(paid)']; ?> </td>

                            <td> <?= date('d.m.Y',$project['deadline']); ?> </td>
                            <td> <?if($project['active'] == 1){ echo'Yes';}else{echo'No';} ?> </td>

                        </tr>
                        <tr class="buttons">
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><?php if(in_array("Sales",$_SESSION['user']) || in_array("Development",$_SESSION['user'])) { echo "<td></td><td></td>"; }  ?>
                            <?php if(in_array("Finance",$_SESSION['user']) || in_array("Admin",$_SESSION['user'])) { ?><td><a class="btn btn-primary" href="<?= '../finance/addinvoice.php?id=' . $project['id'] . '&customerid='.$project['customer_id']?>">Add <br /> invoice</a></td>
                            <td><a class="btn btn-primary" href="<?= '../finance/invoiceinfo.php?id=' . $project['id'] . '&customerid='.$project['customer_id']?>">View<br /> invoice</a><?php } ?></td>
                            <td><a class="btn btn-primary" href="<?= '../project/editproject.php?id=' . $project['id'] . '&customerid='.$project['customer_id']?>">Edit</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>

                </table>
            </li>

        </ul>

        <div class="buttons">
            <?php
            if(in_array("Sales",$_SESSION['user']) || in_array("Admin",$_SESSION['user'])) { ?>
                <a class="btn btn-primary" href="<?php echo  'addproject.php?id=' . $project['customer_id']?>">make project</a>
            <?php } ?>
            <a style="float: right;" class="btn btn-primary" href="<?php if(in_array("Development",$_SESSION['user'])) { echo '../dashboard/dashboard.php'; }else{ echo  '../customers/customerinfo.php?id=' . $id; } ?>">Back</a>
        </div>
    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>




