<?php 

include 'connection.php';

session_start();

error_reporting(0);

if (isset($_SESSION['PAT_NAME'])) {
    header("Location: Patinterface.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM patient WHERE email='$email' AND password='$password'";
	$result = mysqli_query($con, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['PAT_NAME'] = $row['PAT_NAME'];
		header("Location: Patinterface.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>



<!DOCTYPE html>    
<html>    
<head>    
    <title>Patient Sign-in</title>    
    <link rel="stylesheet" type="text/css" href="css/Dlogin.css">    
</head>    
<body> 
<div class="navdiv">
        <nav class="navbar">
            <div class="logo">
                <span>
                    <h1><a class="list1" href="Home.php">MED</a></h1>
                </span>
            </div>
        
        </nav>
</div>
</div>   
    <h1 style="color:#fff;text-align:center;">PATIENT LOGIN</h1><br>    
    <div class="login">    
    <form id="login" method="POST" >    
        <label><b>Email     
        </b>    
        </label>    
        <input type="email" name="email" id="Uname" value="<?php echo $email; ?>" placeholder="Email" required>    
        <br><br>    
        <label><b>Password     
        </b>    
        </label>    
        <input type="Password" name="password" id="Pass"  value="<?php echo $_POST['password']; ?>" placeholder="Password" required>    
        <br><br>    
        <input type="submit" name="submit" id="log" value="SIGN IN">       
        <br><br>    
        <input type="checkbox" id="check">    
        <span>Remember me</span>    
        <br><br>    
        <a class="left" href="#">Forgot Password?</a>  <br>  
        <a  class="right" href="PatientRIG.php">Create an new account</a>    
    </form>     
</div>    
</body>    
</html> 

