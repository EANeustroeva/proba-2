<?php $task = isset($_GET['id']) ? \R::load('tasks', $_GET['id']) : ['id'=>'','title'=>'']; ?>
<h4>Создание задачи</h4>
<form action="" method="POST">
    <input type="hidden" name="id" value="<?=@$task['id']?>">
<div class="p-4 border-left">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Название</label>
        <div class="col-sm-10">
            <input type="text" name="title" class="form-control" value="<?=@$task['title']?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Тип задачи</label>
        <div class="col-sm-6">
            <select class="form-control">
                <option>Арифметика</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-auto col-form-label">Язык программирования</label>
        <div class="col-sm"><select class="form-control">
                <option>С++ 11</option>
            </select></div>
        <label class="col-sm-auto col-form-label">Ограничения времени мс</label>
        <div class="col-sm"><input type="text" class="form-control" name="t" value="<?=@$task['t']?>"></div>
        <label class="col-sm-auto col-form-label">Ограничения памяти Кб</label>
        <div class="col-sm"><input type="text" class="form-control" name="m" value="<?=@$task['m']?>"></div>
    </div>

    <div class="form-group p-1 pt-4 bg-grey">
        <label>Условия задачи</label>
        <textarea class="form-control" rows="6" name="q"><?=@$task['q']?></textarea>
    </div>
    <div class="form-group p-1 pt-4 bg-grey">
        <label>Постановка задачи</label>
        <textarea class="form-control" rows="6" name="a"><?=@$task['a']?></textarea>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Тип тестирования</label>
        <div class="col-sm-6">
            <select class="form-control">
                <option>Тестовые примеры</option>
            </select>
        </div>
    </div>

    <p><a style="color: #019877;" href="#">Загрузить тесты</a> или <strong style="color: #019877;">ввести ниже</strong></p>
    <div class="row text-sm">
        <div class="col-3">
            <label>input</label>
            <textarea class="form-control" rows="6" name="input"><?=@$task['input']?></textarea>
        </div>
        <div class="col-3">
            <label>output</label>
            <textarea class="form-control" rows="6" name="output"><?=@$task['output']?></textarea>
        </div>
    </div>
    <a href="#">Добавить тест</a>
    <div class="mt-3 text-right">
        <a href="#" class="btn btn-success">Сохранить как черновик</a>
        <button class="btn btn-success">Сохранить</button>
    </div>
</div>
</form>