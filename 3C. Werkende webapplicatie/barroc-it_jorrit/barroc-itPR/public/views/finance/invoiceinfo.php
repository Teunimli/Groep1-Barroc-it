<?php require_once '../../header.php';?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_invoices WHERE projects_id = :id";
$q= $db->prepare($sql);
$q->bindParam(':id', $id);
$q->execute();

$invoices = $q->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="container">
    <header>
        <div class="top-img">
            <img src="../../assets/img/jumbotron_small.jpg" alt="barroc-it image" class="barroc-img">
            <h1 class="barroc-title">BARROC IT. </h1>
            <h2 class="text-center subhead tophead">Invoice Info</h2>
        </div>

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
                        <tr>

                            <td> <?= $invoice['id']; ?> </td>
                            <td> <?= date('d.m.Y',$invoice['date_of_invoice']); ?> </td>
                            <td> <?= date('d.m.Y',$invoice['end_invoice_date']); ?> </td>
                            <td> <?if($invoice['paid'] == 1){ echo'Yes';}else{echo'No';} ?> </td>
                            <td> <button> <a href="<?= '../finance/editinvoice.php?id=' . $invoice['id'] . '&projectid='.$invoice['projects_id']. '&customerid=' . $_GET['customerid']?>"</a>Edit</button></td>

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




