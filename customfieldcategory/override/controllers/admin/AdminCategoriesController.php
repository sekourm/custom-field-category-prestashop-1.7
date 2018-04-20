<?php

class AdminCategoriesController extends AdminCategoriesControllerCore{
    public function renderForm()
    {
        $this->fields_form_override =array(
            array(
                'type' => 'textarea',
                'label' => $this->l('Description long'),
                'name' => 'description_long',
                'lang' => true,
                'autoload_rte' => true,
                'validate' => 'isCleanHtml',
                'hint' => $this->l('Invalid characters:').' <>;=#{}',
            ),
        );

        return parent::renderForm();
    }
}