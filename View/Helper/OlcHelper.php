<?php

class OlcHelper extends AppHelper {

    public $helpers = array('Html');

    public function imgLink($file) {
        if (!empty($file)) {
            $p = pathinfo($file);
            $img = $p['filename'] . '_s.jpg';
            if (file_exists(WWW_ROOT . '/img/pic_new/' . $img)) {
                return '<a href="' . $this->Html->url('/') . 'img/pic_new/' . $file . '" target="_blank">' . $this->Html->image('pic_new/' . $img, array('width' => 200)) . '</a>';
            } else {
                return '<a href="' . $this->Html->url('/') . 'img/pic_new/' . $file . '" target="_blank">(下載檔案)</a>';
            }
        }
        return '';
    }

}
