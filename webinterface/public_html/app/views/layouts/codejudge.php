<!doctype html>
<html lang="ru">

<?php

use app\models\User;

if(User::isPrepod()) 
    $menu = [
        'page' => ['Сообщения','msg'],
        'page2' => ['Мои курсы','course'],
        'page3' => ['Рейтинги','task'],
        'page4' => ['Календарь','calendar'],
        'page5' => ['Мой код','code'],
        'page6' => ['Мои файлы','file'],
    ];
else 
    $menu = [
        'page' => ['Сообщения','msg'],
        'page2' => ['Мои задачи','course'],
        'page3' => ['Задания','task'],
        'page4' => ['Календарь','calendar'],
        'page5' => ['Мой код','code'],
        'page6' => ['Мои файлы','file'],
    ];
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/fonts/all.min.css">
    <link rel="stylesheet" href="/css/main.css">

    <title>CodeJudge</title>
</head>

<body>
    <div class="wrapper">

        <aside class="main-sidebar">
            <div class="sidebar">
                <ul class="navbar-nav">
                <?php foreach ($menu as $url => $item) : ?>
                    <li class="nav-item">
                        <a href="/<?= $url ?>" class="nav-link <?= $url == $route['action'] || ($url=='page2'&&$route['action']=='create') ? 'active' : '' ?>">
                            <svg class="icon"><use xlink:href="/fonts/icons.svg#<?=$item[1]?>"/></svg> <p><?= $item[0] ?></p>
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
        </aside>

        <div class="content-wrapper">

            <nav class="main-header navbar navbar-white navbar-light border-bottom-0">
                <ul class="navbar-nav">
                    <li class="nav-item d-none d-sm-inline-block"><a href="/" class="nav-link"><img src="/img/logo.svg" alt=""></a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item d-none d-sm-inline-block"><a href="#" class="nav-link">Имя Фамилия <img class="ml-2" src="/img/user.svg" alt=""></a></li>
                    <li class="nav-item"><a href="/user/logout" class="nav-link">Выйти</a></li>
                </ul>
            </nav>
            
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            <?= $content ?>
                        </div>
                    </div>
                </div>

                <div class="close-bracket">}</div>  
            </section>
            
        </div>        
    </div>

    <script src="/bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php
    foreach ($scripts as $script) {
        echo $script;
    }
?>
</body>

</html>