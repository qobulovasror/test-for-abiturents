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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

            if (!empty($_POST)) {
            	
                $fname = $_POST['fname'];
            	$testCount = $_POST['testCount'];
                $varCount = $_POST['varCount'];
            	if (!empty($_SESSION['id'])) {
            		$teacherId = $_SESSION['id'];
            	}else{
            		$teacherId = '0';
            	}

            	$query = "INSERT INTO fan SET name='$fname' , testCount = '$testCount' , teacherId = '$teacherId'";
            	mysqli_query($link,$query)or die(mysqli_error($link));

                for($i=1; $i<=2; $i++){

                    $quiz = "quiz".$i;
                    $quiz = $_POST["$quiz"];

                    $reply1 = "reply".$i."1";
                        $reply1 = $_POST["$reply1"];
                    $reply2 = "reply".$i."2";
                        $reply2 = $_POST["$reply2"];
                    $reply3 = "reply".$i."3";
                        $reply3 = $_POST["$reply3"];
                    $reply4 = "reply".$i."4";
                        $reply4 = $_POST["$reply4"];

                    $right = "right".$i;
                        $right = $_POST["$right"];
                    if($right=='A'||$right=='a'){
                        $right = 1;
                    }else{
                        if($right=='B'||$right=='b'){
                        $right = 2;
                        }else{
                           if($right=='C'||$right=='c'){
                            $right = 3;
                            }else{
                                $right=4;
                            } 
                        }
                    }
                    if(!empty($quiz)){
                        $query = "INSERT INTO tests (fan, savol, javob1, javob2, javob3, javob4, tjavob) VALUES ('{$fname}', '{$quiz}', '{$reply1}', '{$reply2}', '{$reply3}', '{$reply4}', '{$right}')";

                        $query = 'INSERT INTO tests (fan, savol, javob1, javob2, javob3, javob4, tjavob) VALUES ("'.$fname.'","'.$quiz.'","'.$reply1.'","'.$reply2.'","'.$reply3.'","'.$reply4.'","'.$right.'")';
                    mysqli_query($link,$query)or die(mysqli_error($link));
                    }
                    $quiz = $reply1 = $reply2 = $reply3 = $reply4 = $right = "";
                }

            }


    ?>
    <header>
        <div class="headerBox">
            <div class="container row between ">
                <a href="index.php" class="logo">Online test</a>
                <a href="index.php" class="home">Bosh sahifaga qaytish</a>
                <div class="log row" id="userName">
                    <?php 
                        $login = $_SESSION['login'];
                          echo "<div class='profil'> <b>$login</b>
                                  <ul class='prof-win'>
                                      <li><a href='?logout=0'>Chiqish</a></li>
                                  </ul>
                              </div>
                          ";
                          if(isset($_GET['logout'])){
                            session_destroy();
                            headerFun("index.php");
                          }
                    ?>
                </div>
            </div>
        </div>
        <div class="info">
            <div class="container">
                <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et commodi saepe minus, omnis cum, culpa eveniet incidunt fugit, a fugiat eum iste fuga delectus vitae impedit doloremque distinctio non sit.</h2>
            </div>
        </div>
    </header>
    <div class="container">
        <form class="column" method="post">
        	<div class="testcerate">
                <h2>Test kiritish</h2>
                <label for="fname">Fan nomi</label>
                <input type="text" name="fname" id="fname" placeholder="Fan nomi" maxlength="50">
                <div id="error"></div>

                <label for="testCount">testlar soni</label>
                <input type="number" name="testCount" id="testCount" placeholder="Testlar soni" maxlength="50">
                <div id="error2"></div>

                <label for="varCount">Varantlar soni</label>
                <input type="number" name="varCount" id="varCount" placeholder="Varantlar soni">
                <div id="error3"></div>
               

                <input type="button" id="creat" value="Boshlash">
               
            </div>
            <div id="testForm">

            </div>
        </form>
    </div>
    <script>

    	let fname = document.getElementById('fname'),
    	    testCount = document.getElementById('testCount'),
    	    error = document.getElementById('error'),
    	    error2 = document.getElementById('error2'),
            error3 = document.getElementById('error3'),
    	    submit = document.querySelector("#creat"),
            testForm = document.getElementById('testForm'),
            varCount = document.getElementById('varCount');

        // KeyUp

        fname.addEventListener('keyup',function(e) {
            if(e.target.value.length < 3){
                e.target.style.border = "2px solid red";
            }else{
                if(e.target.value.length < 6){
                    e.target.style.border = "2px solid yellow";
                }else{
                    e.target.style.border = "2px solid green";
                }
            }
        })


        // Form submit
    	submit.addEventListener('click',function(e){
            e.preventDefault();
    		if(fname.value.length<2 ){
    			e.preventDefault();
    			error.innerHTML = "Xatolik: Fan nomini to'liq kiriting";
    		}else {
                if(Number(testCount.value)<2 ){
                e.preventDefault();
                error2.innerHTML = "Xatolik: test soni kam";
                }else {
                   if(Number(varCount.value)<2 || Number(varCount.value)>4){
                      e.preventDefault();
                      error3.innerHTML = "Xatolik: variantlar soni xato";
                   }else {

                       testForm.style.display = 'block';
                       let item = '';
                       for (let i = 1;i<=testCount.value; i++) {
                            item += "<div class='item'>";
                            item +=  `<label for="quiz${i}"><h3>Savol ${i}</h3></label>
                                      <textarea name="quiz${i}" id="quiz${i}"></textarea>`;
                            
                            for(let j=1;j<=varCount.value;j++){
                                item += "<div class='row'>";
                                 item += `<label for="reply${i}${j}">`;
                                 if(j==1){
                                     item += 'A';
                                 }else{
                                    if(j==2){
                                     item += 'B';
                                     }else{
                                        if(j==3){
                                         item += 'C';
                                        }else{
                                            item += 'D';
                                         }
                                     }
                                 }

                                item +=`</label>
                                <textarea name="reply${i}${j}" id="reply${i}${j}" class="reply"></textarea>`;
                                item += "</div>";
                            } 

                            item += `<div class="row">
                                            <label for="right${i}">To'gri javob</label>
                                            <input type="text" class="right" name="right${i}" id="right${i}" maxlength="1" minlength="1">
                                    </div>`;
                            item += '</div>';
                       }
                       item += '<input type="submit" id="quizSubmit" value="Submit">';
                       testForm.innerHTML = item;
                   }
                }
            }
    	})

    	
    </script>
</body>
</html>
