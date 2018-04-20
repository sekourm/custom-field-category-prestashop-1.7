<?php

class Category extends CategoryCore {

    public $description_long;

    public function __construct($id_category = null, $id_lang = null, $id_shop = null){
        self::$definition['fields']['description_long'] = array('type' => self::TYPE_HTML, 'lang' => true);
        parent::__construct($id_category, $id_lang, $id_shop);
    }

}