
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

    <div class="row position-login-form">
        <div class="col-xs-2 col-sm-2 col-md-3 col-lg-3">

        </div>

        <div class="col-xs-8 col-sm-8 col-md-6 col-lg-6">

            <form id="loginToBase" action="view_tasks.php" method="post">
                <p><label for="clerkname">Оберіть РЕМ:</label></p>
                <?
                $conn = mysqli_connect("10.75.1.159","anton","123321","bonfire_dev", 3306);
                mysqli_set_charset($conn, "utf8");
                $sql = "SELECT * FROM offices";
                $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        $output = '<select name="officename" class="placeholder">';
                        while($row = mysqli_fetch_array($result)) {


                            $output .= "<option value='".$row['connecting']."'>".$row['resname']."</option>";
                        }
                        $output .= "</select>";

                    echo $output;
                    } else {
                        echo "0 results";
                    }

                    mysqli_close($conn);

                ?>
                <p><label for="login">Логин:</label></p>
                    <input type="text" name="login" id="login" placeholder="Введіть Ваш логін">
                <p><label for="password">Пароль:</label></p>
                    <input type="password" name="password" id="password" placeholder="Введіть Ваш пароль">
                <p align="center"><input type="submit" id="submit" name="submit" value="УВІЙТИ"></p>
            </form>


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
