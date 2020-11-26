<?php

namespace app\controllers;

use app\models\Main;
use app\models\User;
use fw\core\App;
use fw\core\base\View;
use fw\libs\Pagination;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use fw\libs\Cache;
use MonkeyLearn\Client;

use LittleYoutube\LittleYoutube;

/**
 * Description of Main
 *
 */
class MainController extends AppController
{

    public function __construct($route)
    {
        parent::__construct($route);

        $my_id = $uid = $_SESSION['user']['id'];
        $route = $this->route;
        $user = $cur_user = \R::load('user', $_SESSION['user']['id']);
        View::setMeta('', 'Описание страницы', 'Ключевые слова');
        $this->set(compact('title', 'user', 'my_id', 'uid', 'cur_user', 'route'));
    }

    public function indexAction()
    {
        // $this->view = 'profile';

        $my_id = $uid = $_SESSION['user']['id'];
        $route = $this->route;
        $user = $cur_user = \R::load('user', $_SESSION['user']['id']);
        View::setMeta('', 'Описание страницы', 'Ключевые слова');
        $this->set(compact('title', 'user', 'my_id', 'uid', 'cur_user', 'route'));
    }

    public function docsnextAction()
    {
    }

    public function profileAction()
    {
    }
    public function pageAction()
    {
    }
    public function page2Action()
    {



        // $file = '5_Python_tricks_that_will_improve_your_life.srt';
        // $cache = new Cache();
        // if(!$res = $cache->get(md5($file))) {
        //     $content = file_get_contents(WWW.'/awork/'.$file);

        //     $ml = new Client('e2f52c54e422b987e8d72da5e26655ed5dc11930');
        //     // $data = ["Elon Musk has shared a photo of the spacesuit designed by SpaceX. This is the second image shared of the new design and the first to feature the spacesuit’s full-body look."];
        //     $data = [$content];
        //     $model_id = 'ex_YCya9nrn';
        //     $res = $ml->extractors->extract($model_id, $data);
            
        //     $cache->set(md5($file), $res, 3600*24*5);
        // }

        // header('Content-Type: application/json');
        // echo json_encode($res->result);
        // die;
    }
    public function page3Action()
    {

    // $video = LittleYoutube::video("https://www.youtube.com/watch?v=xQomv1gqmb4");
    // echo("Video ID:".$video->data['videoID']."\n");
    // print_r($video->getVideoImages());

        if (!isset($_GET['id']) && !isset($_POST['text'])) return;

        if(isset($_GET['id'])) {
            if(empty($_SESSION['buttons'])) $_SESSION['buttons'] = [];

            if (!in_array($_GET['id'], $_SESSION['buttons'])) $_SESSION['buttons'][] = $_GET['id'];
        }

        $embed_id = isset($_GET['id']) ? $_GET['id'] : null;
        $res = [];
        $file = isset($_POST['text']) ? $_POST['text'] : '5_Python_tricks_that_will_improve_your_life.srt';
        if ($embed_id == '5tcs2qXP3Pg') {
            $file = '5_Python_tricks_that_will_improve_your_life.srt';
        } elseif ($embed_id == 'LjyDh61KV5Q') {
            $file = 'Genomic_Education_Module_GEM_What_is_Genomic_Medicine.srt';
        } elseif ($embed_id == 'DyGLE0usN_I') {
            $file = 'Primitive Technology_ Iron prills - English.srt';
        } elseif ($embed_id == 'zIwLWfaAg-8') {
            $file = "The future were building -- and boring _ Elon Musk - English.srt";
        }
        $file_content = isset($_POST['text']) ? $_POST['text'] : file_get_contents(WWW.'/awork/'.$file);
        
        $cache = new Cache();
        if(!$res = $cache->get(md5($file))) {
            $ml = new Client('e2f52c54e422b987e8d72da5e26655ed5dc11930');
            $data = [$file_content];
            $model_id = 'ex_YCya9nrn';
            $res = $ml->extractors->extract($model_id, $data);
            $cache->set(md5($file), $res, 3600*24*5);
        }
        $res = $res->result[0];
        $tags = [];
        foreach ($res as $item) $tags[] = $item['keyword'];

        foreach ($tags as $item) {
            $file_content = str_replace($item.'','<span class="highlight">'.$item.'</span>', $file_content);
        }


        $my_id = $uid = $_SESSION['user']['id'];
        $route = $this->route;
        $user = $cur_user = \R::load('user', $_SESSION['user']['id']);
    
        View::setMeta('', 'Описание страницы', 'Ключевые слова');
        $this->set(compact('title', 'user', 'my_id', 'uid', 'cur_user', 'route', 'embed_id','file','file_content','tags','res'));
    }
    public function page4Action()
    {
    }

    public function page5Action()
    {
    }
    public function page6Action()
    {
    }
    //    public function page5Action() {}

    function get_c($url, $post = 0,$auth = false) {
        $agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
        curl_setopt($ch, CURLOPT_URL, $url ); // отправляем на
        curl_setopt($ch, CURLOPT_HEADER, 0); // пустые заголовки
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // возвратить то что вернул сервер
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // следовать за редиректами
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);// таймаут4
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// просто отключаем проверку сертификата

        // referer: https://savesubs.com/process?url=https://youtu.be/5tcs2qXP3Pg
        curl_setopt($ch, CURLOPT_REFERER, 'https://savesubs.com/process?url=https://youtu.be/5tcs2qXP3Pg');
        curl_setopt($ch,CURLOPT_HTTPHEADER,[
            'Origin: https://savesubs.com',
            ':authority: savesubs.com',
            ':method: POST',
            ':path: /action/get'
        ]);

        if ($auth)
            curl_setopt($ch, CURLOPT_COOKIEJAR,  '/var/www/html/my_cookies.txt');
            curl_setopt($ch, CURLOPT_COOKIEFILE,  '/var/www/html/my_cookies.txt');
    
        curl_setopt($ch, CURLOPT_POST, $post !== 0);
        if ($post) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            curl_setopt($ch, CURLOPT_POSTREDIR, 3);
        }
        $data = curl_exec($ch);
        curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
        curl_close($ch);
        return $data;
    }

    public function getinfoAction() 
    {
        if ($_GET['id'] != 1 && $_GET['id'] != 2) die;
        if ($_GET['id'] == 1) {
            $id = '5tcs2qXP3Pg';
            $file = '5_Python_tricks_that_will_improve_your_life.srt';
        } else {
            $id = 'LjyDh61KV5Q';
            $file = 'Genomic_Education_Module_GEM_What_is_Genomic_Medicine.srt';
        }

        $file_content = file_get_contents(WWW.'/awork/'.$file);
        
        $cache = new Cache();
        if(!$res = $cache->get(md5($file))) {
            $ml = new Client('e2f52c54e422b987e8d72da5e26655ed5dc11930');
            // $data = ["Elon Musk has shared a photo of the spacesuit designed by SpaceX. This is the second image shared of the new design and the first to feature the spacesuit’s full-body look."];
            $data = [$file_content];
            $model_id = 'ex_YCya9nrn';
            $res = $ml->extractors->extract($model_id, $data);                
            $cache->set(md5($file), $res, 3600*24*5);
        }
        $res = $res->result[0];
        $tags = [];
        foreach ($res as $item) $tags[] = $item['keyword'];
        echo json_encode(compact('id','file','file_content','tags','res'));        
        die;
    }
}
