<?php 
    include "News.php";
    include "NewsController.php";
    $newss = selectAll('news');
?> 
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100;1,300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">    
<title>Новости</title>
</head>
<body>
    <header>
        <div class="btn-open-forma">
            <input id="btn_open_forma" class="btn_open_forma" type="button"  value="Добавить"></input>
        </div>
        <div class="rem"></div>
    </header>
        <div class="form-add-news" id="form-add-news">
            <div class="close-form-news" id="close-form-add-news">X</div>
            <h3>Добавление новости</h3>
            <form action="">
                <span>Заголовок</span>
                <p >
                    <input id="title" name="title" type="text" >
                </p>
                <span>Анонс</span>
                <p>
                    <input id="anons" name="anons"  type="text" >
                </p>
                <span>Текст</span>
                <p>
                    <textarea  id="text" name="text" type="text" > </textarea>
                </p>
                <span>Теги</span>
                <p>
                    <input id="tags" name="tags"  type="text" >
                </p>

                <p class="btn-add-wrapper">  
                    <input id="form_add_news" class="btn-add" type="button" name="form_add_news" value="Добавить"></input>
                </p>
            </form>
        </div>
        <h1 class="h1-news">Новости из жизни</h1>
    <div class="container-news">
         
        <?php foreach($newss as $news):?>        
            <div class="news">
            <h1 class="title"><?=$news{'title'}?></h1>
            <p class="anons"><?=$news{'anons'}?></p>
            <p class="text"><?=$news{'text'}?></p>
            <p class="date_public"><?=$news{'date_public'}?></p>
            <p class="tags"><?=$news{'tags'}?></p>

            <p ><a href="NewsTemplate.php?del_id=<?=$news['id']; ?>" id="delete_group"><input class="btn-del" type="button" value="Удалить"></input></a></p>

            </div>
        <?php endforeach; ?> 
    </div>

    <script>
    var addnews = document.getElementById('btn_open_forma');
    var closeaddnewsform = document.getElementById('close-form-add-news');

    addnews.onclick = function(e) {
        document.body.classList.add('after');
        document.getElementById("form-add-news").style.display = "flex";
        document.body.style.overflow = "hidden";

    }
    closeaddnewsform.onclick = function(e) {
        document.body.classList.remove('after');
        document.getElementById("form-add-news").style.display = "none";
        document.body.style.overflow = "auto";
    }

</script>
    <script>
    // Добавление новости
    $(document).ready(function(){
            /*ПРОВЕРЯЕМ НАЖАТА ЛИ КНОПКА ОТПРАВКИ*/
            $('#form_add_news').click(function(){
                // собираем данные с формы

                var title = $('#title').val();
                var anons = $('#anons').val();
                var text  = $('#text').val();
                var tags  = $('#tags').val();
                var form_add_news  = $('#form_add_news').val();
                if(title == "" || anons == "" || text == "" || tags == "" )
                {
                    alert ( "Не все поля заполнены" );
                }
                else{

                    // отправляем данные
                    $.ajax({
                        url: "NewsController.php", // куда отправляем
                        type: "POST", // метод передачи
                        data: { // что отправляем
                            "title":title,
                            "anons":anons,
                            "text":text,
                            "tags":tags,
                            "form_add_news":form_add_news
                        }, 
                        error:function(){$("#erconts").html("Произошла ошибка!");}, 
                        /* если произойдет ошибка в элементе с id erconts выведится сообщение*/                 
                        beforeSend: function() {                     
                            $("#erconts").html("Отправляем данные...");                   
                        },                 
                        success: function(result){                     
                            /* В случае удачной обработки и отправки выполнится следующий код*/                     
                            $('#erconts').html(result);                     
                            document.body.classList.remove('after');
                            document.getElementById("form-add-news").style.display = "none";
                            document.body.style.overflow = "auto";              
                            console.log(result); 
                            window.location = 'NewsTemplate.php';                
                        }  
                    });
                }
            });
        });
</script>
</body>
</html>
