 <html>
      <head>
          <title>Notifications </title>
          <style>
              div{
                  background-color:cornflowerblue;
                  color:white;
                  border-radius:5px;
              }
              td{
                  width:400px
              }
          </style>
      </head>
      <body>
          <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="temp/assets/css/main.css" />
          <input type='text' id='sql' value='SELECT title,text FROM notifications' style='display:none'/>
         <div id='nots'></div>
          <?php
          
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
          <script src = "jquery-3.2.1.min.js"></script>
         <script>
             var l;
             function httpGet(url)
             {
                var xml = new XMLHttpRequest();
                xml.open("GET",url,false);
                xml.send(null);
                return xml.responseText;
             }
             setInterval(function(){
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
                           
                var str = "<table>";
                for(i=0;i<list.length;i++)
                {
                    var keys = Object.keys(l[i]);
                    var title=list[i][keys[0]];
                    var text = list[i][keys[1]];
                    str+=("<tr><td style='width:50px;'></td><td><div class='box'>");
                    str+=("<div class='content'><header class='align-center'>");
                    str+=("<h2>"+title+"</h2></header>");
                    str+=("<p>"+text+"</p><div>");
                    //str+=("<tr><td></td><td>"+text+"</td></tr></table></div></td></tr>");
                }
                str+="<table>";
                document.getElementById("nots").innerHTML = str;
             },1000);
         </script>
      </body>
 </html>