<?php

include_once("base.php");
include_once("$BASE_DIR/lib/mpdf/mpdf.php");

class PDF extends mPDF {
    public $pdf;
    private $language;
    private $content;

    public function __construct($options = false) {
        $this->pdf = new mPDF(
            $options['mode'],
            $options['paper_size'],
            $options['font_size'],
            $options['font_style'],
            $options['margin_left'],
            $options['margin_right'],
            $options['margin_top'],
            $options['margin_bottom'],
            $options['margin_header'],
            $options['margin_footer'],
            $options['orientation']);
        $this->language = $options['mode'];
        $this->filename = $options['filename'];
    }

    private function isRTL($language) {
        // RTL-Direction Language Codes:
        // Based on 'mpdf/config_cp.php' or http://mpdf1.com/manual/index.php?tid=356
        return in_array($language, array('ar', 'he', 'yi', 'fa', 'ps', 'ur'));
    }

    protected function setDirection() {
        if ($this->isRTL($this->language)) {
            $this->pdf->SetDirectionality(DIRECTION_RIGHT_TO_LEFT);
        } else {
            $this->pdf->SetDirectionality(DIRECTION_LEFT_TO_RIGHT);
        }
    }

    public function setContent($content) {
        if (!empty($this->content)) {
            $this->content .= $content;
        } else {
            $this->content = $content;
        }
        try {
            $this->pdf->WriteHTML($this->content);
        } catch (Exception $e) {
            error_log('Unable to set PDF content');
            error_log($e->getMessage());
        }
    }

    public function generatePDF() {
        try {
            $this->pdf->Output($this->filename);
        } catch (Exception $e) {
            error_log('Unable to generate PDF output');
            error_log($e->getMessage());
        }
    }
}
