<?php require_once '../../header.php';?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_projects WHERE tbl_projects.customer_id = :id";
$q= $db->prepare($sql);
$q->bindParam(':id', $id);
$q->execute();

$projects = $q->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="contaier">
    <header>


        <nav role="navigation" class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->

            <!-- Collection of nav links and other content for toggling -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                </ul>

                <div class="homesales">
                    <form action="">
                        <label for="search"></label>
                        <input type="text" name="search" id="search">
                        <input type="submit" name="search" value="Zoeken">
                    </form>
                </div><!--homesales-->

                <ul class="nav navbar-nav logout-button">
                    <li><a href="">Logout</a></li>
                </ul>

            </div>
        </nav>

    </header>
    <div class="container-content">
        <h1>Projects</h1>
        <ul class="list-group">
            <li class="list-group-item">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Projectname</th>
                        <th>start date</th>
                        <th>end date</th>
                        <th>hardware</th>
                        <th>software</th>
                        <th>operating system</th>
                        <th>status</th>
                        <th>desription</th>
                        <th>limit</th>
                        <th>maintenance_contract</th>
                        <th>application</th>
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
                            <td> <?= $project['application']; ?> </td>
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
                            <td> <button> <a href="<?= '../project/editproject.php?id=' . $project['id'] . '&customerid='.$project['customer_id']?>"</a>Edit</button></td>
                            <td> <button> <a href="<?= '../finance/addinvoice.php?id=' . $project['id'] . '&customerid='.$project['customer_id']?>"</a>Add invoice</button></td>
                            <td> <button> <a href="<?= '../finance/invoiceinfo.php?id=' . $project['id'] . '&customerid='.$project['customer_id']?>"</a>View invoice</button></td>

                        </tr>
                    <?php } ?>
                    </tbody>

                </table>
            </li>
        </ul>


        <a onclick="goBack()">Back</a>
    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>




