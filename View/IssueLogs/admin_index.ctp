<?php
if (!isset($url)) {
    $url = array();
}
?>
<div id="IssueLogsAdminIndex">
    <h2><?php echo __('異動記錄', true); ?></h2>
    <div class="btn-group">
        <?php echo $this->Html->link(__('Add', true), array('action' => 'add'), array('class' => 'btn btn-default dialogControl')); ?>
    </div>
    <div><?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?></div>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="IssueLogsAdminIndexTable">
        <thead>
            <tr>

                <th><?php echo $this->Paginator->sort('IssueLog.issue_id', '通報編號', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('IssueLog.status', '分類', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('IssueLog.comment', '意見', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('IssueLog.created', '建立時間', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('IssueLog.created_by', '建立者', array('url' => $url)); ?></th>
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
                        echo $item['IssueLog']['issue_id'];
                        ?></td>
                    <td><?php
                        echo $item['IssueLog']['status'];
                        ?></td>
                    <td><?php
                        echo $item['IssueLog']['comment'];
                        ?></td>
                    <td><?php
                        echo $item['IssueLog']['created'];
                        ?></td>
                    <td><?php
                        echo $item['IssueLog']['created_by'];
                        ?></td>
                    <td>
                        <div class="btn-group">
                            <?php echo $this->Html->link(__('View', true), array('action' => 'view', $item['IssueLog']['id']), array('class' => 'btn btn-default dialogControl')); ?>
                            <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $item['IssueLog']['id']), array('class' => 'btn btn-default dialogControl')); ?>
                            <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $item['IssueLog']['id']), array('class' => 'btn btn-default'), __('Delete the item, sure?', true)); ?>
                        </div>
                    </td>
                </tr>
            <?php } // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="IssueLogsAdminIndexPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
        });
        //]]>
    </script>
</div>