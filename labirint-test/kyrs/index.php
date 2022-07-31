<!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9233203abc.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Курс валют</title>

</head>
<body>
<?php require_once("data.php");?>   
<div class="container">
    <div class="weather">
        <div class="weather-block">
            <div class="p-content">
                <span><?=$data_weather["location"]["name"];?></span><span><?=$data_weather["location"]["localtime"];?></span>
            </div>
            <div class="p-content">
                <span class="p-content-title">Температура</span><span><?=$data_weather["current"]["temp_c"];?></span>
            </div>
            <div class="p-content">
                <span class="p-content-title">Ощущается как</span><span><?=$data_weather["current"]["feelslike_c"];?></span>
            </div>
            <div class="p-content p-content-center">
                <span class=""><?=$data_weather["current"]["condition"]["text"];?></span>
            </div>
        </div>
        <div class="btn-refresh" id="btn-refreshh">
        <i class="fa fa-refresh" aria-hidden="true" id="rotate"></i>
        </div>
    </div>
    <div class="kyrs">
        <div class="valuta">
            <p class=""> 
                <?php 
                    echo $data["Valute"][10]["Nominal"];
                    echo " ";
                    echo $data["Valute"][10]["CharCode"];
                    echo " = ";
                    $summa =  $data["Valute"][10]["Value"];
                    echo $summa;
                    echo " RUB.";
                ?>
            </p>
            <span class="name-valuta"><?=$data["Valute"][10]["Name"];?></span>
        </div>
        <div class="valuta">
            <p class=""> 
                <?php 
                    echo $data["Valute"][11]["Nominal"];
                    echo " ";
                    echo $data["Valute"][11]["CharCode"];
                    echo " = ";
                    // $summa =  floor(($data["Valute"][11]["Value"])/100)*100;
                    $summa =  $data["Valute"][11]["Value"];
                    //$summa = number_format($summa, 2, '.', ',');
                    echo $summa;
                    echo " RUB.";
                ?>
            </p>
            <span class="name-valuta"><?=$data["Valute"][11]["Name"];?></span>
        </div>
        <div class="valuta">
            <p class=""> 
                <?php 
                    echo ($data["Valute"][29]["Nominal"])/10;
                    echo " ";
                    echo $data["Valute"][29]["CharCode"];
                    echo " = ";
                    $summa =  ($data["Valute"][29]["Value"])/10;
                    echo $summa;
                    echo " RUB.";
                ?>
            </p>
            <span class="name-valuta"><?=$data["Valute"][29]["Name"];?></span>
        </div>
        <div class="valuta">
            <p class=""> 
                <?php 
                    echo ($data["Valute"][33]["Nominal"])/100;
                    echo " ";
                    echo $data["Valute"][33]["CharCode"];
                    echo " = ";
                    $summa =  ($data["Valute"][33]["Value"])/100;
                    echo $summa;
                    echo " RUB.";
                ?>
            </p>
            <span class="name-valuta"><?=$data["Valute"][33]["Name"];?></span>
        </div>
        <div class="valuta">
            <p class=""> 
                <?php 
                    echo $data["Valute"][14]["Nominal"];
                    echo " ";
                    echo $data["Valute"][14]["CharCode"];
                    echo " = ";
                    $summa =  $data["Valute"][14]["Value"];
                    echo $summa;
                    echo " RUB.";
                ?>
            </p>
            <span class="name-valuta"><?=$data["Valute"][14]["Name"];?></span>
        </div>
    </div>
</div>


</body>
<script>
var rotateblock = document.getElementById('btn-refreshh');
rotateblock.onclick = function(e){
    $.ajax({
    type: "POST",
    url: "index.php",
    success: function() {   
        document.getElementById('rotate').classList.toggle('rot');
        location.reload();  
    }
});

};
</script>
</html>



<?php

?>