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

            if (!empty($_POST['fname']) and !empty($_POST['testCount'])) {
            	$fname = $_POST['fname'];
            	$testCount = $_POST['testCount'];
            	if (!empty($_SESSION['id'])) {
            		$teacherId = $_SESSION['id'];
            	}else{
            		$teacherId = 'anonim';
            	}

            	$query = "INSERT INTO fan SET name='$fname' , testCount = '$testCount' , teacherId = '$teacherId'";
            	mysqli_query($link,$query)or die(mysqli_error($link));

            	headerFun('inputTest.php');



            }else{
            	echo "string";
            }

    ?>
    <header>
    	<div class="container">
    		<h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et commodi saepe minus, omnis cum, culpa eveniet incidunt fugit, a fugiat eum iste fuga delectus vitae impedit doloremque distinctio non sit.</h2>
    	</div>
    </header>
    <div class="container">
        <form action="" method="post" class="column">
        	<h2>Test kiritish</h2>
            <label for="fname">Fan nomi</label>
            <input type="text" name="fname" id="fname" placeholder="Fan nomi" maxlength="50">
            <div id="error"></div>

            <label for="testCount">testlar soni</label>
            <input type="number" name="testCount" id="testCount" placeholder="Testlar soni" maxlength="50">
            <div id="error2"></div>

            <input type="submit" value="Boshlash">
        </form>
    </div>

    <script>
    	let fname = document.getElementById('fname'),
    	    testCount = document.getElementById('testCount'),
    	    error = document.getElementById('error'),
    	    error2 = document.getElementById('error2'),
    	    submit = document.querySelector("input[type='submit']");
    	submit.addEventListener('click',function(e){
    		if(fname.value.length<2 ){
    			e.preventDefault();
    			error.innerHTML = "Xatolik: Fan nomini to'liq kiriting";
    		}
    		if(Number(testCount.value)<2 ){
    			e.preventDefault();
    			error2.innerHTML = "Xatolik: test soni kam";
    		}
    	})

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
    </script>
</body>
</html>
