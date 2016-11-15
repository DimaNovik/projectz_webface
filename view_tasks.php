<?
  if(isset($_POST['officename'])) {$officename=$_POST['officename'];} else {$officename='0';}
    if(isset($_POST['login'])) {$login=$_POST['login'];} else {$login='0';}
      if(isset($_POST['password'])) {$password=$_POST['password'];} else {$password='0';}

      //Подключаемся к выбранному РЭСу

      $serverName = $officename; //serverName\instanceName, portNumber (default is 1433)
      $connectionInfo = array( "Database"=>"pobut", "UID"=>$login, "PWD"=>$password);
      $conn = sqlsrv_connect( $serverName, $connectionInfo);

      if( $conn ) {
     //echo "Соединение установлено.<br />";
      }else{
     echo "Соединение не установлено.<br />";
      }
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Загрузка контрольных обходов</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap-grid-3.3.1.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/main.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <![endif]-->

</head>

<body>

<div class="container">

    <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-3 col-lg-3">

        </div>

        <div class="col-xs-8 col-sm-8 col-md-6 col-lg-6">

        <form id="get_tasks">
          <?
            $query_clerk = "select ClerkId, FName, SName, LName From Clerk Order By Fname";

            $result = sqlsrv_query( $conn,$query_clerk);

            if($result === false ) {
                die( print_r( sqlsrv_errors(), true));
              }

              echo "<select type='text' name='name'>";

              while ($row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC)) {
                $ConvFName = iconv("WINDOWS-1251", "utf-8", $row['FName']);
                $ConvSName = iconv("WINDOWS-1251", "utf-8", $row['SName']);
                $ConvLName = iconv("WINDOWS-1251", "utf-8", $row['LName']);

                $AllName = $ConvFName." ".$ConvSName." ".$ConvLName;
                //echo $ConvFName;
                
                echo "<option value=".$row['ClerkId'].">".$AllName."";
              }

              echo "</select>";
          ?>

          <p align="center"><input type="submit" id="submit_tasks" name="submit_tasks" value="Отримати завдання"></p>
        <form>

        </div>

        <div class="col-xs-2 col-sm-2 col-md-3 col-lg-3">

        </div>
    </div>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bs.js"></script>



</body>

</html>
