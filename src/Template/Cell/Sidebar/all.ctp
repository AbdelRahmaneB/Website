<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <div class="alert alert-info">
                <strong>
                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'news']); ?>">
                        <?= $news->name ?>
                    </a>
                </strong>
            </div>
        </li>
        <li class="<?= ($this->request->controller == 'Pages' && $this->request->action == 'home') ? 'active' : ''; ?>">
            <a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'home']); ?>">
                <i class="fa fa-home fa-lg"></i>
                <span class="i-text"><?= __('Home') ?></span></a>
        </li>
        <li>
            <a href="<?= $this->Url->build(['controller' => 'Missions', 'action' => 'index']); ?>">
                <i class="fa fa-lg fa-file-text"></i>
                <?= __('Missions'); ?>
            </a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#organizations-submenu">
                <i class="fa fa-lg fa-suitcase"></i>
                <?= __('Organizations'); ?>
                <i class="fa submenu-arrow pull-right"></i>
            </a>
            <ul id="organizations-submenu" class="collapse">
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Organizations', 'action' => 'index']); ?>">
                        <i class="fa fa-list-ul"></i>
                        <?= __('List of organizations'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Organizations', 'action' => 'submit']); ?>">
                        <i class="fa fa-suitcase"></i>
                        <?= __('Submit an organization'); ?>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#projects-submenu">
                <i class="fa fa-lg fa-cubes"></i>
                <?= __('Projects'); ?>
                <i class="fa submenu-arrow pull-right"></i>
            </a>
            <ul id="projects-submenu" class="collapse">
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']); ?>">
                        <i class="fa fa-list-ul"></i>
                        <?= __('List of projects'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'submit']); ?>">
                        <i class="fa fa-cube"></i>
                        <?= __('Submit a project'); ?>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#activities-submenu">
                <i class="fa fa-lg fa-calendar"></i>
                <?= __('Activities') ?>
                <i class="fa submenu-arrow pull-right"></i>
            </a>
            <ul id="activities-submenu" class="collapse">
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'news']); ?>">
                        <i class="fa fa-newspaper-o"></i>
                        <?= __('News'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'statistics']); ?>">
                        <i class="fa fa-pie-chart"></i>
                        <?= __('Statistics'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'calendar']); ?>">
                        <i class="fa fa-calendar"></i>
                        <?= __('Calendar'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'survey']); ?>">
                        <i class="fa fa-pencil-square-o"></i>
                        <?= __('Survey'); ?>
                   </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#partners-submenu">
                <i class="fa fa-lg fa-users"></i>
                <?= __('Partners') ?>
                <i class="fa submenu-arrow pull-right"></i>
            </a>
            <ul id="partners-submenu" class="collapse">
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'industry']); ?>">
                        <i class="fa fa-industry"></i>
                        <?= __('Industry'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'academic']); ?>">
                        <i class="fa fa-graduation-cap"></i>
                        <?= __('Academic'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'association']); ?>">
                        <i class="fa fa-male"></i>
                        <?= __('Association'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'government']); ?>">
                        <i class="fa fa-bank"></i>
                        <?= __('Government'); ?>
                    </a>
                </li>
            </ul>
        </li>
        <?php if ($user && $user->hasRoleName(['Administrator'])): ?>
        <li class="<?= ($this->request->controller == 'Pages' && $this->request->action == 'administration') ? 'active' : ''; ?>">
            <a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'administration']); ?>">
                <i class="fa fa-wrench  fa-lg"></i><?= __('Administration') ?>
            </a>
        </li>
        <?php endif; ?>
        <li>
            <a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'mission']); ?>">
                <i class="fa fa-question-circle fa-lg"></i>
                <span class="i-text"><?= __('About us') ?></span></a>
        </li>
        <li>
            <a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'contact']); ?>">
                <i class="fa fa-plug fa-lg"></i>
                <span class="i-text"><?= __('Contact us') ?></span></a>
        </li>
        <li>
            <a href="https://github.com/MaisonLogicielLibre/Website">
                <i class="fa fa-github fa-lg"></i>
                <span class="i-text"><?= __('Contribute') ?></span></a>
        </li>
        <li>
            <a href="https://twitter.com/ml2_ets">
                <i class="fa fa-twitter fa-lg"></i>
                <span class="i-text"><?= __('Follow us') ?></span></a>
        </li>
        <li>
            <a href="http://wiki.maisonlogiciellibre.org/doku.php?id=en:start">
                <i class="fa fa-file-word-o fa-lg"></i>
                <span class="i-text"><?= __('Our Wiki') ?></span></a>
        </li>
    </ul>
</div>
