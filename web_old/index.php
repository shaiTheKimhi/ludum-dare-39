<html>
<head>
<title>HomePage</title>
<style>
    a{
        text-decoration:none;
    }
    td{
        color:white;
        background-color: blue;
        height: 500px;
    }
    .opt{
        width:500px;
    }
    .Opt{
        width:500px;
    }
</style>
</head>
<body>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
<?php
session_start();
main();
function main()
{
    $conn = new mysqli("localhost","root","","parks");
    if($conn->connect_error)
    {
        die($conn->connect_error);
    }
    options($conn);
}



function options($conn)
{
    echo("<table>");
    echo("<tr>");
    if($_SESSION["username"]!=null)
    {
       
        echo("<td class='Opt' ><a href='notifications.php'><h1>Notficiations</h1></a></td>");
        echo("<td class='Opt' ><a href='aboutUs.php'><h1>about us</h1></a></td>");
        echo("<td class='Opt'><a href='files.php'><h1>Files Download</h1></a></td>");
        echo("<td class='Opt'><a href ='logout.php'><h1>Lof Out</h1></a></td>");
    }
    else
    {
        echo("<td class='opt' ><a href='login.php'><h1>Log in</h1></a></td>");
        echo("<td class='opt'><a href='notifications.php'><h1>Notficiations</h1></a></td>");
        echo("<td class='opt'><a href='aboutUs.php'><h1>about us</h1></a></td>");
    }
    echo("</tr></table>");
}
?>
<script src="jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('td').fadeTo('fast',0.5);
        $('td').mouseenter(function(){
            $(this).fadeTo('fast',1);
        })
        $('td').mouseleave(function(){
            $(this).fadeTo('fast',0.5);
        })
    });
</script>
<body>