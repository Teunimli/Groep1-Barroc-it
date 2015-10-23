<?php require_once '../../header.php';?>

<?php
//$id = $_GET['id'];
$sql = "SELECT * FROM tbl_customer WHERE creditworty = 0";
$q= $db->query($sql);
//$q->bindParam(':id', $id);
//$q->execute();

$customers = $q->fetchAll(PDO::FETCH_ASSOC);
//var_dump($customers);
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
            <h1>Contacts</h1>
            <ul class="list-group">
                <li class="list-group-item">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Company name</th>
                            <th>Creditworty</th>
                            <th>bkrcheck</th>
                        </tr>
                        </thead>


                        <tbody> <?php foreach($customers as $customer){ ?>
                            <tr>

                                <td> <?= $customer['contact_name']; ?> </td>
                                <td> <?= $customer['contact_lastname']; ?> </td>
                                <td> <?= $customer['companyname']; ?> </td>
                                <td> <?= $customer['creditworty']; ?> </td>
                                <td> <?= $customer['bkrcheck']; ?> </td>
                                <td> <button> <a href="<?= '../customer/editcustomer.php?id=' . $customer['id'] ?>"</a>View</button></td>;

                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </li>
            </ul>



        </div><!--end container-content-->
    </div><!--end container--->
<?php require_once __DIR__ . '/../../footer.php'; ?>