<?php

class OlcHelper extends AppHelper {

    public $helpers = array('Html');

    public function imgLink($field, $file) {
        if (!empty($file)) {
            $p = pathinfo($file);
            $img = $p['filename'] . '_s.jpg';
            if (file_exists(WWW_ROOT . '/img/' . $field . '/' . $img)) {
                return '<a href="' . $this->Html->url('/') . 'img/' . $field . '/' . $file . '" target="_blank">' . $this->Html->image($field . '/' . $img, array('width' => 200)) . '</a>';
            } else {
                return '<a href="' . $this->Html->url('/') . 'img/' . $field . '/' . $file . '" target="_blank">(下載檔案)</a>';
            }
        }
        return '';
    }

}
