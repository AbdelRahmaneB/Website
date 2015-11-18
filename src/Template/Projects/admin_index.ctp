<?= $this->Html->css('dataTables.bootstrap.min', ['block' => 'cssTop']); ?>
<?= $this->Html->css('bootstrap-switch.min', ['block' => 'cssTop']); ?>
<div class="row">
    <?= $this->cell('Sidebar::projectAction'); ?>

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?= __('List of projects'); ?></h3>
            </div>
            <div class="table-responsive">
                <table id="projects" class="table table-striped table-bordered table-hover dataTable">
                    <thead>
                    <tr>
                        <th></th>
                        <th><?= __('Name'); ?></th>
                        <th><?= __('Website'); ?></th>
                        <th><?= __('Organizations'); ?></th>
                        <th><?= __('Approved'); ?></th>
                        <th><?= __('Archived'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    <tr class="table-search info">
                        <td></td>
                        <td><input type="text" placeholder="<?= __('Search ...'); ?>" class="form-control input-sm input-block-level" /></td>
                        <td><input type="text" placeholder="<?= __('Search ...'); ?>" class="form-control input-sm input-block-level" /></td>
                        <td>
                            <select class="form-control">
                                <option value="">-----</option>
                                <?php
                                foreach($orgs as $org) {
                                    echo '<option value="' . $org . '">' . $org . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select class="form-control">
                                <option value="">-----</option>
                                <option value="0"><?= __('No'); ?></option>
                                <option value="1"><?= __('Yes'); ?></option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control">
                                <option value="">-----</option>
                                <option value="0" selected><?= __('No'); ?></option>
                                <option value="1"><?= __('Yes'); ?></option>
                            </select>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Add DataTables scripts -->
<?= $this->Html->script(
    [
        'datatables/jquery.dataTables.min',
        'datatables/dataTables.bootstrap.min',
        'DataTables.cakephp.dataTables',
        'bootstrap/bootstrap-switch.min'
    ],
    ['block' => 'scriptBottom']);
?>
<?php
$this->Html->scriptStart(['block' => 'scriptBottom']);
echo $this->DataTables->init([
    'ajax' => [
        'url' => $this->Url->build(['action' => 'index']),
    ],
    'deferLoading' => $recordsTotal,
    'delay' => 600,
    "sDom" => "<'row'<'col-xs-6'l>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
    'columns' => [
        [
            'name' => 'Projects.id',
            'data' => 'id',
            'searchable' => false,
            'visible' => false
        ],
        [
            'name' => 'Projects.name',
            'data' => 'name',
            'searchable' => true
        ],
        [
            'name' => 'Projects.link',
            'data' => 'link',
            'searchable' => true
        ],
        [
            'name' => 'Organizations.name',
            'data' => 'organizations',
            'searchable' => true
        ],
        [
            'name' => 'Projects.accepted',
            'data' => 'accepted',
            'searchable' => true,
        ],
        [
            'name' => 'Projects.archived',
            'data' => 'archived',
            'searchable' => true
        ]
    ],
    'lengthMenu' => '',
    'pageLength' => 50
])->draw('.dataTable');
echo 'var ajaxUrl="' . $this->Url->Build(['action' => 'editState']) . '";';
echo 'var orgUrl="' . $this->Url->Build(['controller' => 'organizations', 'action' => 'view']) . '";';
echo 'var projectUrl="' . $this->Url->Build(['action' => 'view']) . '";';
$this->Html->scriptEnd();
?>
<?= $this->Html->script('projects/adminIndex.js', ['block' => 'scriptBottom']); ?>
