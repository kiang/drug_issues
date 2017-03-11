<div id="IssueLogsAdminAdd">
    <?php echo $this->Form->create('IssueLog', array('type' => 'file')); ?>
    <div class="IssueLogs form">
        <fieldset>
            <legend><?php
                echo __('Add 異動記錄', true);
                ?></legend>
            <?php
            echo $this->Form->input('IssueLog.issue_id', array(
                'label' => '通報編號',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('IssueLog.status', array(
                'label' => '分類',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('IssueLog.comment', array(
                'label' => '意見',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('IssueLog.created', array(
                'label' => '建立時間',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('IssueLog.created_by', array(
                'label' => '建立者',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            ?>
        </fieldset>
    </div>
    <?php
    echo $this->Form->end(__('Submit', true));
    ?>
</div>