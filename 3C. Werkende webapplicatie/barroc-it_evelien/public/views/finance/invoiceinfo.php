<?php require_once '../../header.php';?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_invoices WHERE customer_id = :id";
$q= $db->prepare($sql);
$q->bindParam(':id', $id);
$q->execute();

$invoices = $q->fetchAll(PDO::FETCH_ASSOC);

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
        <h1 class="subhead">Invoices</h1>
        <ul class="list-group">
            <li class="list-group-item">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Invoice id</th>
                        <th>Date</th>
                       <th>paid</th>
                    </tr>
                    </thead>


                    <tbody> <?php foreach($invoices as $invoice){ ?>
                        <tr>

                            <td> <?= $invoice['id']; ?> </td>
                            <td> <?= $invoice['date_of_invoice']; ?> </td>
                            <td> <?= $invoice['paid']; ?> </td>

                            <td> <button> <a href="<?= '/editinvoice.php?id=' . $project['id'] . '&customerid='.$project['customer_id']?>"</a>View</button></td>

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




