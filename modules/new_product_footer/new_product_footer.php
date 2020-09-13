<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class New_Product_Footer extends Module
{
    public function __construct()
    {
        $this->name = 'new_product_footer';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Aleksander K';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.6',
            'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('New_Product_Footer');
        $this->description = $this->l('Add new content to products foooter.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
    }

    public function install()
    {
        if (!parent::install()
            || !$this->registerHook('displayFooterProduct')
        ) {
            return false;
        }
        return true;
    } 
   
    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookDisplayFooterProduct($params)
    {
        $this->context->controller->addJS($this->_path.'script.js');
        
        return "<h5>Wysyłka gratis</h5>
        <img src='https://lh3.googleusercontent.com/pw/ACtC-3dOXsW90OR-yDNxs7XpdEVZTfT6vZwu3V_6xhiTUm-_EKiaWpqb9dWH7vne-seIKpGTkE-5TPfluaIwG7omh8DcyLPSas9pnFWWOcOujAtwEDaCYIeB2ABtgxAG77c0XwTsFdwGldUhGavhG-H8ABY9=w246-h205-no?authuser=0' alt='free delivery'>";
    }
}