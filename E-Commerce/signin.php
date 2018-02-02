<?php
	
	session_start();
	if(isset($_SESSION['username']))
	{	
		//if a user logged in then this page will redirect to his profile page
		header("Location:index.php");
	}
	
	require_once("function.php");

	$user = new LoginRegistration();

?>


<!DOCTYPE HTML>

<html lang="en-US">

<head>

	<meta charset="UTF-8">
	<title>MachMangso</title>
	
	<link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon" />
	
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<script src="js/ajax.js"></script>
	<script src="js/bootstrap.js"></script>
	
</head>

<body>
	
	<header class="header">
	
		<div class="row">
			<div class="col-sm-8">
		  
				<div class="row">
					<div class="col-sm-3 logo">
						<a href="index.php"><img src="image/logo.jpg" alt="MachMangso" height="70px" /></a>
					</div>
					<div class="col-sm-8">
			  
						<form>
							<input class="col-sm-8" type="text" name="search" placeholder="Search Here...">
							<button type="submit" class="button1">Search</button>
						</form>
				  
					</div>
				
					
				
				</div>
		  
			</div>
			
			<div class="col-sm-4">
		  
				<div class="col-sm-2"></div>
				<div class="col-sm-4">
					<button type="button" class="button2">Need Help?</button>
				</div>
				<div class="col-sm-4 sign">
				
					<input id="sub" type="submit" value="SIGN IN" />
				
				</div>
				<div class="col-sm-2"></div>
				
		</div>
	
	</header>
	
	<section>
	
		<div class="row navigation">
			
			<div class="col-sm-2">
			
				<table class="table table-hover">
					
						<tr class="sub">
							<td><a href=""> OFFERS </a></td>
						</tr>
						<tr>
							<td><a href=""> DISCOUNTS </a></td>
						</tr>
						<tr>
							<td></td>
						</tr>
						<tr>
							<td><a href=""> FROZEN FISH </a></td>
						</tr>
						<tr>
							<td><a href=""> DRIED FISH</a></td>
						</tr>
						<tr>
							<td><a href=""> FRESH FISH </a></td>
						</tr>
						<tr>
							<td><a href=""> MEAT </a></td>
						</tr>
						<tr>
							<td><a href=""> MEAT ALTERNATIVE </a></td>
						</tr>
				
			</table>
			
			</div>
			<div class="col-sm-9 class="poster">
				
				<div class="signin">
				
					<div class="mgs">
					
						<?php
						
							//define variables and set empty value
							
							$email=$password = "";
							
							if($_SERVER['REQUEST_METHOD']=='POST'){
								
								$email = test_input($_POST['email']);
								$password = test_input($_POST['password']);
								
								if(empty($_POST['email']) or empty($_POST['password'])){
									echo  "<p style='color:red'>* All field must be filled up...</p>";
								}
								else{
								
									$login = $user->loginUser($email,$password);
									
									if($login==1){
										header("location: index.php");
									}else if($login==-1){
										echo "<p style='color:red'>Your account is temporary suspended...Call: 01745135348</p>";
									}else{
										echo "<p style='color:red'>Invalid login or password. Please try again.</p>";
									}
										
									}
							}
							
							
							function test_input($data){
									$data = trim($data);
									$data = stripslashes($data);
									$data = htmlspecialchars($data);
									
									return $data;
								}
								
						?>
					
					</div> 
						
					<h2>SIGN IN</h2>
				
					<form class="form2" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
						
						<label for="email">Email : </label>
						<input type="email" placeholder="Enter your email" name="email" id="email" />
						<label for="pass">Password : </label>
						<input type="password" placeholder="Enter your password" name="password" id="pass" />
						<input type="submit" value="Sign In" name="pass"  />
						
						<p id="sub2" >Don't have account <a href="signup.php" >SIGN UP</a></p>
					</form>
				
				</div>
			
				
			
			</div>
				
		</div>
	
	</section>
	
</body>

</html>