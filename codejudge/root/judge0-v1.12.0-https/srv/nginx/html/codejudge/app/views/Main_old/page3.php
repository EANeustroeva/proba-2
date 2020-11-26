<div class="mb-3"><a href="#"><i class="fa fa-download"></i> Загрузить видео</a></div>
<div class="mb-3">
    <a class="btn btn-raised bg-purple mr-3" style="color: #fff!important; border: 1px solid red" href="#" role="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-link"></i> Добавить по ссылке</a>
    <a class="btn btn-raised btn-secondary mr-3"href="?">Анализ текста</a>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Выберите видео:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <div><a class="mb-3" href="?id=5tcs2qXP3Pg">https://www.youtube.com/watch?v=5tcs2qXP3Pg</a></div> -->
        <!-- <div><a class="mb-3" href="?id=LjyDh61KV5Q">https://www.youtube.com/watch?v=LjyDh61KV5Q</a></div> -->
        <div><a class="mb-3" href="?id=DyGLE0usN_I">https://www.youtube.com/watch?v=DyGLE0usN_I</a></div>
        <div><a class="mb-3" href="?id=zIwLWfaAg-8">https://www.youtube.com/watch?v=zIwLWfaAg-8</a></div>
      </div>
    </div>
  </div>
</div>
<!-- <form class="bd-search d-flex align-items-center">
    <span class="algolia-autocomplete" style="position: relative; display: inline-block; direction: ltr;"><span class="bmd-form-group">
            <input type="search" class="form-control ds-input" name="id" placeholder="Embed id..." aria-label="Search for..." autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0" dir="auto" style="position: relative; vertical-align: top;">
        </span>
        <pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: normal; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><span class="ds-dropdown-menu" role="listbox" id="algolia-autocomplete-listbox-0" style="position: absolute; top: 100%; z-index: 100; left: 0px; right: auto; display: none;">
            <div class="ds-dataset-1"></div>
        </span></span>
    <button class="btn-link bd-search-docs-toggle d-md-none p-0 ml-3" type="button" data-toggle="collapse" data-target="#bd-docs-nav" aria-controls="bd-docs-nav" aria-expanded="false" aria-label="Toggle docs avigation">
        <svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false">
            <title>Menu</title>
            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"></path>
        </svg>

    </button>
</form> -->

<a class="btn btn-raised btn-primary btn-sm mt-auto mb-3" href="?id=5tcs2qXP3Pg">video 1</a>
<a class="btn btn-raised btn-primary btn-sm mt-auto mb-3" href="?id=LjyDh61KV5Q">video 2</a>
<!-- <a class="btn btn-raised btn-primary btn-sm mt-auto mb-3" href="?id=DyGLE0usN_I">video 3</a> -->
<!-- <a class="btn btn-raised btn-primary btn-sm mt-auto mb-3" href="?id=zIwLWfaAg-8">video 4</a> -->

<?php if (!empty($_SESSION['buttons'])):?>
<?php foreach ($_SESSION['buttons'] as $button):?>
    <?php if (in_array($button,['5tcs2qXP3Pg','LjyDh61KV5Q'])) continue; ?>
    <a class="btn btn-raised btn-primary btn-sm mt-auto mb-3" href="?id=<?=$button?>">video <?=$button?></a>
<?php endforeach; ?>   
<?php endif; ?>   

<?php if (!isset($embed_id)):?>

    <?php if (!isset($_POST['text'])):?>
        <h4>Или введите свой текст:</h4>
        <form method="POST">
            <div class="form-group bmd-form-group">
                <textarea class="form-control" name="text" rows="3"></textarea>
            </div>
            <button class="btn btn-default btn-raised" type="submit">Отправить</button>
        </form>
    <?php endif; ?>

    <?php if (isset($_POST['text'])):?>
        <div class="row no-gutters">
            <div class="col bg-light p-3">
                <h3 class="border-bottom">Text</h3>
                <div class="small"><?= nl2br($file_content) ?></div>
            </div>
            <div class="col bg-dark p-3">
                <h3 class="border-bottom">JSON</h3>
                <pre class="small text-white"><?= json_encode($res, JSON_PRETTY_PRINT) ?></pre>
            </div>
        </div>
    <?php endif; ?>


<?php endif; ?>
    

<?php if (isset($embed_id)) : ?>
    <div class="row">
        <div class="col">
            <div class="embed-responsive embed-responsive-16by9 mb-4">
                <iframe id="video" class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/<?php echo $embed_id ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="emoj mb-3 row">
                <div class="col"><a href="#"><img src="/img/grinning 1.svg" alt=""><span class="text-nowrap">Отлично!</span></a></div>
                <div class="col"><a href="#"><img src="/img/smile 1.svg" alt=""><span class="text-nowrap">Хорошо!</span></a></div>
                <div class="col"><a href="#"><img src="/img/cool 1.svg" alt=""><span class="text-nowrap">Все понял!</span></a></div>
                <div class="col"><a href="#"><img src="/img/neutral 1.svg" alt=""><span class="text-nowrap">Что?</span></a></div>
                <div class="col"><a href="#"><img src="/img/rolling-eyes 1.svg" alt=""><span class="text-nowrap">Хмм...</span></a></div>
                <div class="col"><a href="#"><img src="/img/anger 1.svg" alt=""><span class="text-nowrap">Плохо!</span></a></div>
                <div class="col"><a href="#"><img src="/img/confused 1.svg" alt=""><span class="text-nowrap">Ужасно!</span></a></div>
                <div class="col"><a href="#"><img src="/img/crying 1.svg" alt=""><span>Ничего непонимаю!</span></a></div>
            </div>
        </div>
        <div class="col-4">
            <?php $this->getPart('inc/widgets/chat') ?>

            <div class="mt-3" id="myCanvasContainer">
                <canvas height="300" id="myCanvas" style="width: 80%;">
                    <p>Anything in here will be replaced on browsers that support the canvas element</p>
                    <ul>
                        <?php foreach ($tags as $item) : ?>
                            <li><a class="bg-primary py-2" href="#"><?= $item ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </canvas>
            </div>
        </div>
    </div>

    <div class="mb-3 text-center">
        <a class="btn btn-raised btn-primary btn-lg" role="button" data-toggle="collapse" data-target="#collapse-one" aria-expanded="false" aria-controls="collapse-one">Показать работу нейросети</a>
    </div>

    <div class="collapse" id="collapse-one">
        <div class="row no-gutters">
            <div class="col bg-light p-3">
                <h3 class="border-bottom">Subs</h3>
                <div class="small"><?= nl2br($file_content) ?></div>
            </div>
            <div class="col bg-dark p-3">
                <h3 class="border-bottom">JSON</h3>
                <pre class="small text-white"><?= json_encode($res, JSON_PRETTY_PRINT) ?></pre>
            </div>
        </div>
    </div>

<?php endif; ?>



<style>
    .emoj {
        /* overflow: hidden; */
        /* height: 110px; */
        padding-top: 40px;
    }

    .emoj a {
        transition: transform .2s ease-out;
        display: inline-block;
        position: relative;
        text-align: center;
        width: 100%;
    }

    .emoj img {
        width: 70%;
    }

    .emoj a:hover {
        transform: translate(0, -20px);
    }

    .emoj a>span {
        position: absolute;
        display: block;
        bottom: -80px;
        text-align: center;
        visibility: hidden;
        font-size: 1.6em;
        line-height: 1;
    }

    .emoj a:hover>span {
        visibility: visible;
    }
</style>

<script>
    $('form.bd-search').submit(function(e){
        // e.preventDefault();
        // get_info($('input[name="id"]').val())
    })
</script>