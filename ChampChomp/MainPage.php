<!DOCTYPE html>
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


?>
<head>NOW WE GOT SOME <h3 style="color:red;">HEADER</h3>

<script>

function validate(){
	var form = document.forms[0];
	var password = form.password.value;
	var conf = "passwordTest";
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
		pv.innerText = "Password is not correct";
		//form.confirm.focus();
		form.confirm.className = "error";
		succeeded = false;
	}
	var accChoice = document.getElementById("dropdown");
	var accSelect = accChoice.options[accChoice.selectedIndex].value;

	if(accSelect == 1)
	{

		alert("Please select a account type!");
		form.confirm.className = "error"
		succeeded = false;
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
<p style="margin-left: 50%; margin-right: 50%">ChampChomp Login</p>
<div style="margin-left: 50%; margin-right: 50%">

<form mode="GET" action="#" onsubmit="return validate();">


<div style="margin-left: 50%; margin-right: 50%">
<!-- obligatory comment splet wrong :0-->

<select name="dropdown">
	<option value="1">Select Account type</option>
	<option value="2">Returning User</option>
	<option value="3">New User</option>
	<option value="4">Adminstrator</option>
	
</div>	
<!--testing upates -->
</select>

</form>

<form method="POST" action="#" onsubmit="return validate();">	
<input name="name" type="text" placeholder="Username"/>

<input type="password" name="password" placeholder="Password"/>

<input type="submit" value="Login"/>

</form>

</body>
</html>

<?php
if(isset($_POST)){
	echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";
}
if(isset($_GET))
		{
			echo "<br><pre>" . var_export($_GET, true) . "</pre><br>";
		}
?>