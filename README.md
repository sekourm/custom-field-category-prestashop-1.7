To Add a new description_long field to a category in Prestashop Category you need 3 steps:

Update DB
Add your field named description_long to the category_lang table, you can mimic the description column characteristics

Override Category class
Create a file here /override/classes/Category.php with this code:

<pre>
class Category extends CategoryCore
{

    public $description_long;

    public function __construct($id_category = null, $id_lang = null, $id_shop = null){
        self::$definition['fields']['description_long'] = array('type' => self::TYPE_HTML, 'lang' => true);
        parent::__construct($id_category, $id_lang, $id_shop);
    }

}
</pre>

Override AdminCategoriesControllerCore class
Create a file here /override/controllers/admin/AdminCategoriesController.php with this code :

<pre>
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
                'hint' => $this->l('Invalid characters:').' <>;=#{}',
            ),
        );

        return parent::renderForm();
    }
}
</pre>
