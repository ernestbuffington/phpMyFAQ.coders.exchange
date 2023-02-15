<?php

/**
 * Frontend to edit an instance.
 *
 * This Source Code Form is subject to the terms of the Mozilla Public License,
 * v. 2.0. If a copy of the MPL was not distributed with this file, You can
 * obtain one at http://mozilla.org/MPL/2.0/.
 *
 * @package   phpMyFAQ
 * @author    Thorsten Rinne <thorsten@phpmyfaq.de>
 * @copyright 2012-2022 phpMyFAQ Team
 * @license   http://www.mozilla.org/MPL/2.0/ Mozilla Public License Version 2.0
 * @link      https://www.phpmyfaq.de
 * @since     2012-04-16
 */

use phpMyFAQ\Filter;
use phpMyFAQ\Instance;
use phpMyFAQ\Strings;

if (!defined('IS_VALID_PHPMYFAQ')) {
    http_response_code(400);
    exit();
}
?>
  <header class="row">
    <div class="col-lg-12">
      <h2 class="page-header">
        <i aria-hidden="true" class="fa fa-wrench"></i> <?= $PMF_LANG['ad_menu_instances']; ?>
      </h2>
    </div>
  </header>
<?php
if ($user->perm->hasPermission($user->getUserId(), 'editinstances')) {
    $instanceId = Filter::filterInput(INPUT_GET, 'instance_id', FILTER_VALIDATE_INT);

    $instance = new Instance($faqConfig);
    $instanceData = $instance->getInstanceById($instanceId);

    ?>
  <form action="?action=updateinstance" method="post" accept-charset="utf-8">
    <input type="hidden" name="instance_id" value="<?= $instanceData->id ?>"/>
    <div class="form-group row">
      <label for="url" class="col-lg-2 col-form-label"><?= $PMF_LANG['ad_instance_url'] ?>:</label>
      <div class="col-lg-8">
        <input type="url" name="url" id="url" class="form-control"
               value="<?= Strings::htmlentities($instanceData->url, ENT_QUOTES) ?>" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="instance" class="col-lg-2 col-form-label"><?= $PMF_LANG['ad_instance_path'] ?>:</label>
      <div class="col-lg-8">
        <input type="text" name="instance" id="instance" class="form-control" required
               value="<?= Strings::htmlentities($instanceData->instance, ENT_QUOTES) ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="comment" class="col-lg-2 col-form-label"><?= $PMF_LANG['ad_instance_name'] ?>:</label>
      <div class="col-lg-8">
        <input type="text" name="comment" id="comment" class="form-control" required
               value="<?= Strings::htmlentities($instanceData->comment, ENT_QUOTES) ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-lg-2 col-form-label"><?= $PMF_LANG['ad_instance_config'] ?>:</label>
      <div class="col-lg-8">
        <p class="form-control-static">
            <?php
            foreach ($instance->getInstanceConfig($instanceData->id) as $key => $config) {
                echo '<span class="uneditable-input">' . $key . ': ' . $config . '</span><br/>';
            }
            ?>
        </p>
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-lg-2 col-lg-4">
        <button class="btn btn-primary" type="submit">
            <?= $PMF_LANG['ad_instance_button'] ?>
        </button>
        <a class="btn btn-info" href="?action=instances">
            <?= $PMF_LANG['ad_entry_back'] ?>
        </a>
      </div>
    </div>
  </form>
    <?php
} else {
    echo $PMF_LANG['err_NotAuth'];
}
