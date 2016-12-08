<div class="settings index">

    <div class="row">
        <div class="col-md-4">
            <div class="page-header">
                <h1><?php echo __('Settings'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
        <div class="col-md-8 text-right"><br/>
            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Setting'), array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
        </div>
    </div><!-- end row -->


    <div class="row">

        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table id="datatable" cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
                        <thead>
                        <tr>

                            <th><?php echo $this->Paginator->sort('name'); ?></th>
                            <th><?php echo $this->Paginator->sort('value'); ?></th>

                            <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            <th class="actions"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($settings as $setting): ?>
                            <tr>

                                <td><?php echo h($setting['Setting']['name']); ?>&nbsp;</td>
                                <td><?php echo h($setting['Setting']['value']); ?>&nbsp;</td>

                                <td><?php echo h($setting['Setting']['modified']); ?>&nbsp;</td>
                                <td class="actions">

                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $setting['Setting']['id']), array('escape' => false)); ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->