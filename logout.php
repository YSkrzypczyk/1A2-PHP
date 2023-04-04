<?php
	session_start();
	unset($_SESSION['email']);
	unset($_SESSION['login']);
	header("Location: login.php");

