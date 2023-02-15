<?php

/**
 * The login form.
 *
 * This Source Code Form is subject to the terms of the Mozilla Public License,
 * v. 2.0. If a copy of the MPL was not distributed with this file, You can
 * obtain one at http://mozilla.org/MPL/2.0/.
 *
 * @package phpMyFAQ
 * @author Thorsten Rinne <thorsten@phpmyfaq.de>
 * @author Alexander M. Turek <me@derrabus.de>
 * @copyright 2005-2022 phpMyFAQ Team
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License Version 2.0
 * @link https://www.phpmyfaq.de
 * @since 2013-02-05
 */

if (isset($error) && 0 < strlen($error)) {
    $message = sprintf(
        '<p class="alert alert-danger alert-dismissible fade show mt-3">%s%s</p>',
        '<button type="button" class="close" data-dismiss="alert">' .
        '<span aria-hidden="true">&times;</span>' .
        '</button>',
        $error
    );
} else {
    $message = sprintf('<p>%s</p>', $PMF_LANG['ad_auth_insert']);
}
if ($action == 'logout') {
    $message = sprintf(
        '<p class="alert alert-success alert-dismissible fade show mt-3">%s%s</p>',
        '<button type="button" class="close" data-dismiss="alert">' .
        '<span aria-hidden="true">&times;</span>' .
        '</button>',
        $PMF_LANG['ad_logout']
    );
}
if ((isset($_SERVER['HTTPS']) && strtoupper($_SERVER['HTTPS']) === 'ON') || !$faqConfig->get('security.useSslForLogins')) {
    ?>

<div class="container py-5">
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="card rounded-0" id="login-form">
            <div class="card-header">
              <h3 class="mb-0">phpMyFAQ Login</h3>
                <?= $message ?>
            </div>
            <div class="card-body">
              <form action="<?= $faqSystem->getSystemUri($faqConfig) ?>admin/index.php" method="post"
                    accept-charset="utf-8" role="form" class="pmf-form-login">
                <input type="hidden" name="redirect-action" value="<?= $action ?>">
                <div class="form-group">
                  <label for="faqusername"><?= $PMF_LANG['ad_auth_user'] ?></label>
                  <input type="text" class="form-control form-control-lg rounded-0" name="faqusername" id="faqusername"
                         required>
                </div>
                <div class="form-group">
                  <label for="faqpassword"><?= $PMF_LANG['ad_auth_passwd'] ?></label>
                  <input type="password" autocomplete="off" class="form-control form-control-lg rounded-0" id="faqpassword"
                         name="faqpassword" required>
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <input type="checkbox" id="faqrememberme" name="faqrememberme" value="rememberMe"
                           class="form-check-input">
                    <label class="form-check-label" for="faqrememberme">
                        <?= $PMF_LANG['rememberMe'] ?>
                    </label>
                  </div>
                </div>
                  <div class="form-group">
                  <p>
                      <?php if ($faqConfig->get('security.enableRegistration')) { ?>
                        <a href="../?action=register">
                            <?= $PMF_LANG['msgRegistration'] ?>
                        </a>
                      <?php } ?>
                      <br>
                    <a href="../?action=password">
                        <?= $PMF_LANG['lostPassword'] ?>
                    </a>
                  </p>
                </div>
                <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">
                    <?= $PMF_LANG['msgLoginUser'] ?>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <?php
} else {
    printf(
        '<p><a href="https://%s%s">%s</a></p>',
        $_SERVER['HTTP_HOST'],
        $_SERVER['REQUEST_URI'],
        $PMF_LANG['msgSecureSwitch']
    );
}
