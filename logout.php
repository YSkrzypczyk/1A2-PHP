<?php
	session_start();
	require "conf.inc.php";
	unset($_SESSION['email']);
	unset($_SESSION['login']);
	header("Location: login.php");

