<?php

if (!defined('_PS_VERSION_'))
    exit;

class CustomFieldCategory extends Module
{
    public function __construct()
    {
        $this->name = 'customfieldcategory';
        $this->tab = 'front_office_features';
        $this->version = '1.0';
        $this->author = 'Mennad Sekour';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.7.1', 'max' => _PS_VERSION_);
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Custom field category');
        $this->description = $this->l('Nouveau champ catégorie');
    }

    public function install()
    {
        if (!parent::install() || !$this->_installSql()) {
            return false;
        }

        return true;
    }

    public function uninstall()
    {
        return parent::uninstall() && $this->_unInstallSql();
    }

    protected function _installSql() {
        $sqlInstall = "ALTER TABLE " . _DB_PREFIX_ . "category_lang "
            . "ADD COLUMN description_long LONGTEXT NULL";

        $returnSql = Db::getInstance()->execute($sqlInstall);

        return $returnSql;
    }

    protected function _unInstallSql() {
        $sqlInstall = "ALTER TABLE " . _DB_PREFIX_ . "category_lang "
            . "DROP description_long";

        $returnSql = Db::getInstance()->execute($sqlInstall);

        return $returnSql;
    }
}