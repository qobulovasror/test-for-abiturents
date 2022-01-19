<?php 
	function headerFun($link){
            header("Location:$link");
    }
    require('../script/main.php');
    session_start();

    if(empty($_SESSION['admin'])){
        headerFun('../index.php');
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Panel</title>
    <link rel="stylesheet" href="../css/col.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <!-- header -->
<header>
      <div class="container">
        <div class="menu row between fullMenu">
          <a href="../index.php" class="logo">Online test</a>
          <ul class="row">
            <li><a href="../index.php">Bosh sahifa</a></li>
          </ul>
          <div class="log row" id="userName">
            <?php 
                if(!empty($_SESSION["auth"])){
                  $login = $_SESSION["login"];
                  $cout = "<div class='profil'> <b>$login</b>
                          <ul class='prof-win'>
                              <li><a href='../profil.php'>Profil sozlanmalari</a></li>
                  ";
                  $cout .= "<li><a href='?logout=0'>Chiqish</a></li>
                          </ul>
                      </div>
                  ";
                  echo $cout;
                  if(isset($_GET['logout'])){
                    $_SESSION['admin'] = null;
                    session_destroy();
                    headerFun("../index.php");
                  }
                }else{
                  echo "<a href='login.php' class='login'>Kirish</a>
                      <h3>/</h3>
                      <a href='regstr.php' class='regs'>Ro`yxatdan o`tish</a>";
                }
            ?>
            
          </div>
        </div>
        <div class="respMenu">
          <div class="row between">
            <a href="index.html" class="logo">Online test</a>
            <i onclick="menu()" class='bx bx-menu'></i>
          </div>
          <div id ='rightMenu' class="rightMenu rightMenuNoActive">
            <ul class="column">
              <i onclick="menuClose()" class='bx bx-x'></i>
              <li><a href="#">Bosh sahifa</a></li>
              <li><a onclick="menuClose()" href="#about">Haqida</a></li>
              <li><a onclick="menuClose()" href="#categoris">Bo'limlar</a></li>
              <li><a onclick="menuClose()" href="#"><del>Blog</del></a></li>
              <li><a onclick="menuClose()" href="#contact">Bog'lanish</a></li>
            </ul>
            <div class="log column" id="userName">
               <?php 
                if(!empty($_SESSION["auth"])){
                  $login = $_SESSION["login"];
                  echo "<a href='?id[]'><b>$login</b></a>";
                }else{
                  echo "<a onclick='menuClose()' href='login.php' class='login'>Kirish</a>
                  <a onclick='menuClose()' href='regstr.php' class='regs'>Ro`yxatdan o`tish</a>";
                }
               ?>
              
            </div>
          </div>
        </div>
      </div>
</header>

    <!-- /header  -->
    <!-- table 1 -->
	<div class="box1">
     <div class="container">
        <h2>Foydalanuvchilar ro'yxati</h2>
         <table>
        <tr>
            <th>id</th>
            <th>foydalanuvchi turi</th>
            <th>Ismi Familiyasi</th>
            <th>Email</th>
            <th>Login</th>
            <th>O'chirish</th>
        </tr>
    <?php
        // if (!empty($_POST)) {
        //     $name = $_POST['name'];
        //     $age = $_POST['age'];
        //     $birthday = $_POST['birthday'];
        //     $query = "INSERT INTO user SET name='$name', age='$age', birthday='$birthday'";
        //     mysqli_query($link,$query) or die(mysqli_error($link));
        // }
        if (isset($_GET['del'])) {
            $del = $_GET['del'];
            $query = "DELETE FROM user WHERE id=$del"; 
            mysqli_query($link,$query) or die(mysqli_error($link));
        }
        $query = "SELECT * FROM user";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        $result = '';
        foreach ($data as $elem) {
        $result .= '<tr>';
            $result .= '<td>' . $elem['id'] . '</td>';
            $result .= '<td>' . $elem['userType'] . '</td>';
            $result .= '<td>' . $elem['name'] . '</td>';
            $result .= '<td>' . $elem['email'] . '</td>';
            $result .= '<td>' . $elem['login'] . '</td>';
            $result .= '<td><a href="?del='.$elem['id'] . '">o`chirish</a></td>';
        $result .= '</tr>';
        }
        echo $result;
    ?>
    </table>
    <br><br>
     </div>   
    </div>  

    <!-- table 2 -->

    <div class="box2">
     <div class="container">
        <h2>Foydalanuvchilar test natijalari</h2>
         <table>
        <tr>
            <th>id</th>
            <th>Foydalanuvchi</th>
            <th>Fan nomi</th>
            <th>Testlar soni</th>
            <th>To'g'ri javoblar</th>
            <th>Xato javoblar</th>
            <th>O'chirish</th>
        </tr>
    <?php
        if (isset($_GET['del2'])) {
            $del2 = $_GET['del2'];
            $query = "DELETE FROM result WHERE id=$del2"; 
            mysqli_query($link,$query) or die(mysqli_error($link));
        }
        $query = "SELECT * FROM result";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        $result = '';
        foreach ($data as $elem) {
        $result .= '<tr>';
            $result .= '<td>' . $elem['id'] . '</td>';
            $user1 = $elem['userId'];
            $query = "SELECT * FROM user WHERE id='$user1'";
            $resoult = mysqli_fetch_assoc(mysqli_query($link,$query));

            $result .= '<td>' . $resoult['name'] . '</td>';
            $result .= '<td>' . $elem['fanName'] . '</td>';
            $result .= '<td>' . $elem['testCount'] . '</td>';
            $result .= '<td>' . $elem['correct'] . '</td>';
            $result .= '<td>' . $elem['wrong'] . '</td>';
            $result .= '<td><a href="?del2='.$elem['id'] . '">o`chirish</a></td>';
        $result .= '</tr>';
        }
        echo $result;
    ?>
    </table>
     </div>   
    </div>
    <br><br>
    
    <!-- table 3 -->

    <div class="box3">
     <div class="container">
        <h2>Fanlar ro'yxati</h2>
         <table>
        <tr>
            <th>id</th>
            <th>Fan nomi</th>
            <th>Testlar soni</th>
            <th>Tuzuvchi</th>
            <th>O'chirish</th>
        </tr>
    <?php
        if (isset($_GET['del3'])) {
            $del3 = $_GET['del3'];
            $query = "DELETE FROM fan WHERE id=$del3"; 
            mysqli_query($link,$query) or die(mysqli_error($link));
        }
        $query = "SELECT * FROM fan";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        $result = '';
        foreach ($data as $elem) {
        $result .= '<tr>';
            $result .= '<td>' . $elem['fanId'] . '</td>';
            $result .= '<td>' . $elem['name'] . '</td>';
            $result .= '<td>' . $elem['testCount'] . '</td>';
            $teacher1 = $elem['teacherId'];
            $query = "SELECT * FROM user WHERE id='$teacher1'";
            $resoult = mysqli_fetch_assoc(mysqli_query($link,$query));

            $result .= '<td>' . $resoult['name'] . '</td>';
            $result .= '<td><a href="?del3='.$elem['fanId'] . '">o`chirish</a></td>';
        $result .= '</tr>';
        }
        echo $result;
    ?>
    </table>
     </div>   
    </div>
    <br><br>
    <!-- table 4 -->

    <div class="box4">
     <div class="container">
        <h2>Testlar ro'yxati</h2>
         <table>
        <tr>
            <th>id</th>
            <th>Fan nomi</th>
            <th>Savol</th>
            <th>javob 1</th>
            <th>javob 2</th>
            <th>javob 3</th>
            <th>javob 4</th>
            <th>to'gri javob</th>
            <th>O'chirish</th>
        </tr>
    <?php
        if (isset($_GET['del4'])) {
            $del4 = $_GET['del4'];
            $query = "DELETE FROM tests WHERE id=$del4"; 
            mysqli_query($link,$query) or die(mysqli_error($link));
        }
        $query = "SELECT * FROM tests";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        $result = '';
        foreach ($data as $elem) {
        $result .= '<tr>';
            $result .= '<td>' . $elem['testId'] . '</td>';
            $result .= '<td>' . $elem['fan'] . '</td>';
            $result .= '<td>' . $elem['savol'] . '</td>';
            $result .= '<td>' . $elem['javob1'] . '</td>';
            $result .= '<td>' . $elem['javob2'] . '</td>';
            $result .= '<td>' . $elem['javob3'] . '</td>';
            $result .= '<td>' . $elem['javob4'] . '</td>';
            $result .= '<td>' . $elem['tjavob'] . '</td>';
            $result .= '<td><a href="?del4='.$elem['testId'] . '">o`chirish</a></td>';
        $result .= '</tr>';
        }
        echo $result;
    ?>
    </table>
     </div>   
    </div>
    <br>
    <br>
    <br>
</body>
</html>