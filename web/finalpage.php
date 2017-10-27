<?php
session_start();
if (isset($_SESSION["username"]) && strtoupper($_POST["passphrase"]) == "A BIRTHDAY CAKE") {
	echo("<img src='winmeme.png' style='height: 100%'/>");
}
else {
	header("Location: annihilation.php");
}
?>
<script>
window.onload = function() {
		localStorage.setItem("battery", "-1");
}
</script>