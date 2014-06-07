<?php
require("base.php");
require_once("$BASE_DIR/common.php");
require_once("$BASE_DIR/classes/view/IndexView.php");

$page = new IndexView();
echo $page->generateView();
