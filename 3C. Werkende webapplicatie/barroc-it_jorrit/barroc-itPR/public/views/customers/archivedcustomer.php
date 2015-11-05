<?php
require_once '../../header.php';
?>

<?php

// de query die gedaan moet worden
$sql = "SELECT * FROM tbl_customer WHERE archived_at != 0";

// de query wordt opgeslagen
$q = $db->query($sql);

// de data wordt opgeslagen
$customers = $q->fetchAll();

?>
<div class="container">
    <header>
        <div class="top-img">
            <img src="../../assets/img/jumbotron_small.jpg" alt="barroc-it image" class="barroc-img">
            <h1 class="barroc-title">BARROC IT. </h1>
            <h2 class="text-center subhead tophead">Customer Info</h2>
        </div>
        <form action="../../../app/controllers/authController.php" method="POST">
            <input type="hidden" name="type" value="logout">
            <nav role="navigation" class="navbar navbar-default">

                <ul class="nav navbar-nav">
                    <li><a href="../dashboard/dashboard.php">Home</a></li>
                    <li class="active"><a href="archivedcustomer.php">Archived</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a><input type="submit" value="LOGOUT" style=" background:none!important; border:none;
                         padding:0!important;
                         font: inherit;
                         cursor: pointer;
                         margin-right: 10px;"></a></li>
                </ul>

            </nav>
        </form>

    </header>

    <ul class="list-group">
        <?php foreach($customers as $customer): ?>
            <li class="list-group-item">




                <form action="<?php echo '../../../app/controllers/customercontroller.php'?>" METHOD="POST">
                    <input type="hidden" name="type" value="dearchive">
                    <input type="hidden" name="id" value="<?= $customer['id'] ?>"/>
                    <b><a class="nolimit st" href="<?php echo  '../customers/customerinfo.php?id=' . $customer['id']?>"><?= $customer['companyname'] ?></a></b>
                    <div class="buttons">
                        <?php
                        if(in_array("Sales",$_SESSION['user']) || in_array("Finance",$_SESSION['user']) || in_array("Admin",$_SESSION['user'])) { ?>
                                <a style="float: right; margin-left: 5px;" class="btn btn-primary" href="<?php echo  '../customers/editcustomer.php?id=' . $customer['id']?>">edit</a>

                            <?php
                        }
                        ?>
                        <input style="float: right" class="btn btn-primary" type="submit" value="Dearchive">
                    </div>
                </form>
                <br />
            </li>
        <?php endforeach; ?>
    </ul>
</div>