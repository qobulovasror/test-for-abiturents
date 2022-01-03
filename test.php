<?php 
    function headerFun($link){
            header("Location:$link");
    }
    require('script/main.php');
    session_start();

    if(empty($_SESSION['testFan'])){
        headerFun('index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test ishla</title>
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
                    <div id="allQuiz">10</div>
                </div>
                <!-- vaqt - bajarilish vaqti va umumiy vaqt -->
                <div class="time">
                    <div class="column">
                        <div id="geniralTime">20:00</div>
                        <div id="quizTime">00:29</div>
                    </div>
                </div>
                <!-- fan nomi -->
                <div class="scienceName">
                    <h2>Fan nomi: <span id="fname">Matimatika</span></h2>
                </div>
        </div>
    </header>
    <div class="quiz">
        <div class="container">
            <div class="quiz-box-border">
                <div class="quiz-box">
                    <div class="column quiz-box-scrol">
                        <!-- savol uchun  -->
                        <div class="savol">
                            <p id="quiz">Quyidagi misol javobini toping. </p>
                            <p id="quiz2">4a^2+2a+25=0</p>
                        </div>
                        <!-- javoblar uchun -->
                        <div id="repys" class="column">
                            <div class="row around">
                                <div class="varia none">
                                    <div id="variant1">x1=22 , x2=15</div>
                                </div>
                                <div class="varia none">
                                    <div id="variant2">x1=23 , x2=14</div>
                                </div>
                            </div>
                            <div class="row around">
                                <div class="varia none">
                                    <div id="variant3">x1=24 , x2=14</div>
                                </div>
                                <div class="varia none">
                                    <div id="variant4">x1=25 , x2=14</div>
                                </div>
                            </div>
                            <div class="row around">
                                <div class="varia none">
                                    <div id="variant5">x1=26 , x2=14</div>
                                </div>
                                <div class="varia none">
                                    <div id="variant6">x1=26 , x2=14</div>
                                </div>
                            </div>
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
            </div>
        </div>
    </div>
    <script src="script/script.js"></script>  
    <script>

        let quizArray = [];
        let quiz1Array = [];
        for(let i=0; i<10; i++){
            quiz1Array.push(
            <?php 

                $fanid = $_SESSION['fanId'];
                $query = "SELECT * FROM tests WHERE id=$fanid ORDER BY testId";
                $result = mysqli_query($link,$query) or die(mysqli_error($link));

                for($date[] ; $row = mysqli_fetch_accos($result); $data[]=$row );
                $content = '';
                foreach($data as $value){
                    $content.=
                }
             ?>

            );
        }
    </script>  
</body>
</html>