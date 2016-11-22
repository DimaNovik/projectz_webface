<?
session_start();
include 'block/db_connect.php';


$clerkid = intval($_GET['q']);

//Выбераем id сотрудника, для которого необходимо вывести задания
  $query_clerk = "SELECT bp.bypassesid, bp.number, convert(varchar(10),bp.formdate, 104) as fd, bp.creator FROM ByPasses as              bp, Globset as gs
                  WHERE bp.clerkid=$clerkid and bp.formdate >= gs.PaymentDate 
                  Order by bp.formdate desc";

  $result = sqlsrv_query( $conn,$query_clerk);

    if($result === false ) {
      die( print_r( sqlsrv_errors(), true));
    }

    echo "<h2>Доступні завдання:</h2><hr/>";

    while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC) ) {
      

      echo "<div id='txtHint'>";
      echo "<div class='info_card'>";
      echo "<div class='info_img'><img src='img/down_white.png' onmouseover='hover(this);' onmouseout='unhover(this);'/></div>";
      echo "<p><b>Номер задания:</b> $row[number] </p>";
      echo "<p><b>Дата формирования:</b> $row[fd] </p>";
      echo "<p><b>Дата формирования:</b> $row[creator] </p>";

      echo "</div>";
      echo "</div>";
      }

 


// Выполняем процедуру выборки заданий, для выбранного контролера
/*$query_tasks = "declare @b int, @r tinyint
                set @b=238825

                exec jsonbypasses @b, @r output
                IF (@r = 0)  
                   PRINT 'Ok'  
                ELSE  
                   PRINT 'ne Ok';";

$result_tasks = sqlsrv_query( $conn,$query_tasks);


            if($result_tasks === false ) {
                die( print_r( sqlsrv_errors(), true));
              }
 */

?>



