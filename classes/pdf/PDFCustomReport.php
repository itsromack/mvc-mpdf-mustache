<?php

class PDFCustomReport extends PDF {

    public function __construct($mode, $filename = false) {
        parent::__construct(array(
            'mode' => $mode,
            'paper_size' => PAPER_SIZE_A4,
            'font_size' => '0',
            'font_style' => '',
            'margin_left' => 8,
            'margin_right' => 8,
            'margin_top' => 8,
            'margin_bottom' => 8,
            'margin_header' => 9,
            'margin_footer' => 9,
            'orientation' => 'P',
            'filename' => $filename
            )
        );
    }

}
