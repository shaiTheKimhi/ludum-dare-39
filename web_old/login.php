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
        div{
            background-color:white;
        }
        h4{
            color:white;
        }
    </style>
    </head>
    <body>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="temp/assets/css/main.css" />
        <?php
            session_start();
            $conn = new mysqli("localhost","root","","large_donut");
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $query = "SELECT * FROM users where username='$username' AND password='$password'";
                $res = $conn->query($query);
                if(json_encode($res)=="false")
                {
                     echo("a<div style='display:none' id ='message'>Username Or Password Not Correct</div>");
                }
                else if($res->fetch_assoc())
                {
                    $_SESSION["username"]=$username;
                    header("Location:index.php");
                }
                else{
                    echo("<div style='display:none' id ='message'>Username Or Password Not Correct</div>");
                }
            }
        
        ?>
    </body>
   
    <form action='' method='post' id='frm'>
        <div class='box'>
            <div class='content'>
                <header class='align-center'>
            <table>
            <tr><td><h4>Username</h4></td><td><div class="6u 12u$(xsmall)">
                <input style='width:300px' type="text" name="username" id="username" value="" placeholder="User Name" /></div></td></tr>
            <tr><td><h4>Password</h4></td><td><div class="6u$ 12u$(xsmall)">
                <input style='width:300px' type="password" name="password" id="password" value="" placeholder="Password" /></div></td></tr>
            <tr><td colspan='2'><input type='button' value='send' style='width:500px;height:100px' onclick='fu()'></td></tr>
            <tr><td colspan='2'><h4 id='error'></h4></td></tr>
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
</html>