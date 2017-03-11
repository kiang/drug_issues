<div id="LicensesView">
    <h3><?php echo __('View 許可證', true); ?></h3><hr />
    <div class="col-md-12">

        <div class="col-md-2">藥品英文名</div>
        <div class="col-md-9"><?php
            if ($this->data['License']['name_english']) {

                echo $this->data['License']['name_english'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-2">藥品中文名</div>
        <div class="col-md-9"><?php
            if ($this->data['License']['name_chinese']) {

                echo $this->data['License']['name_chinese'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-2">許可證字號</div>
        <div class="col-md-9"><?php
            if ($this->data['License']['license']) {

                echo $this->data['License']['license'];
            }
            ?>&nbsp;
        </div>
    </div>
    <div class="btn-group">
        <?php echo $this->Html->link(__('許可證 List', true), array('action' => 'index'), array('class' => 'btn btn-default')); ?>
    </div>
    <div id="LicensesViewPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
            $('a.LicensesViewControl').click(function () {
                $('#LicensesViewPanel').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>