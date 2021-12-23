<?php 
    function headerFun($link){
            header("Location:$link");
          } 
          require("script/main.php");
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tizimga kirish</title>
    <link rel="stylesheet" href="css/col.css" />
    <link rel="stylesheet" href="css/regsLog.css"/>
  </head>
  <body>
      <?php
          if(!empty($_POST["login"]) and !empty($_POST['parol'])){
            $login = $_POST['login'];
            $parol =  $_POST['parol'];

            $query = "SELECT * FROM user WHERE login='$login'";
            $resoult = mysqli_fetch_assoc(mysqli_query($link,$query));

            if(!empty($resoult)){
              $hash = $resoult['parol'];
              if(password_verify($parol, $hash)){
                session_start();
                $_SESSION["auth"]=true;
                $_SESSION['login']=$login;
                $_SESSION['id'] = $resoult['id'];
                $_SESSION['userType']=$resoult['userType'];
                headerFun("index.php");
              }else{
                $alert1="<b style='text-align: center;color: #c50f0f;'>login yoki parol xato</b>";
                $logError = true;
              }
            }else{
                $alert1="<b style='text-align: center;color: #c50f0f;'>login yoki parol xato</b>";
                $logError = true;
            }

          }

       ?>

        <div class="box in column">
          <h2>Tizimga kirish</h2>
          <?php 
            if(!empty($logError)){
              echo $alert1;
            }
          ?>
          <?php 
            session_start();
            if($_SESSION['regs']==true and empty($logError)){
              echo "<br>Ro'yxatdan o'tdingiz endi.Tizimga kirish oqrali kiring ";
            }
           ?>
          <form action="" method="post" class="column">
            
            <label for="llogin">Login kiriting</label>
              <input type="text" name="login" id="llogin" placeholder="Login kiriting">

            <label for="lparol">Parolingizni kiriting</label>
              <input type="password" name="parol" id="lparol" placeholder="parol kiriting">
            <a href="#" class="reparol">Parolni unutdim</a>
            <input type="submit" value="Kirish" id="loginIn">

            <div class="loglink">
                <a href="regstr.php">Men oldin ro'yxatdan o'tmaganman</a>
            </div>

          </form>
        </div>
        <div id="alert">xatolir bor</div>
        
      <script src="script/login.js"></script>
  </body>
</html>
