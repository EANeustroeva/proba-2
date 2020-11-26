<?php if(\app\models\User::isPrepod()): ?>

    <?php
    $tasks = \R::getAll('select * from tasks');
    ?>
    
    <div class="clearfix">
        <h4 class="float-left">Мои задачи</h4>
        <a href="/edit" class="btn btn-success d-inline-block float-right">Создать</a>
    </div>
    <div class="p-4 border-left">
        <?php foreach ($tasks as $task): ?>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-auto"><svg class="icon" style="width:66px; height:70px"><use xlink:href="/fonts/icons.svg#inf"/></svg> </div>
                    <div class="col"><a data-toggle="collapse" href="#collapse<?=$task['id']?>" role="button" aria-expanded="false" class="stretched-link"><?=htmlentities($task['title'])?></a></div>
                    <div class="col text-right"><a href="#" class="btn btn-success">Назначить</a></div>
                    <div class="col text-left"><a href="/edit?id=<?=$task['id']?>" class="btn btn-success">Редактировать</a></div>
                    <div class="col-auto"><div>Решивших задачу: <b><?=$task['r']?></b></div></div>
                    <div class="col-auto"><div>Попыток: <b><?=$task['p']?></b></div></div>
                    <div class="col-auto"><div>Ошибок: <b><?=$task['o']?></b></div></div>
                </div>
                <div class="collapse" id="collapse<?=$task['id']?>">
                    <div class="row">

                    <div class="p-4 border-left">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Название</label>
                            <div class="col-sm-10">
                                <input readonly type="text" name="title" class="form-control" value="<?=@$task['title']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Тип задачи</label>
                            <div class="col-sm-6">
                                <select disabled class="form-control">
                                    <option>Арифметика</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-auto col-form-label">Язык программирования</label>
                            <div class="col-sm"><select disabled class="form-control">
                                    <option>С++ 11</option>
                                </select></div>
                            <label class="col-sm-auto col-form-label">Ограничения времени мс</label>
                            <div class="col-sm"><input readonly type="text" class="form-control" value="<?=@$task['t']?>"></div>
                            <label class="col-sm-auto col-form-label">Ограничения памяти Кб</label>
                            <div class="col-sm"><input readonly type="text" class="form-control" value="<?=@$task['m']?>"></div>
                        </div>

                        <div class="form-group p-1 pt-4 bg-grey">
                            <b>Условия задачи</b>
                            <div><?=@$task['q']?></div>
                        </div>
                        <div class="form-group p-1 pt-4 bg-grey">
                            <b>Постановка задачи</b>
                            <div><?=@$task['a']?></div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Тип тестирования</label>
                            <div class="col-sm-6">
                                <select disabled class="form-control">
                                    <option>Тестовые примеры</option>
                                </select>
                            </div>
                        </div>

                        <div class="row text-sm">
                            <div class="col-3">
                                <label>input</label>
                                <textarea readonly class="form-control" rows="6"><?=@$task['input']?></textarea>
                            </div>
                            <div class="col-3">
                                <label>output</label>
                                <textarea readonly class="form-control" rows="6"><?=@$task['output']?></textarea>
                            </div>
                        </div>
                    </div>


                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <style>
.card:hover {
    color: #606060;
    background: #CCEAE4;
}
.stretched-link:hover {
    color: #606060;
}
    </style>

<?php else: ?>
Мои задачи //Информатика

<div class="clearfix"></div><br><br><br>
<!-- <div>main ( ) {</div> -->
    <div class="row">
<div class="col-3 card float-left mr-4" style="width: 200px;">
    <div class="card-body text-center d-flex flex-column align-items-center">
        <svg class="icon" style="width:66px; height:70px"><use xlink:href="/fonts/icons.svg#inf"/></svg> 
        <div class="clearfix"></div>
        <a href="#" class="stretched-link mt-3">Информатика</a>
    </div>
</div>

<div class="col-3 card float-left mr-4" style="width: 200px;">
    <div class="card-body text-center d-flex flex-column align-items-center">
        <svg class="icon" style="width:70px; height:70px"><use xlink:href="/fonts/icons.svg#www"/></svg> 
        <div class="clearfix"></div>
        <a href="#" class="stretched-link mt-3">Web программирование</a>
    </div>
</div>

<div class="col-3 card float-left mr-4" style="width: 200px;">
    <div class="card-body text-center d-flex flex-column align-items-center">
        <svg class="icon" style="width:66px; height:70px"><use xlink:href="/fonts/icons.svg#robo"/></svg> 
        <div class="clearfix"></div>
        <a href="#" class="stretched-link mt-3">Робототехника</a>
    </div>
</div>
<!-- <span>}</span> -->
</div>


<div class="clearfix"></div><br><br><br>

<div class="tree">
<ul>
    <li>
        <span><a data-toggle="collapse" href="#Tasks" aria-expanded="true" aria-controls="Tasks">Мои задачи</a></span>
        <div id="Tasks" class="collapse show">
            <ul>
                <li>
                    <span>
                        <a data-toggle="collapse" href="#Inf" aria-expanded="true" aria-controls="Inf">Информатика</a>
                    </span>
                    <ul>
                        <div id="Inf" class="collapse">
                            <li><span><a href="#!">1 Введение в курс</a></span></li>
                            <li>
                                <span><a data-toggle="collapse" href="#Cpp" aria-expanded="true" aria-controls="Cpp">2 Основы синтаксиса языка С++</a></span>
                                <ul>
                                    <div id="Cpp" class="collapse show">
                                        <li><span><a href="#!">2.1. Объявление переменных</a></span></li>
                                        <li><span><a href="#!">2.2. Условные операторы</a></span></li>
                                        <li><span><a href="#!">2.3. Операторы ветвления</a></span></li>
                                    </div>
                                </ul>
                            </li>
                        </div>
                    </ul>
                </li>
                <li><span><a data-toggle="collapse" href="#Web" aria-expanded="true" aria-controls="Web">Web программирование</a></span></li>
                <li><span><a data-toggle="collapse" href="#Robo" aria-expanded="true" aria-controls="Robo">Робототехника</a></span></li>
            </ul>
        </div>
    </li>
