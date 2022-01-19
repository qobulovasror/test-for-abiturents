<?php 
    function headerFun($link){
            header("Location:$link");
    }
    require('script/main.php');
    session_start();

    if(empty($_SESSION['testFan'])){
        headerFun('index.php');
    }

    $fanid = $_SESSION['testFan'];
           
    $query = "SELECT * FROM tests WHERE fan='$fanid' ORDER BY testId";
    $result = mysqli_query($link,$query) or die(mysqli_error($link));
    for($data = []; $row = mysqli_fetch_assoc( $result); $data[] = $row); 
    $countr = 0;
    foreach ($data as $value) {
        $countr++;
    } 

    if(!empty($_GET['finish'])){

    }

    if (!empty($_POST)) {
        $userid = $_SESSION['id'];
        $fanid1 = $fanid;
        $testCount1 = $countr;
        $wro = $_POST['wrong'];
        $corr = $_POST['correct'];
        $query = "INSERT INTO result SET userId='$userid',fanName='$fanid1',testCount='$testCount1',wrong='$wro',correct='$corr' ";
        mysqli_query($link,$query);
        $_SESSION['testFan'] = null;
        headerFun('index.php');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test ishlash</title>
    <link rel="stylesheet" href="css/col.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header> 
        <div class="container">
                <!-- nechta savol borligini bilish uchun progress -->
                <div class="progres">
                    <div id="progresBack"></div>
                </div>
                <!-- savollar soni va nechinchisi bajarilishi -->
                <div class="tablo row">
                    <div id="future">1</div>/
                    <div id="allQuiz">0</div>
                </div>
                <!-- vaqt - bajarilish vaqti va umumiy vaqt -->
                <div class="time">
                    <div class="column">
                        <div id="geniralTime">00:00</div>
                        <div id="quizTime">00:00</div>
                    </div>
                </div>
                <!-- fan nomi -->
                <div class="scienceName">
                    <h2>Fan nomi: <span id="fname"><?=$fanid?></span></h2>
                </div>
        </div>
    </header>
    <div class="quiz">
        <div class="start column" id="boshlash">
            <h2>Fan nomi: <span id="fname"><?=$fanid?></span></h2>
            <h2>Test soni: <span id="fname"><?=$countr?></span></h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Possimus, nam. Deserunt, incidunt laborum quo iste?</p>
            <div class="btn" onclick="start()">Boshlash</div>
        </div>
        <div class="startBack"></div>
        <div class="stop column" id="tugatish">
            <table>
                <tr>
                    <th>Fan nomi: </th>
                    <td><span><?=$fanid?></span></td>
                </tr>
                <tr>
                    <th>Test soni: </th>
                    <td><span id="fname"><?=$countr?></span></td>
                </tr>
                <tr>
                    <th>To'g'ri javob: </th>
                    <td><span id="resoultCorrect">0</span></td>
                </tr>
                <tr>
                    <th>Noto'g'ri javob: </th>
                    <td><span id="resultWrong">0</span></td>
                </tr>
            </table>
             <form action="test.php" method="post">
                 <input type="text" id="resWrong" name="wrong">
                 <input type="text" id="resCorr" name="correct">
                 <input class="btn" type="submit" value="Yakunlash">
             </form>
        </div>
        <div id="error">Variant tanlang</div>
        <div class="container">
            <div class="quiz-box-border" >
                <div class="quiz-box">
                    <div class="column quiz-box-scrol">
                        <!-- savol uchun  -->
                        <div class="savol">
                            <p id="quiz">Savol </p>
                            <!-- <p id="quiz2">4a^2+2a+25=0</p> -->
                        </div>
                        <!-- javoblar uchun -->
                        <div id="repys" class="column">
                            <!-- <div class="row around"> -->
                                <div class="varia none">
                                    <div id="variant1" onclick="varTarget(this)">javob 1</div>
                                </div>
                                <div class="varia none">
                                    <div id="variant2" onclick="varTarget(this)">javob 2</div>
                                </div>
                            <!-- </div> -->
                            <!-- <div class="row around"> -->
                                <div class="varia none">
                                    <div id="variant3" onclick="varTarget(this)">javob 3</div>
                                </div>
                                <div class="varia none">
                                    <div id="variant4" onclick="varTarget(this)">javob 4</div>
                                </div>
                            <!-- </div> -->
                        </div>
                        <!-- info: nima uchu notug'ri ekanligi -->
                        <div id="aboutQuiz">
                            <span></span>
                        </div>
                        <!-- tugmalar : tassiqlash, keyingi , tashlab ketish-->
                        <div class="buttons row">
                            <button id="leave">Tashlab ketish</button>
                            <button id="next">Tanlash | Keyingisi</button>
                        </div>
                    </div>
                </div>
                <div class="resoultsQuiz column">
                    <div class="column">
                        <h3>To'g'ri javob</h3>
                        <h3 id="correct">0</h3>
                    </div>
                    <div class="column">
                        <h3>Noto'g'ri javob</h3>
                        <h3 id="wrong">0</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
     
    <script>
        
        // baza ma'lumotlarini map  orqali olish
        let Arr = [];
        let map1;
            <?php 
                foreach($data as $value){
                    echo "map1 = new Map(";
                    echo "[['savol','".$value['savol']."'],";
                    echo "['javob1','".$value['javob1']."'],";
                    echo "['javob2','".$value['javob2']."'],";
                    echo "['javob3','".$value['javob3']."'],";
                    echo "['javob4','".$value['javob4']."'],";
                    echo "['tjavob','".$value['tjavob']."']]";
                    echo ");";
                    echo "Arr.push(map1);";
                }
             ?>

        // vaqtni yuritish
        let allQuiz = document.getElementById("allQuiz"),
            quizTime = document.getElementById("quizTime"),
            geniralTime = document.getElementById("geniralTime");
        allQuiz.innerHTML = Arr.length;
        quizTime.innerHTML = "00:00";
        geniralTime.innerHTML = "cheksiz";
        let timeinter = false;
        function quizTimeRun(quizTime){
            let a1=0,a2=0,time="";
            setInterval(function(){
                if (timeinter == true) {
                    if(a1<10){
                    time = '0'+a1;
                    }else{
                        time = a1;
                    }
                    time += ':';
                    if(a2<10){
                        time += '0'+a2;
                    }else{
                        time += a2;
                    }
                    quizTime.innerHTML = time;
                    if(a2<59){
                        ++a2;   
                    }
                    else{
                        a2=0;
                        ++a1
                    }
                }
            },1000);
        }

        // testni boshlash window
        let boshlash = document.getElementById("boshlash");
        let startBack = document.querySelector('.startBack');
        let future = document.getElementById('future');
        let resoultCorrect = document.getElementById('resoultCorrect'),
            resultWrong = document.getElementById('resultWrong');
        function start(){
            startBack.style.display = "none";
            boshlash.style.display = "none";
            timeinter = true;
            quizTimeRun(quizTime);
            nextQuiz(Arr);
        }
        
        // testni va javoblarni joylash 
        let quiz = document.getElementById("quiz"),
            variant1 = document.getElementById("variant1"),
            variant2 = document.getElementById("variant2"),
            variant3 = document.getElementById("variant3"),
            variant4 = document.getElementById("variant4"),
            leave = document.getElementById("leave"),
            next = document.getElementById("next"),
            error = document.getElementById('error'),
            progresBack = document.getElementById('progresBack'),
            proWidth = 1;
        let count1=0,nMap;
        let futureCount = 1;
        next.addEventListener('click',nextTarget);
        function nextTarget(){
            if(tarEle != '') {
                if (nMap.get('tjavob')==tarEle) {
                    correctCount++;
                    correct.innerHTML = correctCount ;
                    resoultCorrect.innerHTML = correctCount;
                    tarEle = '';
                }else{
                    wrongCount++;
                    wrong1.innerHTML = wrongCount;
                    resultWrong.innerHTML = wrongCount;
                    tarEle = '';
                }
                proWidth = ((futureCount-1) / Arr.length)*100   ;
                progresBack.style.width = `${proWidth}%`;

                nextQuiz(Arr);

                variant1.parentNode.style.background = "transparent";
                variant2.parentNode.style.background = "transparent";
                variant3.parentNode.style.background = "transparent";
                variant4.parentNode.style.background = "transparent";

            }else {
                if (true) {}
                errorAlert('Biror variant tanlang');
            }
            
        }
        function errorAlert(ele){
            error.innerHTML = ele;
            error.style.display = 'block';
            setTimeout(function(){
               error.style.display = 'none'; 
            },4000);
        }
        error.addEventListener('click',function(){
            error.style.display = 'none'; 
        });

        // testni tashlab ketish
        leave.addEventListener('click',function(){
                wrongCount++;
                wrong1.innerHTML = wrongCount;
                tarEle = '';
                
                proWidth = ((futureCount-1) / Arr.length)*100   ;
                progresBack.style.width = `${proWidth}%`;

                nextQuiz(Arr);

                variant1.parentNode.style.background = "transparent";
                variant2.parentNode.style.background = "transparent";
                variant3.parentNode.style.background = "transparent";
                variant4.parentNode.style.background = "transparent";
        })


        // javoblarni olish
        let tarEle = '',
            correct = document.getElementById('correct'),
            correctCount = 0 ,
            wrong1 = document.getElementById('wrong'),
            wrongCount = 0;
        function varTarget(element){
            if(element.id == 'variant1'){
                tarEle = 1;
            }else{
                if(element.id == 'variant2'){
                    tarEle = 2;
                }else{
                    if(element.id == 'variant3'){
                        tarEle = 3;
                    }else{
                        tarEle = 4;
                    }
                }
            }

            variant1.parentNode.style.background = "transparent";
            variant2.parentNode.style.background = "transparent";
            variant3.parentNode.style.background = "transparent";
            variant4.parentNode.style.background = "transparent";

            element.parentNode.style.background = "green";
        }

        // testni aylantirish ( joylab borish)
        function nextQuiz(Arr){
            if(count1 != Arr.length){
                future.innerHTML = futureCount;

                futureCount++;
                nMap =  Arr[count1];
                quiz.innerHTML = nMap.get('savol');
                variant1.innerHTML = nMap.get('javob1');
                variant2.innerHTML = nMap.get('javob2');
                if(nMap.get('javob3')!=""){
                    variant3.innerHTML = nMap.get('javob3');
                }else{
                    variant3.style.display = "none";
                }
                if(nMap.get('javob4')!=""){
                    variant4.innerHTML = nMap.get('javob4');
                }else{
                    variant4.style.display = "none";
                }
                count1++;

            }else{
                finish();
            }
        }
        let resWrong = document.getElementById('resWrong'),
            resCorr = document.getElementById('resCorr');
        // testni yakunlash
        let tugatish = document.getElementById("tugatish");
        function finish(){
            resWrong.value = resultWrong.innerHTML;
            resCorr.value =  resoultCorrect.innerHTML;
            tugatish.style.display = "block";
            startBack.style.display = "block";
            timeinter = false;
        }



        
    </script>  
    <script src="script/script.js"></script> 
</body>
</html>