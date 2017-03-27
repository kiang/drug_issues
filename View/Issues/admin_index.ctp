<?php
if (!isset($url)) {
    $url = array();
}
?>
<div id="IssuesAdminIndex">
    <h2>通報資料</h2>
    <div class="pull-right col-md-6">
        <form id="IssueKeywordsForm">
        <div class="col-md-6"><input type="text" class="form-control" id="IssueKeywords" value="<?php echo $keywords; ?>" /></div>
        <a href="#" class="btn btn-primary" id="IssueKeywordsBtn">搜尋</a>
        </form>
    </div>
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
<script>
    $(function () {
        $('#IssueKeywordsForm').submit(function() {
            location.href = '<?php echo $this->Html->url('/admin/issues/index/'); ?>' + encodeURI($('#IssueKeywords').val());
            return false;
        })
        $('#IssueKeywordsBtn').click(function () {
            location.href = '<?php echo $this->Html->url('/admin/issues/index/'); ?>' + encodeURI($('#IssueKeywords').val());
            return false;
        });
    })
</script>