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

            if (!empty($_GET['fname']) and !empty($_GET['testCount'])) {
            	$fname = $_GET['fname'];
            	$testCount = $_GET['testCount'];
            	if (!empty($_SESSION['id'])) {
            		$teacherId = $_SESSION['id'];
            	}else{
            		$teacherId = '0';
            	}

            	// $query = "INSERT INTO fan SET name='$fname' , testCount = '$testCount' , teacherId = '$teacherId'";
            	// mysqli_query($link,$query)or die(mysqli_error($link));
            }

    ?>
    <header>
    	<div class="container">
    		<h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et commodi saepe minus, omnis cum, culpa eveniet incidunt fugit, a fugiat eum iste fuga delectus vitae impedit doloremque distinctio non sit.</h2>
    	</div>
    </header>
    <div class="container">
        <form method="get" class="column">
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
           

            <input type="submit" value="Boshlash">
        </form>
        <br><br>
        <div class="test-form">
            <form id="testForm" method="post" class="column">
                <!-- <div class="item">
                    <label for="quiz1"><h3>Savol 1</h3></label>
                    <textarea name="quiz1" id="quiz1"></textarea>

                    <div class="row">
                        <label for="reply11">A</label>
                        <textarea name="quiz1" id="reply11" class="reply"></textarea>
                    </div>
                    
                    <div class="row">
                        <label for="reply12">B</label>
                        <textarea name="quiz1" id="reply12" class="reply"></textarea>
                    </div>

                    <div class="row">
                        <label for="reply13">C</label>
                        <textarea name="quiz1" id="reply13" class="reply"></textarea>
                    </div>

                    <div class="row">
                        <label for="reply14">D</label>
                        <textarea name="quiz1" id="reply14" class="reply"></textarea>
                    </div>
                    <div class="row">
                        <label for="right1">To'gri javob</label>
                        <input type="text" class="right" name="quoz1Right" id="right1" maxlength="1" minlength="1">
                    </div>
                 </div> -->

            </form>
        </div>
    </div>
    <script>

    	let fname = document.getElementById('fname'),
    	    testCount = document.getElementById('testCount'),
    	    error = document.getElementById('error'),
    	    error2 = document.getElementById('error2'),
            error3 = document.getElementById('error3'),
    	    submit = document.querySelector("input[type='submit']"),
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
                       let first = document.getElementById('first');
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
