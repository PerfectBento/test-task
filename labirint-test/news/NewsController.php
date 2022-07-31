<?php 
 require_once("News.php");

/*ПОМЕЩАЕМ ДАННЫЕ ИЗ ПОЛЕЙ В ПЕРЕМЕННЫЕ*/



// Код для формы создания новости
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_add_news'])){
    $title = trim($_POST["title"]);
    $anons = trim($_POST["anons"]);
    $text = trim($_POST["text"]);
    $tags = trim($_POST["tags"]);

    if($title === '' || $anons === '' || $text === '' || $tags === ''){
        $errMsg = "Не все поля заполнены!";
    }else{
        $existence = selectOne('news', ['title' => $title]);
        if($existence['news'] === $title){
            $errMsg = "Такой заголовок уже есть";
        }else{
            $news = [
                'title' => $title,
                'anons' => $anons,
                'text' => $text,
                'tags' => $tags
            ];
            $id = insert('news', $news);
            $news = selectOne('news', ['id' => $id] );
        }
    }
}else{
    echo $title, $anons, $text,$tags;
}

// Удаление записи
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    delete('news', $id);
}














?>