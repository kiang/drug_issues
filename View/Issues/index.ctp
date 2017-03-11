<div id="IssuesIndex">
    <h2><?php echo __('回報表單', true); ?></h2>
    <div class="btn-group">
    </div>
    <p>
        <?php
        $url = array();

        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?></p>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="IssuesIndexTable">
        <thead>
            <tr>

                <th><?php echo $this->Paginator->sort('Issue.license_id', '許可證', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.license_uuid', '外部許可證', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.info_source', '編輯者', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.status', '分類', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.name_english', '藥品英文名', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.name_chinese', '藥品中文名', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.license', '許可證字號', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.dosage_form', '劑型', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.dosage', '含量（規格/劑量）', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.batch_no', '批號（新變更的批號）', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.pic_old', '舊外觀(上傳資料)', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.pic_new', '新外觀(上傳資料)', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.label_old', '舊仿單(KEY IN)', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.label_old_file', '舊仿單(上傳資料)', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.label_new', '新仿單(KEY IN)', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.label_new_file', '新仿單(上傳資料)', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.evidence', '異動證明(公文/廠商說明書等)', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.modified', '更新時間', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Issue.modified_by', '更新者', array('url' => $url)); ?></th>
                <th class="actions"><?php echo __('Action', true); ?></th>
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
                        echo $item['Issue']['license_id'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['license_uuid'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['info_source'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['status'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['name_english'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['name_chinese'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['license'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['dosage_form'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['dosage'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['batch_no'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['pic_old'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['pic_new'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['label_old'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['label_old_file'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['label_new'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['label_new_file'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['evidence'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['modified'];
                        ?></td>
                    <td><?php
                        echo $item['Issue']['modified_by'];
                        ?></td>
                    <td>
                        <div class="btn-group">
                            <?php echo $this->Html->link(__('View', true), array('action' => 'view', $item['Issue']['id']), array('class' => 'btn btn-default IssuesIndexControl')); ?>
                        </div>
                    </td>
                </tr>
            <?php }; // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="IssuesIndexPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
            $('#IssuesIndexTable th a, div.paging a, a.IssuesIndexControl').click(function () {
                $('#IssuesIndex').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>