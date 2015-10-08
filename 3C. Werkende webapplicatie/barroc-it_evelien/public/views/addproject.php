<?php require_once '../header.php';?>
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
        <form action="">
            <div class="grid">
                <div class="col-6">
                    <div class="form-group">
                        <label for="projectid">Project ID:</label>
                        <input type="number" name="firstname">
                    </div>

                    <div class="form-group">
                        <label for="customername">Customer name:</label>
                        <input type="text" name="customername">
                    </div>

                    <div class="form-group">
                        <label for="customerid">Customer ID:</label>
                        <input type="text" name="customerid">
                    </div>
                </div><!--end col-6--->

                <div class="col-6">
                    <div class="form-group">
                        <label for="projectname">Project name:</label>
                        <input type="text" name="projectname">
                    </div>

                    <div class="form-group">
                        <label for="startdate">Start date:</label>
                        <input type="date" name="startdate">
                    </div>

                    <div class="form-group">
                        <label for="enddate">End date:</label>
                        <input type="date" name="enddate">
                    </div>

                    <div class="form-group">
                        <label for="hardware">Hardware:</label>
                        <input type="textarea" name="hardware">
                    </div>

                    <div class="form-group">
                        <label for="software">Software:</label>
                        <input type="textarea" name="software">
                    </div>

                    <div class="form-group">
                        <label for="opesystem">OPE system:</label>
                        <input type="textarea" name="opesystem">
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <input type="text" name="status">
                    </div>

                    <div class="form-group">
                        <label for="discription">Discription:</label>
                        <input type="textarea" name="discription">
                    </div>

                </div><!--end col-6--->

            </div><!--end grid--->
            <input type="submit" value="Submit">
        </form>
        <a href="">Back</a>

    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../footer.php';?>
