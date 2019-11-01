<!DOCTYPE html>
<html>
<head>
<script>
	function queryParam(){
		var params = new URLSearchParams(location.search);
		if(params.has('page')){
			var page = params.get('page');
			var ele = document.getElementById(page);
			if(ele){
				let home = document.getElementById('home');
				let about = document.getElementById('about');
				let htPlay = document.getElementById('How to Play');
				let login = document.getElementById('Login');
				let gTest = document.getElementById('GameTest');

				home.style.display="none";
				about.style.display = "none";
				htPlay.style.display = "none";
				login.style.display = "none";
				gTest.style.display = "none";
				ele.style.display = "block";
			}
		}
		else{
			let home = document.getElementById('home');
			home.style.display = "block";
		}
	}
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
			<a href="https://web.njit.edu/~joa23/IT-202-011/GameTest.php">Game Test</a> ||
		</nav>
		
		</figure>
	</header>
	<div id="home">
		This is home
	</div>
	<div id="about">
		<section>
		<h3>What is ChampChomp?</h3>
		<img src="https://cdn.frankerfacez.com/emoticon/377851/4">
		<p>ChampChomp is a 2D side scrolling game where you play as a version of the PogChamp Twitch Emote</p>
		<p>TESTING TESTING TESTING</p>
		</section>
	</div>
	<div id = "How to Play">
		<section>
			<h3>How to Play</h3>
			<p>To move your characther you can used W A S D or the arrow keys on your keyboard </p>
		</section>
		
	</div>
	<div id = "Login">
		<section>
			<h2>Login Page</h2>
			<p>Please login</p>
		</section>
	</div>

	<footer>
		<p>Here is where copyright goes</p>

	</footer>
</body>
</html>