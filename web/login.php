<html>
    <head>
    <title>login</title>
    <style>
        #error{
            color:red;
        }
        td{
            width:50px;
        }
        table{
            font-size:30px;
            
        }
        input{
            font-size:30px;
            backgorund-color:white;
            color:white;   
        }
        
        h4{
            color:white;
        }
    </style>
    </head>
    <body>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<?php
			require("header.php");
		?>
        <?php
            session_start();
			echo($_SESSION["username"]);
			if (isset($_SESSION["username"])) {
				require("loggedinmenu.php");
			}
			else {
				require("menu.php"); 
			}
			
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                if ($_POST["username"] != "agent092" || $_POST["password"] != "ilovePuppies")
                {
                     echo("a<div style='display:none' id ='message'>Username Or Password are not correct. Please be sure your agent account has access to the website.</div>");
                }
                else
                {
                    $_SESSION["username"]="agent092";
					session_write_close();
                    header("Location:index.php");
                }
            }
        ?>
    </body>
   </br></br>
    <form action='' method='post' id='frm'>
        <div class='box'>
            <div class='content'>
                <header class='align-center'>
            <table border='0'>
            <tr><td><h4>Username</h4></td><td></td><td><div class="6u 12u$(xsmall)">
                <input style='width:300px' type="text" name="username" id="username" value="" placeholder="User Name" /></div></td></tr>
            <tr><td><h4>Password</h4></td><td></td><td><div class="6u$ 12u$(xsmall)">
                <input style='width:300px' type="password" name="password" id="password" value="" placeholder="Password" /></div></td></tr>
            <tr><td></td><td colspan='2'><input type='button' value='send' style='width:500px;height:100px' onclick='fu()'></td></tr>
            <tr><td colspan='3'><h4 id='error'></h4></td></tr>
        </table>
        </header>
        </div>
            </div>
    </form>
    
    <script>
        document.getElementById("error").innerText = document.getElementById("message").innerText;
        function fu(){
            var username = document.getElementById("username");
            var password = document.getElementById("password");
            if(username.value==""||password.value=="")
            {
                document.getElementById("error").innerText="You must enter password";
            }
            else
            {
                document.getElementById("frm").submit();
            }
        }
    </script>
	<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
</html>