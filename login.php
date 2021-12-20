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
        <div class="box in column">
          <h2>Tizimga kirish</h2>
          <form action="" method="post" class="column">
            
            <label for="llogin">Login kiriting</label>
              <input type="text" name="login" id="llogin" placeholder="Login kiriting">

            <label for="lparol">Parolingizni kiriting</label>
              <input type="password" name="parol" id="lparol" placeholder="parol kiriting">
            <a href="#" class="reparol">Parolni unutdim</a>
            <input type="submit" value="Kirish" id="loginIn">

            <div class="loglink">
                <a href="regstr.html">Men oldin ro'yxatdan o'tmaganman</a>
            </div>

          </form>
        </div>
        <div id="alert">xatolir bor</div>
        
      <script src="script/login.js"></script>
  </body>
</html>
