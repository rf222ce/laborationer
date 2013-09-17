<?php 


	
	
class LoginForm
{
	
	public function getForm($errorMessage, $lastUsername)
	{
		// kalla på dagens datum. 
		require_once("todaysDateAndTimeSwe.php");
			
		$todaysDateAndTimeSwe = new TodaysDateAndTimeSwe();
		
		$todaysDateAndTime = $todaysDateAndTimeSwe->getTodaysDate();
		
		return 	'
		<html xmlns="http://www.w3.org/1999/xhtml" >
			<head>
				<title>Labb1 del 3</title>
				
				<meta http-equiv=\'content-type\' content=\'text/html; charset=utf8\'>
				
			</head>
				
			<body>
				<h1> Lab 1 part 3 </h1>
				
				<h2>Ej inloggad </h2>
				<form action="?login"  method="POST" id="form1"  >
					<fieldset>
						<legend> Enter your username and password! </legend>
						<p>' . $errorMessage . '</p>
						<label for="usernameInput"> Username:  </label>
						<input id="usernameInput" type="text" name="username" " value=' . $lastUsername .' > 
						
						<label for="userPassInput"> Password: </label>
						<input id="userPassInput" type="text" name="userpassword" value="" >  
						
						<input type="Submit" Name="Submit" value="Login">
					</fieldset>
				</form>
				<p>'. $todaysDateAndTime .'</p>
			</body>
		</html>';
	}	
}
