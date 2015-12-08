<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="page-action">
        <div class="page-header">
            <img
                src="<?= 'http://www.gravatar.com/avatar/' . (!empty($object) ? md5($object->getEmail()) : md5('no@email.com')) . '?s=128' ?>"
                class="img-circle img-responsive"/>
            <span><?= (!empty($object) ? $object->getName() : ''); ?></span>
            <?php if (!empty($object) && $object->getPortfolio() != null): ?>
                <a href="<?= $object->getPortfolio() ?>"><i class="fa fa-globe"></i></a>
            <?php endif; ?>
            <?php if (!empty($object) && $object->getTwitter() != null): ?>
                <a href="https://twitter.com/<?= $object->getTwitter() ?>"><i class="fa fa-twitter"></i></a>
            <?php endif; ?>
            <?php if (!empty($object) && $object->getFacebook() != null): ?>
                <a href="https://www.facebook.com/<?= $object->getFacebook() ?>"><i class="fa fa-facebook"></i></a>
            <?php endif; ?>
            <?php if (!empty($object) && $object->getGooglePlus() != null): ?>
                <a href="<?= $object->getGooglePlus() ?>"><i class="fa fa-google-plus"></i></a>
            <?php endif; ?>
            <?php if (!empty($object) && $object->getLinkedIn() != null): ?>
                <a href="<?= $object->getLinkedIn() ?>"><i class="fa fa-linkedin"></i></a>
            <?php endif; ?>
        </div>
        <ul class="nav nav-stacked">
            <?php if ($user):
                if (($user->hasPermissionName(['edit_user']) && $isOwner) || $user->hasPermissionName(['edit_users'])):
                    ?>
                    <li class="<?= ($this->request->action == 'view') ? 'active' : ''; ?>">
                        <a href="<?= $this->Url->build(
                            [
                                "controller" => "Users",
                                "action" => "view",
                                $object->id
                            ]); ?>">
                            <i class="fa fa-user"></i>
                            <?= __('My profile') ?>
                        </a>
                    </li>
                    <li class="<?= ($this->request->action == 'email') ? 'active' : ''; ?>">
                        <a href="<?= $this->Url->build(
                            [
                                "controller" => "Users",
                                "action" => "email",
                                $object->id
                            ]); ?>">
                            <i class="fa fa-envelope"></i>
                            <?= __('Change my email') ?>
                        </a>
                    </li>
					<li class="<?= ($this->request->action == 'password') ? 'active' : ''; ?>">
                        <a href="<?= $this->Url->build(
                            [
                                "controller" => "Users",
                                "action" => "password",
                                $object->id
                            ]); ?>">
                            <i class="fa fa-unlock"></i>
                            <?= __('Change my password') ?>
                        </a>
                    </li>
					<li class="<?= ($this->request->action == 'svn') ? 'active' : ''; ?>">
                        <a href="<?= $this->Url->build(
                            [
                                "controller" => "Users",
                                "action" => "svn",
                                $object->id
                            ]); ?>">
                            <i class="fa fa-code-fork"></i>
                            <?= __('Edit CVS') ?>
                        </a>
                    </li>
                    <!-- Modify phone link/form -->
                    <li class="<?= ($this->request->action == 'edit') ? 'active' : ''; ?>">
                        <a href="<?= $this->Url->build(
                            [
                                "controller" => "Users",
                                "action" => "edit",
                                $object->id
                            ]); ?>">
                            <i class="fa fa-pencil"></i>
                            <?= __('Edit my profile') ?></a>
                    </li>
                <?php else: ?>
                    <li class="<?= ($this->request->action == 'view') ? 'active' : ''; ?>">
                        <a href="<?= $this->Url->build(
                            [
                                "controller" => "Users",
                                "action" => "view",
                                $object->id
                            ]); ?>">
                            <i class="fa fa-user"></i>
                            <?= __('Profile') ?>
                        </a>
                    </li>
                <?php endif; ?>
                <?php
                if (($user->hasPermissionName(['delete_user']) && $isOwner) || $user->hasPermissionName(['delete_users'])):
                    ?>
                    <li class="<?= ($this->request->action == 'delete') ? 'active' : ''; ?>">
                        <a href="<?= $this->Url->build(
                            [
                                "controller" => "Users",
                                "action" => "delete",
                                $object->id
                            ]); ?>">
                            <i class="fa fa-trash"></i>
                            <?= __('Delete my account') ?></a>
                    </li>
                    <?php
                endif;
            else: ?>
                <li class="<?= ($this->request->action == 'view') ? 'active' : ''; ?>">
                    <a href="<?= $this->Url->build(
                        [
                            "controller" => "Users",
                            "action" => "view",
                            $object->id
                        ]); ?>">
                        <i class="fa fa-user"></i>
                        <?= __('Profile') ?>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>