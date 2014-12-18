<?php
	session_start();
	unset($_SESSION);
	session_destroy();
?>
<meta http-equiv="refresh" content="0; url=login.php">
