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
        ?><div class="col-md-4"><?php echo $item['Issue']['modified']; ?> <strong><?php
        $title = $item['Issue']['license'];
        if (!empty($item['Issue']['name_english'])) {
            $title .= ' | ' . $item['Issue']['name_english'];
        }
        if (!empty($item['Issue']['name_english'])) {
            $title .= ' | ' . $item['Issue']['name_chinese'];
        }
        echo $this->Html->link($title, array('action' => 'view', $item['Issue']['id']));
        ?></strong>
            <div class="col-md-12">
                <strong>來源：</strong><?php echo $item['Issue']['info_source']; ?>
                <br /><strong>狀態：</strong><?php echo $item['Issue']['status']; ?>
                <p><?php
                    if (!empty($item['IssueLog']['comment'])) {
                        echo $item['IssueLog']['comment'];
                    }
                    ?></p>
            </div></div>
        <?php
    }
    ?>
    <div class="clearfix"></div>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
</div>