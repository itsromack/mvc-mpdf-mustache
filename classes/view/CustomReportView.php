<?
require_once("$BASE_DIR/classes/view/View.php");

class CustomReportView extends View {
    private $pdf;
    protected $vars;

    public function CustomReportView($pdf) {
        $this->pdf = $pdf;
        $template = 'custom_report';
        parent::__construct($template);

        $this->preparePage();

        $this->addVars($this->vars);
    }

    private function preparePage() {
        $this->vars['page_title'] = $SITE_NAME;
        $this->vars['title'] = 'Lorem Ipsum';
        $this->vars['content'] = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
    }

}
