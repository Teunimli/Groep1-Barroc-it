<?php require_once '../../header.php';?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_customer WHERE id = :id";
$q= $db->prepare($sql);
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
                    <li class="active"><a href="#">Home</a></li>

                </ul>

            </div>
        </nav>

    </header>
    <div class="container-content">
        <h2 class="text-center">Add appointment</h2>
        <form action="">

            <input type="hidden" name="type" value="add"/>
            <input type="hidden" name="id" value="<?= $customer['id'] ?>"/>

            <div class="form-group">
                <label for="customerid">Customer ID:</label>
                <input type="number" name="customerid" value="<?= $customer['id'] ?>">
            </div>

            <div class="form-group">
                <label for="customername">Customer name:</label>
                <input type="text" name="customername" value="<?= $customer['contact_name'] ?>">
            </div>

            <div class="form-group">
                <h3>Appointment</h3>
                <label for="date">date:</label>
                <input type="date" name="date">
            </div>

            <div class="form-group">
                <label for="discription">Discription:</label>
                <input type="textarea" name="discription">
            </div>

            <div class="form-group">
                <label for="dateofinput">Date of input:</label>
                <input type="date" name="dateofinput">
            </div>

            <div class="form-group">
                <label for="lastcontact">Last contact:</label>
                <input type="date" name="lastcontact">
            </div>



            <input type="submit" value="Submit">
        </form>
        <a href="">Back</a>

    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>
