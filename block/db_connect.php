 <?

  if(isset($_POST['officename'])) {
    $_SESSION['officename'] = $_POST['officename'];

    } else {$officename='0';}

  if(isset($_POST['login'])) {
  
    $_SESSION['login'] = $_POST['login'];
    
    } else {$login='0';}
      
  if(isset($_POST['password'])) {
    $_SESSION['password']=$_POST['password'];
    } else {$password='0';}

      //Подключаемся к выбранному РЭСу

      $serverName = $_SESSION['officename']; //serverName\instanceName, portNumber (default is 1433)
      $connectionInfo = array( "Database"=>"pobut", "UID"=>$_SESSION['login'], "PWD"=>$_SESSION['password']);
      $conn = sqlsrv_connect( $serverName, $connectionInfo);



      if( $conn ) {
     //echo "Соединение установлено.<br />";
      }else{
     echo "Соединение не установлено.<br />";
      }

?>