<?php
if (!isset($url)) {
    $url = array();
}
?>
<div id="IssuesAdminIndex">
    <h2>通報資料</h2>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <?php
    foreach ($items as $item) {
        $title = $item['Issue']['license'];
        if (!empty($item['Issue']['name_english'])) {
            $title .= ' | ' . $item['Issue']['name_english'];
        }
        if (!empty($item['Issue']['name_english'])) {
            $title .= ' | ' . $item['Issue']['name_chinese'];
        }
        ?><div class="col-md-4">
            <strong>藥證：</strong><?php echo $this->Html->link($title, array('action' => 'view', $item['Issue']['id'])); ?>
            <br /><strong>來源：</strong><?php echo $item['Issue']['info_source']; ?>
            <br /><strong>狀態：</strong><?php echo $item['Issue']['status']; ?>
            <br /><strong>時間：</strong><?php echo $item['Issue']['modified']; ?>
            <p><?php
                if (!empty($item['IssueLog']['comment'])) {
                    echo $item['IssueLog']['comment'];
                }
                ?></p>
            <?php
            echo $this->Olc->imgLink('pic_new', $item['Issue']['pic_new']);
            ?>    
        </div>
        <?php
    }
    ?>
    <div class="clearfix"></div>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
</div>