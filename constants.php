<?php

define('DIRECTION_LEFT_TO_RIGHT', 'ltr');
define('DIRECTION_RIGHT_TO_LEFT', 'rtl');
define('PAPER_SIZE_A4', 'A4');
define('PAPER_SIZE_A4_LANDSCAPE', 'A4-L');
define('PAPER_SIZE_LEGAL', 'Legal');

$IMAGES_DIR = 'images';
$TEMPLATE_DIR = 'html';
$TEMPLATE_EXT = 'html';
$SITE_NAME = 'PDF Generator using mPDF (with Mustache)';
$SITE_DOMAIN = 'localhost';

$PROTOCOL = 'http';
$IS_SECURE = false;
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']) {
    $IS_SECURE = true;
    $PROTOCOL = 'https';
}
$BASE_URL = $PROTOCOL . '://' . $SITE_DOMAIN;

$CDN_URL = $BASE_URL;

$CDN_URL = 'localhost';
$BASE_URL = '';
