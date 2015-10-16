<?php require_once '../../header.php';?>
<?php
$id = $_GET['id'];
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
        <h2 class="text-center">Project information</h2>
        <form action="">
            <div class="grid">
                <div class="col-6">
                    <div class="form-group">
                        <input type="hidden" name="type" value="edit"/>
                        <input type="hidden" name="id" value="<?= $customer['id'] ?>"/>

                        <input type="hidden" name="type" value="edit"/>
                        <input type="hidden" name="id" value="<?= $project['id'] ?>"/>

                        <label for="customerfirstname">Customer firstname:</label>
                        <input type="text" name="customerfirstname" value="<?= $customer['contact_name']?>">
                    </div>

                    <div class="form-group">
                        <label for="customerlastname">Customer lastname:</label>
                        <input type="text" name="customerlastname" value="<?= $customer['contact_lastname']?>">
                    </div>

                </div><!--end col-6--->

                <div class="col-6">
                    <div class="form-group">
                        <label for="projectname">Project name:</label>
                        <input type="text" name="projectname" value="<?= $project['projectname']?>">
                    </div>

                    <div class="form-group">
                        <label for="startdate">Start date:</label>
                        <input type="date" name="startdate"value="<?= $project['start_date']?>">
                    </div>

                    <div class="form-group">
                        <label for="enddate">End date:</label>
                        <input type="date" name="enddate" value="<?= $project['end_date']?>">
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
                        <label for="opesystem">OPE system:</label>
                        <input type="textarea" name="opesystem" value="<?= $project['operating_system']?>">
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <input type="text" name="status" value="<?= $project['status']?>">
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="textarea" name="discription" value="<?= $project['description']?>">
                    </div>

                </div><!--end col-6--->

            </div><!--end grid--->
            <input type="submit" value="Submit">
        </form>
        <a href="">Back</a>

    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>
