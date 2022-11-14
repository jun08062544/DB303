<?php
session_start();
if(isset($_POST['submit'])|| isset($_POST['login'])){
	$conn = new mysqli('db303-mysql', 'root', 'P@sswOrd', 'northwind');
	if($conn->connect_errno){
		die($conn->connect_error);
}
$error = null;
if(isset($_POST['submit'])){
	$hash = password_hash($_POST['pswd'], PASSWORD_DEFAULT);
	$sql = "insert into accounts(email, fname, lname, passw)";
	$sql .= " values('{$_POST['email']}','{$_POST['fname']}'";
	$sql .= ", '{$_POST['lname']}', '$hash')";
	try {
		$conn->query($sql);
		$_SESSION['email']= $_POST['email'];
		header('location: welcome.php');
		exit();
	}
	catch(Exception $e) {
		$error =  $e->getMessage();
	}
}
if(isset($_POST['login'])) {
	$sql = 'select email, passw from accounts where email=?';
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('s', $_POST['email']);
	try {
		$stmt->execute();
		$result = $stmt->get_result();
		if($row = $result->fetch_assoc()){
			if(password_verify($_POST['pswd'], $row['passw'])) {
				$_SESSION['email']= $_POST['email'];
		header('location: welcome.php');
		exit();
		}
		}
	}
	catch(Exception $e) {
		echo $e->getMessage();
	}
}
	$conn->close(); 
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>northwind - Sign up / sign in</title>
  <link rel="stylesheet" href="./css/style.css">

</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action = "signin.php" method = "post" onsubmit=" return checkPassword();">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="fname" placeholder="First name" required>
					<input type="text" name="lname" placeholder="Last name" required>
					<input type="email" name="email" placeholder="Email" required>
					<input type="password" id= "pass1"name="pswd" placeholder="Password" required>
					<input type="password" id="pass2" placeholder="Confirm Password" required>
					<button type = "submit" name="submit">Sign up</button>
				</form>
			</div>

			<div class="login">
				<form action="signin.php" method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button typr="submit" name="login">Login</button>
				</form>
			</div>
	</div>
	<script>
<?php
if ($error) {
	echo "alert(\"$error\");";
}
?>
		function checkPassword() {
		const pass1 = document.getElementById("pass1").value;
		const pass2 = document.getElementById("pass2").value;
		if (pass1==pass2) {
			return true;
		}
		else {
			alert('Passwoeds are not identical!');
			return false;
		}
	}
	</script>
</body>
</html>