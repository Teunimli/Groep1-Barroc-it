<?php require_once  '../../header.php'; ?>
<link rel="stylesheet" href="../../assets/css/main.css"/>
 <div class="jumbotron jumbo-login">
      <div class="container">

        <h1 class="text_1 text-center">BARROC IT. </h1>
        <form action="../../../app/controllers/authController.php" class="form-login col-md-4 col-md-offset-4" method="POST" >
			<div class="message">
				<?php
				if($messageBag->hasMsg()){
					echo $messageBag->show();
				}
				?>
			</div>
			<legend class="subhead">Please Log in</legend>
            <input type="hidden" name="type" value="login">
        	<div class="form-group">
        		<label for="username">Username</label>
        		<input type="text" name="username" id="username" class="form-control" >
        	</div>
        	<div class="form-group">
        		<label for="password">Password</label>
        		<input type="password" name="password" id="password" class="form-control">
        	</div>
        	<div class="form-group">
        		<input type="submit" value="submit" class="btn btn-primary">
        	</div>
        </form>
      </div>
 </div>
