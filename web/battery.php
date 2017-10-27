<?php require("header.php"); ?>
<script>
a = window.onload;
window.onload = function() {
	a();
	document.getElementById("batteryDiv").style.width = "100%";
};
</script>
<body>
<h1 id="showDiv" style="z-index: 100000000; position: fixed; width: 100%; top: 40%; color: black; text-align: center; margin: auto; font-size: 100px;">Battery: </h1>
</body>