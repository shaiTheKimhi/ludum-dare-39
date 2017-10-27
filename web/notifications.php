<html>
      <head>
          <title>Notifications </title>
          <style>
             
          </style>
      </head>
      <body>
          <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
          <input type='text' id='sql' value='SELECT title,text FROM notifications' style='display:none'/>
        
          <?php
		   require("header.php");
           session_start();
			if (isset($_SESSION["username"])) {
				require("loggedinmenu.php");
			}
			else {
				require("menu.php"); 
			}
          /*echo("<table>");
          while($not = $res->fetch_assoc())
          {
              $title = $not["title"];
              $text = $not["text"];
              echo("<tr><td style='width:500px;'></td><td><div>");
              echo("<table><tr><td></td><td><h2>$title</h2></td></tr>");
              echo("<tr><td></td><td>$text</td></tr></table></div></td></tr>");
              echo(str_repeat("<tr></tr>",50));
          }
          echo("</table>");*/
          ?>
		  </br></br>
		   <div id='nots'></div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
         <script>
             var l;
             function httpGet(url)
             {
                var xml = new XMLHttpRequest();
                xml.open("GET",url,false);
                xml.send(null);
                return xml.responseText;
             }
             setTimeout(function(){
                 if(document.getElementById("sql").value=="")
                 return;
                 document.getElementById("nots").innerText = "";
                var sql = document.getElementById("sql").value;
                var res = httpGet("query.php?query="+sql);
                if(res=="false")
                    return;
                var list = jQuery.parseJSON(res);
                l=list;
                var keys;
                var str="";
                for(i=0;i<list.length;i++)
                {
                    var keys = Object.keys(l[i]);
                    var title=list[i][keys[0]];
                    var text = list[i][keys[1]];
                    str+=("<div class='box'>");
                    str+=("<div class='content'><header class='align-center'>");
                    str+=("<h2>"+title+"</h2></header>");
                    str+=("<p>"+text+"</p></div></div>");
                    //str+=("<tr><td></td><td>"+text+"</td></tr></table></div></td></tr>");
                }
                document.getElementById("nots").innerHTML = str;
             },1000);
         </script>
		 <script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
      </body>
 </html>