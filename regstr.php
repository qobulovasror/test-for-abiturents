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

            <label for="email">Emailngizni kiriting</label>
              <input type="email" name="email" id="email" placeholder="Emailngizni kiriting">

            <label for="login">Login yarating</label>
              <input type="text" name="login" id="login" placeholder="Login kiriting">

            <label for="parol">Parol kiriting</label>
              <input type="password" name="parol" id="parol" placeholder="parol kiriting">

            <label for="reparol">Parolni takrorlang</label>
              <input type="password" name="reparol" id="reparol" placeholder="parolni tasdiqlang">
            
            <input type="submit" value="Yuborish" id="regis">

            <div class="loglink">
              <a href="login.php">Men oldin ro'yxatdan o'tganman</a>
            </div>
          </form>
          
        <div id="alert">xatolir bor</div>
        </div>
      <script src="script/Regis.js"></script>

      <?php
        
        require("script/main.php");

        if(!empty($_POST)){
          $id=NULL;
          $userType = $_POST["selUser"];
          $name = $_POST['name'];
          $email  = $_POST['email'];
          $login = $_POST['login'];
          $parol = $_POST['parol'];

          $query = "SELECT * FROM user WHERE login!='$login'OR email!='$email'";
          $db_logins = mysqli_query($link,$query)or die(mysqli_error($link));
          $result = mysqli_fetch_assoc($db_logins);
          if(!empty($result)){
            $query = "INSERT INTO user(id,userType,name,email,login,parol)VALUES ($id,$userType,$name,$email,$login,$parol)";
            mysqli_query($link,$query);
          }else{
            echo "bu login yoki email oldin ro'yxatga olingan";
          }



        }


      ?>
  </body>
</html>
