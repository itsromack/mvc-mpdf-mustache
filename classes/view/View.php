<?php

require_once("$BASE_DIR/lib/mustache/Mustache.php");
require_once("$BASE_DIR/lib/mustache/MustacheLoader.php");

abstract class View extends Mustache {

    protected $template;
    protected $vars;
    protected $loader;

    public function View($template) {
        global $BASE_DIR, $TEMPLATE_DIR, $TEMPLATE_EXT;
        $this->initialiseVars();
        $this->setTemplate($template);
        $this->loader = new MustacheLoader("$BASE_DIR/$TEMPLATE_DIR", $TEMPLATE_EXT);
    }

    public function setTemplate($template) {
        if (is_file(self::getTemplateFile($template))) {
            $this->template = $template;
        } else {
            echo "Invaid template: $template";
        }
    }

    public function addVar($key, $value) {
        $this->vars[$key] = $value;
    }

    public function addVars($vars) {
        $this->vars = array_merge($this->vars, $vars);
    }

    public function generateView() {
        $template = file_get_contents(self::getTemplateFile($this->template));
        return parent::render($template, $this->vars, $this->loader);
    }

    public function setErrors($errors) {
        foreach ($errors as $key=>$val) {
            $this->addVar($key . '_error', $val);
        }
    }

    private static function getTemplateFile($template) {
        global $BASE_DIR, $TEMPLATE_DIR, $TEMPLATE_EXT;
        $template = "$BASE_DIR/$TEMPLATE_DIR/$template.$TEMPLATE_EXT";
        if (is_file($template)) {
            return $template;
        } else {
            return false;
        }
    }

    private function initialiseVars() {
        global $SITE_NAME, $SITE_DOMAIN, $CDN_URL, $BASE_URL, $PRODUCTION;
        $this->vars = array(
            'SITE_NAME' => $SITE_NAME,
            'SITE_DOMAIN' => $SITE_DOMAIN,
            'BASE_URL' => $BASE_URL,
            'PRODUCTION' => $PRODUCTION,
            'CDN_URL' => $CDN_URL,
            'current_year' => date('Y'), // For copywrite
            'title' => $SITE_NAME
            );
    }
}
