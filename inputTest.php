<?php 
    function headerFun($link){
            header("Location:$link");
    }
    require("script/main.php");
    session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test kiritish</title>
    <link rel="stylesheet" href="css/col.css">
    <link rel="stylesheet" href="css/inTe.css">
</head>
<body>
    <?php 

        if(!empty($_SESSION["auth"])){
              if($_SESSION['userType'] == 'teacher'){
                $b=true;
              }else{
                headerFun("index.php");
              }
            }else{
                headerFun("index.php");
            }

    ?>
    <div class="contaner">
        <form action="" method="get">
            
            <?php 
                for ($i=0; $< ; $i+) { 
                    // code...
                }
             ?>

        </form>
    </div>
</body>
</html>