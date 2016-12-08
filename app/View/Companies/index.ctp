<div class="breakfasts index">

    <div class="row">
        <div class="col-md-4">
            <div class="page-header">
                <h1><?= __('Companies'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
        <div class="col-md-8 text-right"><br/>
            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Company'), array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
        </div>
    </div><!-- end row -->


    <div class="row">

        <!--<pre><?/*=print_r($breakfasts, true)*/?></pre>-->

        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table id="datatable" cellpadding="0" cellspacing="0" class="table table-striped">
                        <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="45%">Name</th>
                            <th width="20%">Created</th>
                            <th width="20%">Modified</th>
                            <th width="10%" class="actions"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($companies as $company): ?>
                            <tr>
                                <td><?= h($company['Company']['id']) ?></td>
                                <td><?= h($company['Company']['name']) ?></td>
                                <td><?= h($company['Company']['created']) ?></td>
                                <td><?= h($company['Company']['modified']) ?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $company['Company']['id']), array('escape' => false)); ?>
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $company['Company']['id']), array('escape' => false)); ?>
                                    <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $company['Company']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $company['Company']['id'])); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                </div>
            </div>

        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->