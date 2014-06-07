<?
require_once("$BASE_DIR/classes/view/View.php");

class IndexView extends View {

    protected $vars;

    public function IndexView() {
        $template = 'index';
        parent::__construct($template);
        $this->vars['page_title'] = $SITE_NAME;
        $this->addVars($this->vars);
    }

}
