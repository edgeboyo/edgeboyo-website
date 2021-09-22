<?php
	function msi_init() {
		$retval = new mysqli("localhost", "admin", "admin", "notepad");
		return $retval;
	}
?>