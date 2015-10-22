<?php require_once '../../header.php';?>
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
        <h2 class="text-center">Appointment</h2>
        <form action="">
<div class="grid">
    <div class="col-6">
                    <div class="form-group">
                        <label for="customerid" class="col-4">Customer ID:</label>
                        <input type="number" name="customerid">
                    </div>

                    <div class="form-group">
                        <label for="customername" class="col-4">Customer name:</label>
                        <input type="text" name="customername">
                    </div>
    </div>
    <div class="col-6">
                    <div class="form-group">
                        <h3>Appointment</h3>
                        <label for="date" class="col-4">date:</label>
                        <input type="date" name="date">
                    </div>

                    <div class="form-group">
                        <label for="discription" class="col-4">Discription:</label>
                        <input type="textarea" name="discription">
                    </div>

                    <div class="form-group">
                        <label for="dateofinput" class="col-4">Date of input:</label>
                        <input type="date" name="dateofinput">
                    </div>

                    <div class="form-group">
                        <label for="lastcontact" class="col-4">Last contact:</label>
                        <input type="date" name="lastcontact">
                    </div>
    </div>

    </div>

            <input type="submit" value="Submit">
        </form>
        <a href="">Back</a>

    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>
