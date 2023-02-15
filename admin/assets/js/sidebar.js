/**
 * Loads the correct sidebar on window load,
 * collapses the sidebar on window resize.
 *
 * This Source Code Form is subject to the terms of the Mozilla Public License,
 * v. 2.0. If a copy of the MPL was not distributed with this file, You can
 * obtain one at http://mozilla.org/MPL/2.0/.
 *
 * @package phpMyFAQ
 * @author Thorsten Rinne <thorsten@phpmyfaq.de>
 * @copyright 2014-2022 phpMyFAQ Team
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License Version 2.0
 * @link https://www.phpmyfaq.de
 * @since 2014-03-22
 */

document.addEventListener('DOMContentLoaded', () => {
  'use strict';

  $(window).bind('load resize', function () {
    if ($(this).width() < 768) {
      $('div.sidebar-collapse').addClass('collapse');
    } else {
      $('div.sidebar-collapse').removeClass('collapse');
    }
  });
});
