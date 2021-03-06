         <!-- jQuery 3 -->
         <script src="bower_components/jquery/dist/jquery.min.js"></script>
         <!-- Bootstrap 3.3.7 -->
         <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
         <!-- iCheck -->
         <script src="plugins/iCheck/icheck.min.js"></script>
         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
         <?php 

include_once'connectdb.php';
session_start();

if(isset($_POST['btn_login'])){ //------- if btn_login is clicked  this code execute
  $usermail=$_POST['txt_email'];
  $userpass=$_POST['txt_password'];

  // echo'The mail is'.' '.$usermail.' '.'and pass is'.$userpass.'<br';
  $select =$pdo->prepare("select * from `sbh_tbl_user` where useremail='$usermail' AND password='$userpass'");
  $select->execute();

  $row=$select->fetch(PDO::FETCH_ASSOC);
  
  if($row['useremail'] == $usermail AND $row['password'] == $userpass AND $row['role'] == "admin"){


    
      $_SESSION['userid']=$row['userid'];
      $_SESSION['username']=$row['username'];
      $_SESSION['useremail']=$row['useremail'];
      $_SESSION['role']=$row['role'];




    echo '<script type="text/javascript">
    jQuery(function validation(){
        swal({
        title: "Good job!'.$_SESSION['username'].'",
        text: "Matched !!",
        icon: "success",
         button:"Loading.....",
         });
    });
    </script>';
    header('refresh:3;dashboard.php');
  }else if(($row['useremail'] == $usermail AND $row['password'] == $userpass AND $row['role'] == "User")){
      
      $_SESSION['userid']=$row['userid'];
      $_SESSION['username']=$row['username'];
      $_SESSION['useremail']=$row['useremail'];
      $_SESSION['role']=$row['role'];
     echo '<script type="text/javascript">
    jQuery(function validation(){
        swal({
        title: "Good job!'.$_SESSION['username'].'",
        text: "Detailed Matched!",
        icon: "success",
        button:"Loading.....",
         });
    });
    </script>';
    header('refresh:2;user.php');  
   
  }
}
?>
         <!DOCTYPE html>
         <html>

             <head>
                 <meta charset="utf-8" />
                 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                 <title>Inventory Pos| Login</title>
                 <!-- Tell the browser to be responsive to screen width -->
                 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
                     name="viewport" />
                 <!-- Bootstrap 3.3.7 -->
                 <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" />
                 <!-- Font Awesome -->
                 <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css" />
                 <!-- Ionicons -->
                 <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css" />
                 <!-- Theme style -->
                 <link rel="stylesheet" href="dist/css/AdminLTE.min.css" />
                 <!-- iCheck -->
                 <link rel="stylesheet" href="plugins/iCheck/square/blue.css" />

                 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                 <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                 <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

                 <!-- Google Font -->
                 <link rel="stylesheet"
                     href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" />
             </head>

             <body class="hold-transition login-page">
                 <div class="login-box">
                     <div class="login-logo">
                         <a href="index.php"><b>Inventory</b>POS</a>
                     </div>
                     <!-- /.login-logo -->
                     <div class="login-box-body">
                         <p class="login-box-msg">Sign in to start your session</p>

                         <form action="" method="post">
                             <div class="form-group has-feedback">
                                 <input type="email" name="txt_email" class="form-control" placeholder="Email"
                                     required />
                                 <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                             </div>
                             <div class="form-group has-feedback">
                                 <input type="password" name="txt_password" class="form-control"
                                     placeholder="Password" />
                                 <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                             </div>
                             <div class="row">
                                 <div class="col-xs-8">
                                     <a href="#"
                                         onclick="swal('To get password','Please contact admin or service provider','Error');">Forgot
                                         Password</a><br>
                                 </div>
                                 <!-- /.col -->
                                 <div class="col-xs-4">
                                     <button type="submit" name="btn_login" class="btn btn-primary btn-block btn-flat">
                                         Login In
                                     </button>
                                 </div>
                                 <!-- /.col -->
                             </div>
                         </form>
                     </div>
                     <!-- /.login-box-body -->
                 </div>
                 <!-- /.login-box -->


                 <script>
                 $(function() {
                     $("input").iCheck({
                         checkboxClass: "icheckbox_square-blue",
                         radioClass: "iradio_square-blue",
                         increaseArea: "20%" /* optional */ ,
                     });
                 });
                 </script>
             </body>

         </html>