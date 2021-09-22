<?php
	function msi_init() {
		$retval = new mysqli("localhost", "admin", "admin", "repo");
		return $retval;
	}
?>
