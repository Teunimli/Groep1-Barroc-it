<?php require_once '../../header.php';?>

<?
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_customer WHERE id = :id";
$q = $db->prepare($sql);
$q->bindParam(':id', $id);
$q->execute();

$customers = $q->fetchAll();

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

            </div>
        </nav>

    </header>
    <div class="container-content">
        <h2 class="text-center">Add project</h2>
        <form action="<? echo '../../../app/controllers/projectController.php'?>"  method="POST">
            <div class="grid">
                <div class="col-6">
                    <? foreach($customers as $customer):?>
                    <div class="form-group">
                        <label for="customername">Customer name:</label>
                        <input type="" name="customername" value="<?= $customer['contact_name'] ?>" readonly>
                    </div>
                        <input type="hidden" name="customer_id" value="<? echo $customer['id'] ?>" />
                        <input type="hidden" name="type" value="add"  />
                    <? endforeach;?>
                </div><!--end col-6--->

                <div class="col-6">
                    <div class="form-group">
                        <label for="projectname" class="col-4">Project name:</label>
                        <input type="text" name="projectname">
                    </div>

                    <div class="form-group">
                        <label for="startdate" class="col-4">Start date:</label>
                        <input type="date" name="start_date">
                    </div>

                    <div class="form-group">
                        <label for="enddate" class="col-4">End date:</label>
                        <input type="date" name="end_date">
                    </div>

                    <div class="form-group">
                        <label for="hardware" class="col-4">Hardware:</label>
                        <input type="text" name="hardware">
                    </div>

                    <div class="form-group">
                        <label for="software" class="col-4">Software:</label>
                        <input type="text" name="software">
                    </div>

                    <div class="form-group">
                        <label for="operating_system" class="col-4">operating system:</label>
                        <input type="text" name="operating_system">
                    </div>
</div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="status" class="col-4">Status:</label>
                        <input type="text" name="status">
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-4">Description:</label>
                        <input type="text" name="description">
                    </div>

                    <div class="form-group">
                        <label for="limiten" class="col-4">limit:</label>
                        <input type="text" name="limiten">
                    </div>

                    <div class="form-group">
                        <label for="maintenance_contract" class="col-4">Maintenance contract:</label>
                        <input type="text" name="maintenance_contract">
                    </div>

                    <div class="form-group">
                        <label for="application" class="col-4">Application:</label>
                        <input type="text" name="application">
                    </div>

                    <div class="form-group">
                        <label for="deadline" class="col-4">Deadline:</label>
                        <input type="date" name="deadline">
                    </div>

                    <div class="form-group">
                        <label for="active" class="col-4">Active:</label>
                        <input type="text" name="active">
                    </div>

                </div><!--end col-6--->

            </div><!--end grid--->
            <input type="submit" value="Submit">
        </form>
        <a onclick="goBack()">Back</a>

    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>
