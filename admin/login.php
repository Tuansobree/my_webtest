<?php 

session_start();

function QC_str_00($str){
    $str = str_replace(" ","",$str);
    $str = str_replace("?>","",$str);
    $str = str_replace("<?","",$str);
    $str = str_replace(".php","",$str);
    $str = str_replace(".txt","",$str);
    $str = str_replace("%|%","",$str);
    $str = str_replace(";","",$str);
    $str = str_replace(".","",$str);

    return $str;
}


function Decode_set($str){
    $str   = base64_decode( $str );
    $str_r = explode("-" , $str);   
    return $str_r[0];
}


function check_id_pass($user_id , $pass){

    $path = "./user/".$user_id.".txt";
    $get_pass = explode( "%|%" , file_get_contents($path) );
    $pass_get = Decode_set($get_pass[0]);
    
    if ($pass_get == $pass) { return 1; } 
    else { return 0; }

}


if (isset($_POST["User_Login"]) && isset($_POST["Password_Login"]) ) {
    $User = QC_str_00($_POST["User_Login"]);
    $Pass = QC_str_00($_POST["Password_Login"]);


    $path = "./user/".$User.".txt";
    if (file_exists($path)) {

        $check_id_pass = check_id_pass($User,$Pass);

        if ($check_id_pass == 1) {

            $get_data_accout = explode( "%|%" , file_get_contents($path) );
            $name  = $get_data_accout[1];
            $class = $get_data_accout[2];
            

            $_SESSION["User_ID"]    = $User;
            $_SESSION["User_class"] = $class;
            $_SESSION["User_Name"]  = $name;    

            echo "<script>window.location.href = './';</script>";
        } else {
            echo "<script>
                    alert('ไอดี หรือ รหัสผ่านไม่ถูกต้อง.');
                    window.location.href = './login.php';

                  </script>";
            exit;            
        }

        

    }else {

        echo "<script>
                alert('ไอดี หรือ รหัสผ่านไม่ถูกต้อง.');
                window.location.href = './login.php';

              </script>";
        exit;

    }
    
}


//----------------------------LogOut----------------------------//
if (isset($_GET["logout"])) {   
    session_unset(); session_destroy();   
    echo    "<script>                
                window.location.href = './login.php';
            </script>";
    exit;
}
//----------------------------LogOut----------------------------//


$name_web = file_get_contents("./setting/name.txt");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/logo1.png">
    <link rel="icon" type="image/png" href="../assets/img/logo1.png">

    <title>Login to Admin <?php echo $name_web; ?> </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style type="text/css">
        
        .bg-login-image-new {
          background: url("./img/wh.jpg");
          background-position: center;
          background-size: cover;
        }

        .bg-gradient-primary {
            background-color: #1cc88a;
            background-image: linear-gradient(180deg, #1cc88a 10%, #008857 100%);
            background-size: cover;
        }

    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image-new"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="login.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter User ID" name="User_Login">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="Password_Login">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                                        <div class="col-lg-6 mt-3">
                                        <a class="btn-sm btn-danger" href="../index.php">back</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>