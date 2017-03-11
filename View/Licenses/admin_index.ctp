<?php
if (!isset($url)) {
    $url = array();
}
?>
<div id="LicensesAdminIndex">
    <h2><?php echo __('許可證', true); ?></h2>
    <div class="btn-group">
        <?php echo $this->Html->link(__('Add', true), array('action' => 'add'), array('class' => 'btn btn-default dialogControl')); ?>
    </div>
    <div><?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?></div>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="LicensesAdminIndexTable">
        <thead>
            <tr>

                <th><?php echo $this->Paginator->sort('License.name_english', '藥品英文名', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('License.name_chinese', '藥品中文名', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('License.license', '許可證字號', array('url' => $url)); ?></th>
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
                        echo $item['License']['name_english'];
                        ?></td>
                    <td><?php
                        echo $item['License']['name_chinese'];
                        ?></td>
                    <td><?php
                        echo $item['License']['license'];
                        ?></td>
                    <td>
                        <div class="btn-group">
                            <?php echo $this->Html->link(__('View', true), array('action' => 'view', $item['License']['id']), array('class' => 'btn btn-default dialogControl')); ?>
                            <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $item['License']['id']), array('class' => 'btn btn-default dialogControl')); ?>
                            <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $item['License']['id']), array('class' => 'btn btn-default'), __('Delete the item, sure?', true)); ?>
                        </div>
                    </td>
                </tr>
            <?php } // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="LicensesAdminIndexPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
        });
        //]]>
    </script>
</div>