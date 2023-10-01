<?php
 include ("connect.php");
  include ("login.php");
    $Email = " ";
    $Password = " ";
 
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $signin = new Login();
        // The evaluate function in the signup class is used to check
        //if the user has in entered the correct info before before it sends it
        // to the database 
        $result = $signin->Evaluate($_POST);
        
        $Email = "";
        $Password = "";

        if ($result != "") {
            echo "<div style='text-align: center; font-size: 12px; color: white; background-color: grey;'>";
            echo "<br>The following errors occurred:<br><br>";
            echo $result;
            echo "</div>";
        }

        $Email = isset($_POST['email']) ? $_POST['email'] : '';
        $Password = isset($_POST['password']) ? $_POST['password'] : '';
    }

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name = "viewport" content="width-device-width,initial-scale=0.1">
    <title>Responsive Animated Login Form Using Html Css Only | Codehal</title>
    <link rel = "stylesheet" href="style.css">
</head>
<body>
    <section>
        <div class="login-box">
            <form method="post" action="">
                <h2>Login</h2>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input name="email" value="<?php echo $Email ?>" type="email"  required>
                    <label>Email</label>
                </div>

                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input name="password" value="<?php echo $Password ?>" type="password" required>
                    <label>password</label>
                </div>
                <div class="remember-forgot">
                    <label ><input type="checkbox">Remember me</label>
                    <a href="#">Forgot password ?</a>
                </div>
               <button type="submit">Login</button>
                <div class="register-link">
                    <p>Don't have an account? <a href="#">Register</a></p>
               </div>
            </form>
        </div>

    </section>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>