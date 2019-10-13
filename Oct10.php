<!DOCTYPE html>
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function checkPasswords(){
	if(isset($_POST['password']) && isset($_POST['confirm'])){
		if($_POST['password'] == $_POST['confirm']){
			echo "<br>Passwords Matched!<br>";
		}
		else{
			echo "<br>Passwords didn't match!<br>";
		}
	}
}

?>
<html>
<head>
<script>
function validate(){
	var form = document.forms[0];

	//checking for password validation
	var password = form.password.value;
	var conf = form.confirm.value;
	console.log(password);
	console.log(conf);
	let pv = document.getElementById("validation.password");
	let succeeded = true;


	if(password == conf){
		
		pv.style.display = "none";
		form.confirm.className= "noerror";	
	}
	else{
		pv.style.display = "block";
		pv.innerText = "Passwords don't match";
		
		form.confirm.className = "error";
		
		succeeded = false;
	}



	//checking for empty email and email validation
	var email = form.email.value;
	var ev = document.getElementById("validation.email");
	var eConfirm = form.eConfirm.value;
	console.log(email);
	console.log(eConfirm);
	//this won't show if type="email" since browser handles
	//better validation. Change to type="text" to test

	//valid email type
	var eCheckValid = email.endsWith(".com");
	if(eCheckValid == false)
	{
		ev.style.display = 'block';
		ev.innerText = "Please enter in an address with '.com' ";
		succeeded = false;
	}

	

	if(email == "" || eConfirm == "")
	{
		ev.style.display = 'block';
		ev.innerText = "Please enter a valid email address in the field";
		succeeded = false;
	}
	else
	{
		ev.style.display = "none";
		form.eConfirm.className = "noerror"

		if(email.indexOf('@') > -1){
		ev.style.display = "none";
		}
		else{
			ev.style.display = "block";
			ev.innerText = "Please enter a valid email address";
			succeeded = false;
		}


		if(email == eConfirm){
			ev.style.display = 'none';

		}
		else{
			ev.style.display = 'block';
			ev.innerText = "Emails do not match";
			form.confirm.className = "error";

			succeeded = false;

	}


	}

	//dropdown validation
	var sel = form.dd;
	
	if(sel.selectedIndex == 0){
		alert("Please pick a value");
		succeeded = false;
	}
	console.log(sel.options[sel.selectedIndex].value);

	//checking for filled username
	var username = form.username.value;
	var uv = document.getElementById("validation.username");
	console.log(username);

	if(username == "")
	{
		uv.style.display = 'block';
		uv.innerText = "Please enter in a username";

		succeeded = false;
	}
	else{
		uv.style.display = 'none';
		


	}




	return succeeded;	
}
</script>
<style>
input { border: 1px solid black; }
.error {border: 1px solid red;}
.noerror {border: 1px solid green;}
</style>
</head>
<body>
<div style="margin-left: 50%; margin-right:50%;">
<form method="POST" action="#" onsubmit="return validate();">
<input name="username" type="text" placeholder="Enter your username"/>
<span style="display:none;" id="validation.username"></span>

<input name="email" type="email" placeholder="name@example.com"/>
<input name="eConfirm" type="email" placeholder="Re-Enter email"/>
<span id="validation.email" style="display:none;"></span>

<input type="password" name="password" placeholder="Enter password"/>
<input type="password" name="confirm" placeholder="Re-Enter password"/>
<span style="display:none;" id="validation.password"></span>

<!-- Add dropdown element (something specific to your project) -->
<select name="dd" id="mySelectId">
	<option value="0">Account Type</option>
	<option value="1">Returning User</option>
	<option value="2">New User</option>
	<option value="3">Administrator</option>
</select>
<input type="submit" value="Login"/>
</form>
</div>
</body>
</html>
<?php checkPasswords();?>
<?php
if(isset($_POST)){
	echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";
}
?>
© 2019 GitHub, Inc.