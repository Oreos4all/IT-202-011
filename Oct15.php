
<?php
//this one loads but only login works(barely)-working cur
//regi works in db but has 2 invalid username prompts and not confirm
//lets break it DOWN!
session_start();
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>

<head>

<script>

function checkPasswords(form){
	let pOkay = form.password.value == form.confirm.value;
	if(!pOkay){
		alert("Passwords don't match!");
	}
	return pOkay;
}

function queryParam(){
	var params = new URLSearchParams(location.search);
	if(params.has('page')){
		var page = params.get('page');
		var ele = document.getElementById(page);

		let home = document.getElementById('home');
		let about = document.getElementById('about');
		let htPlay = document.getElementById('How to Play');
		let login = document.getElementById('Login');
		let regi = document.getElementById('Register');
		let gTest = document.getElementById('GameTest');

		switch(page){

			case "home":
				home.style.display="block";
				about.style.display = "none";
				htPlay.style.display = "none";
				login.style.display = "none";
				regi.style.display = "none";
				gTest.style.display = "none";
				break;

			case "about":
				home.style.display="none";
				about.style.display = "block";
				htPlay.style.display = "none";
				login.style.display = "none";
				regi.style.display = "none";
				gTest.style.display = "none";
				break;

			case "How to Play":
				home.style.display="none";
				about.style.display = "none";
				htPlay.style.display = "block";
				login.style.display = "none";
				regi.style.display = "none";
				gTest.style.display = "none";
				break;


			case "Login":
				home.style.display="none";
				about.style.display = "none";
				htPlay.style.display = "none";
				login.style.display = "block";
				regi.style.display = "none";
				gTest.style.display = "none";
				break;

			case "Register":
				home.style.display="none";
				about.style.display = "none";
				htPlay.style.display = "none";
				login.style.display = "none";
				regi.style.display = "block";
				gTest.style.display = "none";
				break;

			case "GameTest":
				home.style.display="none";
				about.style.display = "none";
				htPlay.style.display = "none";
				login.style.display = "none";
				regi.style.display = "none";
				gTest.style.display = "block";
				break;


			default:
				home.style.display = "none";
				about.style.display = "none";
				htPlay.style.display = "none";
				login.style.display = "none";
				regi.style.display = "none";
				gTest.style.display = "none";
				break;
			

			
		}
	}
	
}

//here is login stuff


</script>


</head>
<body onload="queryParam();">
	<header>
		<figure>
		
		<nav>
			<a href="?page=home">Home</a> ||
			<a href="?page=about">About</a> ||
			<a href="?page=How to Play">How to Play</a> ||
			<a href="?page=Login">Login Page(testing)</a> ||
			<a href="?page=Register">Registration Page(testing)</a> ||
			<a href="https://web.njit.edu/~joa23/IT-202-011/GameTest.php">Game Test</a> ||
		</nav>
		
		</figure>
	</header>
	<div id="home">
		This is home
	</div>


	<div id="about" style="display:none;">
		<section>
		<h3>What is ChampChomp?</h3>
		<img src="https://cdn.frankerfacez.com/emoticon/377851/4">
		<p>ChampChomp is a 2D side scrolling game where you play as a version of the PogChamp Twitch Emote</p>
		<p>TESTING TESTING TESTING</p>
		</section>
	</div>


	<div id = "How to Play" style="display:none;">
		<section>
			<h3>How to Play</h3>
			<p>To move your characther you can used W A S D or the arrow keys on your keyboard </p>
		</section>
		
	</div>

	
	<div id = "Login" style="display:none;">
		<section>
			<div style="margin-left: 50%; margin-right:50%;">
			<h2>Login Page</h2>
			<p>Please login</p>
		
			<!-- check 3rd homework -->
			<form method = "POST"/>

			<input name="username" type="text" placeholder="Enter your username"/>			
			<input type="password" name="password" placeholder="Enter password"/>
			<input type="submit" value="Login"/>
			
			<!-- Make it pretty.... later. Wrap in a div then do none/block with form ids-->
			
			</div>
		</section>
	</div>

	<div id = "Register" style="display:none;">
		<section>
			<div style="margin-left: 50%; margin-right:50%;">

			<h2>Registration Page</h2>
			<p>Please Register</p>
			
			<form id="regi" method = "POST" onsubmit="return checkPasswords(this);" />

			<input name="usernameF2" type="text" placeholder="Enter your username"/>

			<input type="password" name="passwordF2" placeholder="Enter password"/>
			<input type="password" name="pConfirm" placeholder="Re-type password"/>

			<input type="submit" value="Register"/>
			</form>

			</div>
		</section>

	</div>
	

	<footer>
		<p>Here is where copyright goes</p>

	</footer>
</body>
</html>
<?php
	if(isset($_POST['username']) && isset($_POST['password'])){
		$user = $_POST['username'];
		$pass = $_POST['password'];
		

		try{
			require("config.php");

			//$username, $password, $host, $database
			$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
			$db = new PDO($conn_string, $username, $password);

			$stmt = $db->prepare("select id, username, password from `TestUsers` where username = :username LIMIT 1");
			$stmt->execute(array(":username"=>$user));

			
			$results = $stmt->fetch(PDO::FETCH_ASSOC);

			//echo var_export($results, true);

			if($results && count($results) > 0){
				
				if($pass == $results['password']){
					echo "Welcome, " . $results["username"];
					echo "[" . $results["id"] . "]";
					header("Location: profilePage.php");
				}
				else{
					echo "Invalid password";
				}
			}
			else{
					echo "Invalid username";
			}
		}
		//error message stuff
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

	if(isset($_POST['usernameF2']) && isset($_POST['passwordF2']) && isset($_POST['pConfirm']) ){
		$userF2 = $_POST['usernameF2'];
		$passF2 = $_POST['passwordF2'];
		$passConfirm = $_POST['pConfirm'];

		if($passF2 != $passConfirm){
			echo "Passwords do not match!";
			exit();
		}
		

		try{
			require("config.php");

			//$username, $password, $host, $database
			$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
			$db = new PDO($conn_string, $username, $password);

			if ($passF2 == $passConfirm) 
			{
				$stmt = $db->prepare("INSERT into `TestUsers`(`username`, `password`) VALUES(:username, :password)");
				$results = $stmt-> execute(array(":username"=>$userF2, ":password"=>$passF2));
			}

			
			$results = $stmt->fetch(PDO::FETCH_ASSOC);

			

			if($results && count($results) > 0){
				
				if($pass == $results['passwordF2']){
					echo "Welcome, " . $results["usernameF2"];
					echo "[" . $results["id"] . "]";
					header("Location: profilePage.php");
				}
				else{
					echo "Invalid password";
				}
			}
			else{
					echo "Invalid username";
			}
		}
		//error message stuff
		catch(Exception $e){
			echo $e->getMessage();
		}
	}


	
?>