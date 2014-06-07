<h1>MVC PDF Generator</h1>
MVC PDF Generator using mPDF (with Mustache)

<h3>Directory</h3>

<pre>
root
 |--classes (folder)
 |  |--pdf (folder)
 |  |  |--PDF.php
 |  |  |--(Put Your PDF Models here)
 |  |
 |  |--view (folder)
 |     |--View.php
 |     |--(Put Your Views here)
 |
 |--html (folder)
 |  |--(Put Your Templates here)
 |
 |--lib (folder)
 |  |--mpdf (folder)
 |  |--mustache (folder)
 |
 |--index.php
 |--(Put Your Routes here)
</pre>

 <h3>Setup</h3>

1. Extend from the PDF class, save it under <b>classes/pdf</b> folder
<pre>
class PDFDemoReport extends PDF {
  ...
}
</pre>

2. Create a View Class, save it under <b>classes/view</b> folder
<pre>
class DemoView extends View {
  protected $vars;

  public function IndexView() {
    $template = 'index'; // the filename of the template
    parent::__construct($template);
    $this->vars['content'] = 'Hello World';
    $this->addVars($this->vars);
  }
}
</pre>

3. Create Template, save it under <b>html</b> folder (ex. save it as index.html)
<pre>
{{content}}
</pre>

4. Create the Route file (ex. save it as demo.php)
<pre>
<?php
require("base.php");
require_once("$BASE_DIR/common.php");
require_once("$BASE_DIR/classes/view/DemoView.php");
$pdf = new PDFDemoReport('en');
$page = new DemoView($pdf);
$content = $page->generateView();
$pdf->setContent($content);
$pdf->generatePDF();
</pre>
