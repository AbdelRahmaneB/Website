<?= $this->Html->css('dataTables.bootstrap.min', ['block' => 'cssTop']); ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><?= __('List of projects'); ?> <?= $this->Wiki->addHelper('Projects'); ?></h1>
        <?php
        $this->Html->addCrumb(__('Home'), '/');
        $this->Html->addCrumb(__('Projects'), '/Projects');
        $this->Html->addCrumb(__('List of projects'));

        echo $this->Html->getCrumbList(); ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="header-title"><?= __('List of projects'); ?></h3>
                <div class="table-responsive">
                    <table id="projects" class="table table-striped table-bordered dataTable">
                        <thead>
                        <tr>
                            <th></th>
                            <th><?= __('Name'); ?></th>
                            <th><?= __('Link'); ?></th>
                            <th><?= __('Organizations'); ?> <?= $this->Wiki->addHelper('Organizations'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr class="table-search info">
                            <td></td>
                            <td><input type="text" placeholder="<?= __('Search ...'); ?>"
                                       class="form-control input-sm input-block-level"/></td>
                            <td><input type="text" placeholder="<?= __('Search ...'); ?>"
                                       class="form-control input-sm input-block-level"/></td>
                            <td>
                                <select class="form-control">
                                    <option value="">-----</option>
                                    <?php
                                    foreach ($orgs as $org) {
                                        echo '<option value="' . $org . '">' . $org . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
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
    "autoWidth" => false,
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
        ]
    ],
    'pageLength' => 50
])->draw('.dataTable');
echo 'var orgUrl="' . $this->Url->Build(['controller' => 'organizations', 'action' => 'view']) . '";';
echo 'var projectUrl="' . $this->Url->Build(['action' => 'view']) . '";';
echo 'var validationTxt="' . __('Pending Validation') . '";';
$this->Html->scriptEnd();
?>
<?= $this->Html->script('projects/index.js', ['block' => 'scriptBottom']); ?>
