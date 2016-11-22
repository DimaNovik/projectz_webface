<?
session_start();
include_once 'block/db_connect.php';

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
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

        </div>

        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

        <form id="get_tasks" action="view_ready_tasks.php" method="post">
          <?
            $query_clerk = "SELECT ClerkId, FName, SName, LName FROM Clerk WHERE PostId = 1 and EndDate is null Order By Fname";

            $result = sqlsrv_query( $conn,$query_clerk);

            if($result === false ) {
                die( print_r( sqlsrv_errors(), true));
              }

              echo "<label for='name'>Оберіть контролера</label>";
              echo "<select type='text' name='name' id='name' onchange='showCustomer(this.value)'>";

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

         
        <form>


        </div>

        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

        </div>
    </div>



    <!-- Выгрузка заданий для контролера-->

      <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

        </div>

        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

          <div id="txtHint"></div>
          
        </div>

        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

        </div>
    </div>

</div>
<!-- /.container -->

<script>
function showCustomer(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "view_ready_tasks.php?q="+str, true);
  xhttp.send();
}
</script>


<script>
function hover(element) {
    element.setAttribute('src', 'img/down.png');
}

function unhover(element) {
    element.setAttribute('src', 'img/down_white.png');
}
</script>



<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bs.js"></script>



</body>

</html>
