<?php


namespace app\controllers;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class TestsController extends AppController {

    public function indexAction() {
        $data = $this->data;
        $this->setMeta('Тестирование');
        $data['menu'] = $this->menu;
        $data['meta'] = $this->meta;

        $this->set($data);
    }
}