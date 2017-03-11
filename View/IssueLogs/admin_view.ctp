<div id="IssueLogsAdminView">
    <h3><?php echo __('View 異動記錄', true); ?></h3><hr />
    <div class="col-md-12">

        <div class="col-md-2">通報編號</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['IssueLog']['issue_id']) {

                echo $this->data['IssueLog']['issue_id'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-2">分類</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['IssueLog']['status']) {

                echo $this->data['IssueLog']['status'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-2">意見</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['IssueLog']['comment']) {

                echo $this->data['IssueLog']['comment'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-2">建立時間</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['IssueLog']['created']) {

                echo $this->data['IssueLog']['created'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-2">建立者</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['IssueLog']['created_by']) {

                echo $this->data['IssueLog']['created_by'];
            }
            ?>&nbsp;
        </div>
    </div>
    <hr />
    <div class="btn-group">
        <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('IssueLog.id')), array('class' => 'btn btn-default'), __('Delete the item, sure?', true)); ?>
        <?php echo $this->Html->link(__('異動記錄 List', true), array('action' => 'index'), array('class' => 'btn btn-default')); ?>
    </div>
    <div id="IssueLogsAdminViewPanel"></div>
    <?php
    echo $this->Html->scriptBlock('

');
    ?>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
            $('a.IssueLogsAdminViewControl').click(function () {
                $('#IssueLogsAdminViewPanel').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>