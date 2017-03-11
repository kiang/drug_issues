<?php
if (!isset($url)) {
    $url = array();
}
?>
<div id="IssuesAdminIndex">
    <h2><?php echo __('回報表單', true); ?></h2>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="IssuesAdminIndexTable">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('Issue.license', '許可證字號', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.name_english', '藥品英文名', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.name_chinese', '藥品中文名', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.info_source', '編輯者', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.status', '分類', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.modified', '更新時間', array('url' => $url)); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($items as $item) {
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
                <tr<?php echo $class; ?>>
                    <td><?php
                        echo $item['Issue']['license'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['name_english'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['name_chinese'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['info_source'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['status'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['modified'];
                        ?></td>
                </tr>
            <?php } // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="IssuesAdminIndexPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
        });
        //]]>
    </script>
</div>