</ul>
</div>

<div class="tree1" style="display: none;">
    <ul>
        <li>
            <span>
                <a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#Web" aria-expanded="true" aria-controls="Web">
                    <i class="collapsed"><i class="fas fa-folder"></i></i>
                    <i class="expanded"><i class="far fa-folder-open"></i></i> Мои задачи</a>
            </span>
            <div id="Web" class="collapse show">
                <ul>
                    <li><span><i class="far fa-file"></i><a href="#!"> Link 1</a></span></li>
                    <li>
                        <span>
                            <a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#page1" aria-expanded="false" aria-controls="page1">
                                <i class="collapsed"><i class="fas fa-folder"></i></i>
                                <i class="expanded"><i class="far fa-folder-open"></i></i> Page 1</a>
                        </span>
                        <ul>
                            <div id="page1" class="collapse">
                                <li><span><i class="far fa-file"></i><a href="#!"> Link 1</a></span></li>
                                <li><span><i class="far fa-file"></i><a href="#!"> Link 2</a></span></li>
                                <li><span><i class="far fa-file"></i><a href="#!"> Link 3</a></span></li>
                                <li><span><i class="far fa-file"></i><a href="#!"> Link 4</a></span></li>
                            </div>
                        </ul>
                    </li>


                    <li>
                        <span>
                            <a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#Page2" aria-expanded="false" aria-controls="Page2">
                                <i class="collapsed"><i class="fas fa-folder"></i></i>
                                <i class="expanded"><i class="far fa-folder-open"></i></i> Page 2</a>
                        </span>
                        <ul>
                            <div id="Page2" class="collapse">
                                <li>
                                    <span>
                                        <a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#folder1" aria-expanded="false" aria-controls="folder1">
                                            <i class="collapsed"><i class="fas fa-folder"></i></i>
                                            <i class="expanded"><i class="far fa-folder-open"></i></i> Folder 1</a>
                                    </span>
                                    <ul>
                                        <div id="folder1" class="collapse">
                                            <li><span><i class="far fa-file"></i><a href="#!"> Link 1</a></span></li>
                                            <li><span><i class="far fa-file"></i><a href="#!"> Link 2</a></span></li>
                                            <li><span><i class="far fa-file"></i><a href="#!"> Link 3</a></span> <a href="#!">& More Link</a></li>
                                        </div>
                                    </ul>
                                </li>

                                <li>
                                    <span>
                                        <a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#folder2" aria-expanded="false" aria-controls="folder2">
                                            <i class="collapsed"><i class="fas fa-folder"></i></i>
                                            <i class="expanded"><i class="far fa-folder-open"></i></i> Folder 2</a>
                                    </span>
                                    <ul>
                                        <div id="folder2" class="collapse">
                                            <li><span><i class="far fa-file"></i><a href="#!"> Link 1</a></span></li>
                                            <li><span><i class="far fa-file"></i><a href="#!"> Link 2</a></span></li>
                                            <li><span><i class="far fa-file"></i><a href="#!"> Link 3</a></span> <a href="#!">& More Link</a></li>
                                        </div>
                                    </ul>
                                </li>

                                <li>
                                    <span>
                                        <a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#folder3" aria-expanded="false" aria-controls="folder3">
                                            <i class="collapsed"><i class="fas fa-folder"></i></i>
                                            <i class="expanded"><i class="far fa-folder-open"></i></i> Folder 3</a>
                                    </span>
                                    <ul>
                                        <div id="folder3" class="collapse">
                                            <li><span><i class="far fa-file"></i><a href="#!"> Link</a></span> <a href="#!">& More Link</a></li>
                                        </div>
                                    </ul>
                                </li>

                                <li><span><i class="far fa-file"></i><a href="#!"> Link</a></span></li>

                            </div>
                        </ul>
                    </li>


                    <li><span><i class="far fa-file"></i><a href="#!"> Link 2</a></span></li>



                </ul>
            </div>
        </li>
    </ul>

</div>


Видеолекция
Вебинар
Задание 1
Задание 2
Тест для самопроверки

Мои задачи / Информатика / 2. Основы синтаксиса языка С++ / 2.2. Операторы ветвления / Видеолекция

Видеолекция
Вебинар
Задание 1
Задание 2
Тест для самопроверки

Материалы к лекции:
Конспект
Презентация

Ссылки на дополнительные материалы:
Операторы С++ (статья)
Исходные файлы примеров (гитхаб)

Рекоммендуемые материалы:

Операторы С++ (статья)

Отправить задание
Сохранить
Загрузить из файла

Write the fib method to return the N’th term. We start counting from:
fib(0) -0
fib(1) = 1

Examples
fib(0) -0
fib(1) = 1


Мои задания

Назначенные

Информатика /Задание 1
Срок заканчивается 2 ноября 2020, 15:00

Информатика /Задание 2
Срок заканчивается 2 ноября 2020, 15:00

Робототехника /Вебинар
Состоится 11 ноября 2020, 12:30

Web программирование /Задание 3
Срок заканчивается 11 ноября 2020, 13:00

Выполненные
<?php endif; ?>