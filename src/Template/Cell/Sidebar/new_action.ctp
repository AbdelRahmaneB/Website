<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
                <!--
                GENERAL
                -->
                <li class="<?= ($this->request->action == 'index') && ($this->request->controller == 'News') ? 'active disabled' : ''; ?>">
                    <a href="<?= $this->Url->build(
                        [
                            'controller' => 'News',
                            'action' => 'index'
                        ]) ?>">
                            <span class="fa-stack">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-info fa-stack-1x" style="color:<?= ($this->request->action == 'index')  && ($this->request->controller == 'News') ? '#337ab7' : '#fff'; ?>"></i>
                            </span> <?= __('List news') ?>
                    </a>
                </li>

                <li class="<?= ($this->request->action == 'add') && ($this->request->controller == 'News') ? 'active disabled' : ''; ?>">
                    <a href="<?= $this->Url->build(
                        [
                            'controller' => 'News',
                            'action' => 'add'
                        ]) ?>">
                            <span class="fa-stack">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-plus fa-stack-1x" style="color:<?= ($this->request->action == 'add')  && ($this->request->controller == 'News') ? '#337ab7' : '#fff'; ?>"></i>
                            </span> <?= __('Add new') ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>