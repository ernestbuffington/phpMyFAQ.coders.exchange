/**
 * JavaScript functions for all phpMyFAQ configuration stuff
 *
 * This Source Code Form is subject to the terms of the Mozilla Public License,
 * v. 2.0. If a copy of the MPL was not distributed with this file, You can
 * obtain one at http://mozilla.org/MPL/2.0/.
 *
 * @package   phpMyFAQ
 * @author    Thorsten Rinne <thorsten@phpmyfaq.de>
 * @copyright 2013-2022 phpMyFAQ Team
 * @license   http://www.mozilla.org/MPL/2.0/ Mozilla Public License Version 2.0
 * @link      https://www.phpmyfaq.de
 * @since     2013-11-17
 */

document.addEventListener('DOMContentLoaded', () => {
  'use strict';

  let tabLoaded = false;

  $('a[data-toggle="tab"]').on('shown.bs.tab', (event) => {
    event.preventDefault();

    const target = $(event.target).attr('href');

    // Clear previous active tab
    const relatedTarget = $(event.relatedTarget).attr('href');
    $(relatedTarget).empty();

    $.get(
      'index.php',
      {
        action: 'ajax',
        ajax: 'config_list',
        conf: target.substr(1),
      },
      (data) => {
        $(target).empty().append(data);
      }
    );

    tabLoaded = true;
  });

  if (!tabLoaded) {
    $.get(
      'index.php',
      {
        action: 'ajax',
        ajax: 'config_list',
        conf: 'main',
      },
      (data) => {
        $('#main').empty().append(data);
      }
    );
  }
});
