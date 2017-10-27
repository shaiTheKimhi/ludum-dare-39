<html>
<head>
    <title>about us</title>

</head>
<body>
    <?php
    $file = fopen("aboutUs.txt","a+");
    $text = fread($file,100000);
    $list = explode($text,"\n");
    for($i=0;i<len($list);$i++)
    {
        echo($list[$i]."</br>");
    }
    ?>
</body>
</html>