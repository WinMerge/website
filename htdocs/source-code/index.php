<?php
  include('../engine/engine.inc');
  include('../engine/simplepie/simplepie.inc');

  $recentCommitsFeed = 'https://github.com/WinMerge/winmerge/commits/master.atom';

  $page = new Page;
  $page->setDescription(__('Download the source code of WinMerge, which is released under the GNU General Public License.'));
  $page->setKeywords(__('WinMerge, free, clone, download, source code, GPL, GitHub, Git'));
  $page->addRssFeed($recentCommitsFeed, __('Recent Commits'));
  $page->printHead(__('Source Code'), TAB_SOURCE_CODE);
  
  $page->printHeading(__('Source Code'));

  $page->printPara(__('WinMerge is <a href="%1$s">Open Source</a> software under the <a href="%2$s">GNU General Public License</a>.', 'https://www.opensource.org/', 'https://www.gnu.org/licenses/gpl-2.0.html'));
  $page->printPara(__('This means everybody can download the <a href="%s">source code</a> and improve and modify it.
The only thing we ask is that people submit their improvements and modifications back to us so that all WinMerge users may benefit.', '#clone-or-download'));
  
  $page->printAnchorSubHeading(__('GNU General Public License'), 'gpl');
?>
<pre lang="en" class="indented">WinMerge is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

WinMerge is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with WinMerge.  If not, see &lt;<a href="https://www.gnu.org/licenses/">http://www.gnu.org/licenses/</a>&gt;.</pre>
<?php
  $page->printAnchorSubHeading(__('Clone or download'), 'clone-or-download');
  $page->printPara(__('The source code is hosted on <a href="%1$s">GitHub</a> in a <a href="%2$s">Git</a> repository:', 'https://github.com/', 'https://git-scm.com/'));
  $page->printPara('<a href="https://github.com/winmerge/winmerge.git" class="button is-small">https://github.com/winmerge/winmerge.git</a>');

  $page->printRssSubHeading(__('Recent Commits'), $recentCommitsFeed);
  $feed = new SimplePie();
  $feed->set_feed_url($recentCommitsFeed);
  $feed->set_cache_location('../engine/simplepie/cache');
  $feed->init();
  print("<ul class=\"rssfeeditems\">\n");
  foreach ($feed->get_items(0, 10) as $item) { //for the last 10 commits...
    $title = strip_tags($item->get_title());
    $link = $item->get_link();
    $date = $item->get_date(__('Y-m-d H:i'));
    print("  <li><a href=\"$link\">$title</a> <em>$date</em></li>\n");
  }
  print("  <li><a href=\"https://github.com/WinMerge/winmerge/commits/master\">" . __('View all commits&hellip;') . "</a></li>\n");
  print("</ul>\n");

  $page->printFoot();
?>
