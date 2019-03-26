<?php
  //Hier is Stefan schepers mee bezig
	session_start();
	include 'dbConn.php';
?>

<?php
if(isset($_SESSION['loggedIn'])){
  echo 'Je bent al ingelogd!</div>';
  die();
}

if(isset($_POST['submit'])){
	$username = ($_POST['username']);
	$password = ($_POST['password']);
	$SQLstring = "SELECT userId, userPass FROM nhl_stenden_users WHERE userName = ?";
		if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $userId, $userPass);
			mysqli_stmt_store_result($stmt);
			if (mysqli_stmt_num_rows($stmt) > 0) {
				mysqli_stmt_fetch($stmt);
				if (password_verify($password, $userPass)) {
					$_SESSION['loggedIn'] = true;
					$_SESSION['ID'] = $userId;
					echo "<p>Je bent ingelogd!</p>";
					header('Location: index.php');
				}
				else { echo '<div class="notification">Verkeerd wachtwoord!</div>';}
			}
			else { echo '<div class="notification">Deze combinatie bestaat niet!</div>'; }
		}
	}

?>
    <form action="login.php" method="post">
        <p>Username <input type="text" name="username"/></p>
        <p>Password <input type="password" name="password"/></p>
        <p><input name="submit" type="submit" value="Inloggen" /></p>
    </form>
