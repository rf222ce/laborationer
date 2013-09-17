<?php

	require_once("src/view/loginForm.php");  
	require_once("src/model/CheckLoginForm.php");
	require_once("src/view/loggedIn.php");	
	
	
	$loginForm = new LoginForm(); 
	$checkLoginForm = new CheckLoginForm();
	$loggedInPage = new LoggedInPage();

	// check if we just posted something, validate it
	// and set sessions and messages.
	$checkLoginForm->checkIfSubmitted();
	
	
	// If we are logged in and logout queryS dont exist -  echo logged in html	
	if($_SESSION['loggedIn'] == TRUE && !array_key_exists('logout', $_GET))
	{
  		echo $loggedInPage->LoggedIn($_SESSION['lastEnteredUsername']);	
  		$_SESSION['message'] = "";
	}
	
	// else if we pressed the logout button.
	elseif(array_key_exists('logout', $_GET))   
	{
      // loggedIn is still true.		
      if($_SESSION['loggedIn'] == TRUE)
      {
      	echo $loginForm->getForm("You've successfully logged out", $_SESSION['lastEnteredUsername']);
      }
      // if for some reason loggedIn is false, but
      // logout exists, just show the normal loginform
      // with no error message.
      else 
      {
      	echo $loginForm->getForm("", "");
      }
      
      $_SESSION['loggedIn'] = false;
		
	}
	
	elseif ($_SESSION['loggedIn'] == FALSE)
	{
  		echo $loginForm->getForm(htmlspecialchars($_SESSION['message']), 
  		htmlspecialchars($_SESSION['lastEnteredUsername']));
	}




