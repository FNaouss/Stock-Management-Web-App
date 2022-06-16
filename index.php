<?php
            session_start();
if(isset($_POST['login'])){
        $email=$_POST['email'];
        $pass=$_POST['pw'];
    include('DATABASE/connexion.php');
        $pdostat=$bdd->prepare("select * from login where username='".$email."' and PASSWORD='".$pass."' limit 1");
        $pdostat->execute();
        if($pdostat->rowCount()==1){
            header("location:./dashboard.php");
            $_SESSION['user']=$email;
        }
        else{
            header("location:./index.php");
        }
    }
if(isset($_POST['logout'])){
    session_destroy();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./css/login.css">
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Virgin</title>
    </head>
    <body>
        <section class="header">
            <div class="nav">
                <nav>
                    <div class="all">
                        <a href="index.php"><img src="images/virgin-logo.png"></a>
                    </div>
                </nav>
            </div>
            <div class="main">
                <h1>Virgin</h1>
                <p>Hi cashier,<br>enter your address and password <br>to access the Stock app.</p>
            </div>
            <div class="login">
                <h1>Login Form</h1>
                <div class="form">
                    <form action="" method="post">
                        <div class="inp1">
                            <input autocomplete="off" id="name" name="email" placeholder="Email Address" type="email" required>
                            <label id="label" for="name">&nbsp</label>
                        </div>
                        <div class="inp2">
                            <input autocomplete="off" placeholder="Password" id="name" name="pw" type="password" required>
                            <label id="label" for="name">&nbsp</label>
                        </div>
                        <div class="inp3">
                            <div class="check"><input type="checkbox"> Remember me</div>
                            <a href="#">forgot password ?</a>
                        </div>
                        <div class="inp4">
                            <input type="Submit" name="login" value="Log In">
                        </div>
                        <div class="or">
                            <span>OR</span>
                        </div>
                        <div class="inp5">
                            <span>Don't have an account ? </span><a href="#">Create one</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="copyright">
                <span>Copyright © 2021-2022 Virgin, All rights reserved.</span>
            </div>
        </section>
    </body>
</html>