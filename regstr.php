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
    <title>Ro'yxatdan o'tish</title>
    <link rel="stylesheet" href="css/col.css" />
    <link rel="stylesheet" href="css/regsLog.css"/>
  </head>
  <body>
        <div class="box column">
          <h2>Ro'yxatdan o'tish</h2>
          <form action="" method="post" class="column">
            <label for="selUser">Ro'yxatdan o'tishdan maqsad</label>
            <select name="selUser" id="selUser">
              <option value="none">--Tanlang--</option>
              <option value="student">Test ishlash uchun</option>
              <option value="teacher">Test joylash uchun</option>
            </select>

            <label for="name">Familiya va Ism</label>
              <input type="text" name="name" id="name" placeholder="Ismingiz va familiyangizni  kiriting">
              <?php 
                  function patterNameAlert($alert){
                    echo $alert;
                  }
               ?>

            <label for="email">Emailngizni kiriting
              <?php 
                function emailAlert(){
                  echo "  bu email oldin ro'yxatga olingan";
                }
               ?>
            </label>
              <input type="email" name="email" id="email" placeholder="Emailngizni kiriting">

              <?php 
                  function patterEmailAlert($alert){
                    echo $alert;
                  }
               ?>

            <label for="login">Login yarating  
              <?php 
                function loginAlert(){
                  echo "  bu login oldin ro'yxatga olingan";               
                }
               ?>
            </label>
              <input type="text" name="login" id="login" placeholder="Login kiriting">

              <?php 
                  function patterLoginAlert($alert){
                    echo $alert;
                  }
               ?>

            <label for="parol">Parol kiriting</label>
              <input type="password" name="parol" id="parol" placeholder="parol kiriting">

            <label for="reparol">Parolni takrorlang</label>
              <input type="password" name="reparol" id="reparol" placeholder="parolni tasdiqlang">
            
            <input type="submit" value="Yuborish" id="regis">

            <div class="loglink">
              <a href="login.php">Men oldin ro'yxatdan o'tganman</a>
            </div>
          </form>
    <?php 

        
        if(!empty($_POST)){
          $id=NULL;
          $userType = $_POST["selUser"];
          $name = $_POST['name'];
          $email  = $_POST['email'];
          $login = $_POST['login'];
          $parol = $_POST['parol'];
        
          // login  bandligini tek
          $query = "SELECT * FROM user WHERE login='$login'";
          $result = mysqli_fetch_assoc(mysqli_query($link, $query));
          if(empty($result)){
              // maydonlar tekshirish
              $tr=1;
              $pattern_name = "/^[a-z0-9 ._-]{2,}$/i";
              $pattern_email = "/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,}$/i";
              # $pattern_login = "/^[a-z0-9._-]{2,}$/i";
              // name tekshirish
              if(preg_match($pattern_name, $name)){
                $tr++;
              }else{
                $tr = 0;
                patterNameAlert("<p>Familiya va Ism xato.Familiya va Ismni to'g'ri kiriting.</p>");
              }
              // email teksirish
              if(preg_match($pattern_email, $email)){
                $tr++;
              }else{
                  $tr = 0;
                  patterEmailAlert("<p>Email qiymati mos emas.Emailni to'g'ri kiriting.</p>");
              }
              // login tekshirish
              if(preg_match($pattern_name, $login)){
                  $tr++;
              }else{
                $tr=0;
                patterLoginAlert("<p>Login qiymati mos emas. Boshqa login kiriting.</p>");
              }
              // malumotla junatish
              if($tr!=0){
                $parol=password_hash($parol, PASSWORD_DEFAULT);
                $query = "INSERT INTO user SET userType='$userType',name='$name',email='$email',login='$login',parol='$parol'";
                mysqli_query($link,$query)or die(mysqli_error($link));
                session_start();
                $_SESSION['regs']=true;
                headerFun("login.php");
              }
          }else{
            loginAlert();
          }
        }
    ?>
        <div id="alert">xatolir bor</div>
        </div>
      <script src="script/Regis.js"></script>
  </body>
</html>