<div id="IssuesAdminView">
    <h3>通報資料</h3><hr />
    <div class="col-md-12">
        <div class="col-md-3"><strong>許可證</strong></div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Issue']['license_id']) {
                echo $this->data['Issue']['license_id'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>外部許可證</strong></div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Issue']['license_uuid']) {

                echo $this->data['Issue']['license_uuid'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>編輯者</strong></div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Issue']['info_source']) {

                echo $this->data['Issue']['info_source'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>分類</strong></div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Issue']['status']) {

                echo $this->data['Issue']['status'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>藥品英文名</strong></div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Issue']['name_english']) {

                echo $this->data['Issue']['name_english'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>藥品中文名</strong></div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Issue']['name_chinese']) {

                echo $this->data['Issue']['name_chinese'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>許可證字號</strong></div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Issue']['license']) {

                echo $this->data['Issue']['license'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>劑型</strong></div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Issue']['dosage_form']) {

                echo $this->data['Issue']['dosage_form'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>含量（規格/劑量）</strong></div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Issue']['dosage']) {

                echo $this->data['Issue']['dosage'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>批號（新變更的批號）</strong></div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Issue']['batch_no']) {

                echo $this->data['Issue']['batch_no'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>舊外觀(上傳資料)</strong></div>
        <div class="col-md-9">&nbsp;<?php
            echo $this->Olc->imgLink($this->data['Issue']['pic_old']);
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>新外觀(上傳資料)</strong></div>
        <div class="col-md-9">&nbsp;<?php
            echo $this->Olc->imgLink($this->data['Issue']['pic_new']);
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>舊仿單(KEY IN)</strong></div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Issue']['label_old']) {

                echo $this->data['Issue']['label_old'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>舊仿單(上傳資料)</strong></div>
        <div class="col-md-9">&nbsp;<?php
            echo $this->Olc->imgLink($this->data['Issue']['label_old_file']);
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>新仿單(KEY IN)</strong></div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Issue']['label_new']) {

                echo $this->data['Issue']['label_new'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>新仿單(上傳資料)</strong></div>
        <div class="col-md-9">&nbsp;<?php
            echo $this->Olc->imgLink($this->data['Issue']['label_new_file']);
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>異動證明(公文/廠商說明書等)</strong></div>
        <div class="col-md-9">&nbsp;<?php
            echo $this->Olc->imgLink($this->data['Issue']['evidence']);
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>更新時間</strong></div>
        <div class="col-md-9">&nbsp;<?php
            echo $this->data['Issue']['modified'];
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>更新者</strong></div>
        <div class="col-md-9">&nbsp;<?php
            echo $this->data['Member']['username'];
            ?>&nbsp;
        </div>
    </div>
    <p>&nbsp;</p>
    <div id="IssueLogsAdminAdd">
        <h3>新增備註</h3><hr />
        <?php echo $this->Form->create('IssueLog', array('url' => '/admin/issues/view/' . $this->data['Issue']['id'])); ?>
        <div class="IssueLogs form">
            <?php
            echo $this->Form->input('IssueLog.status', array(
                'type' => 'radio',
                'options' => array(
                    '變更(未確認)' => '變更(未確認)',
                    '變更(已確認)' => '變更(已確認)',
                    '疑義' => '疑義',
                ),
                'value' => $this->data['Issue']['status'],
                'legend' => '分類',
                'div' => 'form-group',
            ));
            echo $this->Form->input('IssueLog.comment', array(
                'label' => '意見',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            ?>
        </div>
        <?php
        echo $this->Form->submit('送出', array(
            'class' => 'btn btn-primary',
        ));
        echo $this->Form->end();
        ?>
    </div>
    <h3>異動記錄</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>時間</th>
                <th>分類</th>
                <th>操作人</th>
                <th>備註/說明</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($this->data['IssueLog'] AS $log) {
                ?><tr>
                    <td><?php echo $log['created']; ?></td>
                    <td><?php echo $log['status']; ?></td>
                    <td><?php echo $log['Member']['username']; ?></td>
                    <td><?php echo nl2br($log['comment']); ?></td>
                </tr><?php
            }
            ?>
        </tbody>
    </table>
</div>