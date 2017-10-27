 <?php
 error_reporting(0);
         try{
              $conn = new mysqli("localhost","root","","large_donut");
          
          $query =urldecode($_GET["query"]);
         // echo("$query");
          $res = $conn->query($query);
         // echo(json_encode($res));
          $list;
          $i=0;
          while($row = $res->fetch_assoc())
          {
              $list[$i]=$row;
              $i++;
          }
          echo(json_encode($list));
         }
         catch(Exception $e){
             die("error");
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