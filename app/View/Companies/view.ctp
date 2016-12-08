<div class="breakfasts view">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Company'); ?></h1>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-9">

            <div class="form-group">
                <?php echo $this->Form->input('name', array(
                    'label' => 'Company name',
                    'class' => 'form-control',
                    'placeholder' => 'Company name',
                    'value' => $company['Company']['name'])); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('created', array(
                    'label' => 'date created',
                    'class' => 'form-control',
                    'value' => $company['Company']['created'])); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('modified', array(
                    'label' => 'date modified',
                    'class' => 'form-control',
                    'value' => $company['Company']['modified'])); ?>
            </div>

        </div><!-- end col md 9 -->

    </div>
</div>
