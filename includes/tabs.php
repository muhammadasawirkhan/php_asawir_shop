
	<div class="tabs"> 
			<div class="link">
				<a href="index.php">Home</a>
			</div>
			<div class="link">
				About
			</div>
			<div class="link">
				<?php
				if(isset($_SESSION['auth']))
				{
					?>
					<a href="logout.php">Logout</a>
				<?php 
				}
				else
				{
				?>
				<a href="login.php">Login</a>
				<?php
				}
				?>

				/<a href="register.php">Register</a>
				<a href="products.php">Shop</a>
			</div>
		</div>
