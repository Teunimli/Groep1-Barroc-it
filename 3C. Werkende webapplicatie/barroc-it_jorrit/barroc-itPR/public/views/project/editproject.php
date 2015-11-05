<?php require_once '../../header.php';?>
<?php
$id = $_GET['customerid'];
$sql = "SELECT * FROM tbl_customer WHERE id = :id";
$q= $db->prepare($sql);
$q->bindParam(':id', $id);
$q->execute();

$customer = $q->fetch();

$id = $_GET['id'];
$sql = "SELECT * FROM tbl_projects WHERE id = :id";
$q= $db->prepare($sql);
$q->bindParam(':id', $id);
$q->execute();

$project = $q->fetch();

?>

<div class="container">
    <header>
        <div class="top-img">
            <img src="../../assets/img/jumbotron_small.jpg" alt="barroc-it image" class="barroc-img">
            <h1 class="barroc-title">BARROC IT. </h1>
            <h2 class="text-center subhead tophead">Edit Project</h2>
        </div>
        <form action="../../../app/controllers/authController.php" method="POST">
            <input type="hidden" name="type" value="logout">
            <nav role="navigation" class="navbar navbar-default">

                <ul class="nav navbar-nav">
                    <li><a href="../dashboard/dashboard.php">Home</a></li>
                    <li><a href="../customers/customerinfo.php?id=<?= $customer['id'] ?>">Customer Info</a></li>
                    <li class="active"><a href="../project/viewprojects.php?id=<?= $customer['id'] ?>">Projects</a></li>
                    <?php if(in_array("Sales",$_SESSION['user']) || in_array("Admin",$_SESSION['user'])) { ?>  <li><a href="../sales/appointments.php?id=<?= $customer['id'] ?>">Appointments</a></li> <?php } ?>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a><input type="submit" value="LOGOUT" class="logout"></a></li>
                </ul>


            </nav>
        </form>

    </header>
    <div class="container-content">
        <h2 class="text-center">Project information</h2>
        <form action="../../../app/controllers/projectController.php" method="POST"">
        <div class="grid">
            <div class="col-6">
                <div class="form-group">
                    <input type="hidden" name="type" value="edit"/>
                    <input type="hidden" name="customer_id" value="<?= $customer['id'] ?>"/>

                    <input type="hidden" name="id" value="<?= $project['id'] ?>"/>

                    <label for="customerfirstname">Customer firstname:</label>
                    <input type="text" name="customerfirstname" value="<?= $customer['contact_name']?>" readonly>
                </div>

                <div class="form-group">
                    <label for="customerlastname">Customer lastname:</label>
                    <input type="text" name="customerlastname" value="<?= $customer['contact_lastname']?>" readonly>
                </div>

            </div><!--end col-6--->

            <div class="col-6">
                <div class="form-group">
                    <label for="projectname">Project name:</label>
                    <input type="text" name="projectname" value="<?= $project['projectname']?>">
                </div>

                <div class="form-group">
                    <label for="start_date">Start date:</label>
                    <input type="date" name="start_date"value="<?= date('Y-m-d',$project['start_date'])?>">
                </div>

                <div class="form-group">
                    <label for="end_date">End date:</label>
                    <input type="date" name="end_date" value="<?= date('Y-m-d',$project['end_date'])?>">
                </div>

                <div class="form-group">
                    <label for="hardware">Hardware:</label>
                    <input type="textarea" name="hardware" value="<?= $project['hardware']?>">
                </div>

                <div class="form-group">
                    <label for="software">Software:</label>
                    <input type="textarea" name="software" value="<?= $project['software']?>">
                </div>

                <div class="form-group">
                    <label for="operating_system">Operating system:</label>
                    <input type="textarea" name="operating_system" value="<?= $project['operating_system']?>">
                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <input type="text" name="status" value="<?= $project['status']?>">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="textarea" name="description" value="<?= $project['description']?>">
                </div>

                <div class="form-group">
                    <label for="limiten">limit:</label>
                    <input type="text" name="limiten" value="<?= $project['limiten']?>">
                </div>

                <div class="form-group">
                    <label for="maintenance_contract">Maintenance contract:</label>
                    <input type="text" name="maintenance_contract" value="<?if($project['maintenance_contract'] == 1){ echo'Yes';}else{echo'No';}?>">
                </div>


                <div class="form-group">
                    <label for="deadline">Deadline:</label>
                    <input type="date" name="deadline" value="<?= date('Y-m-d',$project['deadline'])?>">
                </div>

                <div class="form-group">
                    <label for="active">Active:</label>
                    <input type="text" name="active" value="<?if($project['active'] == 1){ echo'Yes';}else{echo'No';}?>">
                </div>

            </div><!--end col-6--->

        </div><!--end grid--->
        <div class="buttons">
            <input class="btn btn-primary" type="submit" value="Submit">
            <a style="float: right" class="btn btn-primary" onclick="goBack()">Back</a>
        </div>
        </form>


    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>
