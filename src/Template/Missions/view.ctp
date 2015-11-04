<div class="row">
<?= $this->cell('Sidebar::mission', [$mission->id]); ?>
<?php $Parsedown = new Parsedown(); ?>
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
    <div class="row-fluid">
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-pading">
            <div class="clearfix">
                <h2 class="pull-left">
                    <?= $mission->getName() ?>
                </h2>
                <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'contact']); ?>"><h2 class="btn btn-danger pull-right"><?= __('Postulate!'); ?></h2></a>
            </div>
                <div class="bs-callout bs-callout-warning">
                    <h4><?= __('Description'); ?></h4>

                    <p><?= $Parsedown->text($mission->getDescription()); ?></p>
                </div>

                </p>
                <div class="bs-callout bs-callout-primary">
                    <h4><?= __('Skills'); ?></h4>

                    <p><?= $Parsedown->text($mission->getCompetence()); ?></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding-right:0;">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= __('Information on the mission'); ?></h3>
                    </div>
                    <table class="table table-striped table-responsive">
                        <tr>
                            <td style="white-space:pre"><strong><?= __('Term:'); ?></strong></td>
                            <td><?= $mission->getSession(); ?></td>
                        </tr>
                        <tr>
                            <td style="white-space:pre"><strong><?= __('Length:'); ?></strong></td>
                            <td><?= $mission->getLength(); ?></td>
                        </tr>
                        <tr>
                            <td style="white-space:pre"><strong><?= __('Places available:'); ?></strong></td>
                            <td><?= $mission->getInternNbr(); ?></td>
                        </tr>
                        <tr>
                            <td style="white-space:pre"><strong><?= __('School year:'); ?></strong></td>
                            <td><?= implode(', ', array_map(function ($v) {
                                    return $v->getName();
                                }, $mission->getLevels())) ?></td>
                        </tr>
                        <tr>
                            <td style="white-space:pre"><strong><?= __('Looking for:'); ?></strong></td>
                            <td><?= implode(', ', array_map(function ($v) {
                                    return $v->getName();
                                }, $mission->getType())) ?></td>
                        </tr>
                        <tr>
                            <td style="white-space:pre"><strong><?= __('Mentor:'); ?></strong></td>
                            <td>
                                <a href="<?= $this->Url->Build(['controller' => 'users', 'action' => 'view', $mission->getMentorId()]); ?>"><?= $mission->getMentor()->getName(); ?></a>
                            </td>
                        </tr>
                    </table>
                </div>
                <?php foreach ($mission->getProject()->getOrganizations() as $org): ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= __('Company information'); ?></h3>
                        </div>
                        <table class="table table-bordered table-responsive">
                            <tr>
                                <td style="border-right:none;"><strong><?= __('Company:'); ?></strong></td>
                                <td style="border-left:none"><?= $org->getName(); ?></td>
                            </tr>
                            <?php if (!empty($org->getWebsite())) : ?>
                                <tr>
                                    <td style="border-right:none;"><strong><?= __('Website:'); ?></strong></td>
                                    <td style="border-left:none;"><a
                                            href="<?= $org->getWebsite(); ?>"><?= $org->getWebsite() ?></a></td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td style="border-right:none;"><strong><?= __('Full company details'); ?></strong></td>
                                <td style="border-left:none;"><a
                                        href="<?= $this->Url->Build(['controller' => 'Organizations', 'action' => 'view', $org->getId()]); ?>"><?= __('See'); ?></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>