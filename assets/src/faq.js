/**
 * FAQ page
 *
 * This Source Code Form is subject to the terms of the Mozilla Public License,
 * v. 2.0. If a copy of the MPL was not distributed with this file, You can
 * obtain one at http://mozilla.org/MPL/2.0/.
 *
 * @package phpMyFAQ
 * @author Thorsten Rinne
 * @copyright 2018-2022 phpMyFAQ Team
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License Version 2.0
 * @link https://www.phpmyfaq.de
 * @since 2018-01-06
 */

/*global $: false, hljs: false */

/**
 * HighlightJS
 *
 */
$('pre code').each((i, block) => {
  'use strict';
  hljs.highlightBlock(block);
});
