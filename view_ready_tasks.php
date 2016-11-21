<?
session_start();
include 'block/db_connect.php';


$clerkid = intval($_GET['q']);

//Выбераем id сотрудника, для которого необходимо вывести задания
$query_clerk = "SELECT * FROM ByPasses WHERE clerkid=$clerkid";

            $result = sqlsrv_query( $conn,$query_clerk);

            if($result === false ) {
                die( print_r( sqlsrv_errors(), true));
              }




// Выполняем процедуру выборки заданий, для выбранного контролера
$query_tasks = "declare @b int, @r tinyint
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
 echo "<p id='txtHint'>$result_tasks</p>";
            




?>