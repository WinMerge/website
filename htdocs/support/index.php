<?php
  include('../engine/engine.inc');
  include('../engine/simplepie/simplepie.inc');
  include('activetopics.inc');

  $page = new Page;
  $page->setDescription(__('The Open Discussion forum is the fastest way to get help. A other way is a subscription to the support mailing list.'));
  $page->setKeywords(__('WinMerge, support, discussion forums, mailing lists, tracker, donate, bugs, support requests, patches, feature requests, todo, open source, sourceforge.net'));
  $page->printHead(__('Support'), TAB_SUPPORT);

  $page->printHeading(__('Support'));
  $page->printPara(__('The <a href="%s">Open Discussion forum</a> is the fastest way to get help. Please be patient, it may take some time for somebody to answer.', 'https://forums.winmerge.org/viewforum.php?f=4'),
                   __('A other way is a subscription to the <a href="%s">support mailing list</a>.', '#mailing-lists'));
  $page->printPara(__('If you find a bug, please submit it as a <a href="%s">issue</a>.', 'https://github.com/WinMerge/winmerge/issues'),
                   __('Please attach as much information as you can: at a minimum, the version number of WinMerge that you are using. If you can, also attach a configuration log which, you can display by clicking <span class="guimenu">Help</span> &#8594; <span class="guimenuitem">Configuration</span> in the WinMerge window.'),
                   __('Good information in a bug report makes it more likely that your bug will be fixed quickly.'));
  $page->printPara(__('Wish list items on the <a href="%s">issues list</a> will also be considered, but we make absolutely no promises.', 'https://github.com/WinMerge/winmerge/issues'));

  $page->printSubHeading(__('Active Forum Topics'));
  $activetopics = new Forum_ActiveTopics('https://forums.winmerge.org/');
  print("<ul class=\"rssfeeditems\">\n");
  foreach ($activetopics->getTopics(0, 5) as $topic) { //for all active topics...
    $lastPostLine = '';
    if ($topic->getLastPost() != null) {
        $lastPost = $topic->getLastPost();
        $lastPostLine = __('last post by <strong>%1$s</strong> at %2$s', $lastPost->getUser(), $lastPost->getDate(__('Y-m-d H:i')));
    }
    print("  <li><a href=\"".$topic->getLink()."\">".$topic->getTitle()."</a> <em>".$lastPostLine."</em></li>\n");
  }
  print("  <li><a href=\"https://forums.winmerge.org/search.php?st=0&amp;search_id=active_topics\">".__('View all active topics&hellip;')."</a></li>\n");
  print("</ul>\n");

  $page->printAnchorSubHeading(__('Mailing Lists'), 'mailing-lists');
?>
<h4><?php __e('Announce List');?></h4>
<div class="indented">
  <p><?php __e('This list is only for announcing new releases of WinMerge.');?></p>
  <ul class="buttons">
    <li><a href="https://sourceforge.net/projects/winmerge/lists/winmerge-announce" class="button is-small is-success"><?php __e('Subscribe');?></a></li>
    <li><a href="https://sourceforge.net/projects/winmerge/lists/winmerge-announce/unsubscribe" class="button is-small is-danger"><?php __e('Unsubscribe');?></a></li>
    <li><a href="https://sourceforge.net/p/winmerge/mailman/winmerge-announce/" class="button is-small"><?php __e('Archive');?></a></li>
    <li><strong><?php __e('Low Traffic');?></strong></li>
  </ul>
</div> <!-- .indented -->
<h4><?php __e('Support List');?></em></h4>
<div class="indented">
  <p><?php __e('You should ask all your support questions on this list.');?></p>
  <ul class="buttons">
    <li><a href="https://sourceforge.net/projects/winmerge/lists/winmerge-support" class="button is-small is-success"><?php __e('Subscribe');?></a></li>
    <li><a href="https://sourceforge.net/projects/winmerge/lists/winmerge-support/unsubscribe" class="button is-small is-danger"><?php __e('Unsubscribe');?></a></li>
    <li><a href="https://sourceforge.net/p/winmerge/mailman/winmerge-support/" class="button is-small"><?php __e('Archive');?></a></li>
    <li><strong><?php __e('Normal Traffic');?></strong></li>
  </ul>
</div> <!-- .indented -->
<h4><?php __e('User List');?></h4>
<div class="indented">
  <p><?php __e('This list is for user related questions. Having questions posted to this list may allow others having the same problem to solve it on their own.');?></p>
  <ul class="buttons">
    <li><a href="https://sourceforge.net/projects/winmerge/lists/winmerge-user" class="button is-small is-success"><?php __e('Subscribe');?></a></li>
    <li><a href="https://sourceforge.net/projects/winmerge/lists/winmerge-user/unsubscribe" class="button is-small is-danger"><?php __e('Unsubscribe');?></a></li>
    <li><a href="https://sourceforge.net/p/winmerge/mailman/winmerge-user" class="button is-small"><?php __e('Archive');?></a></li>
    <li><strong><?php __e('Normal Traffic');?></strong></li>
  </ul>
</div> <!-- .indented -->
<h4><?php __e('Translate List');?></h4>
<div class="indented">
  <p><?php __e('This list is used for coordinating the translations.');?></p>
  <ul class="buttons">
    <li><a href="https://sourceforge.net/projects/winmerge/lists/winmerge-translate" class="button is-small is-success"><?php __e('Subscribe');?></a></li>
    <li><a href="https://sourceforge.net/projects/winmerge/lists/winmerge-translate/unsubscribe" class="button is-small is-danger"><?php __e('Unsubscribe');?></a></li>
    <li><a href="https://sourceforge.net/p/winmerge/mailman/winmerge-translate" class="button is-small"><?php __e('Archive');?></a></li>
    <li><strong><?php __e('Low Traffic');?></strong></li>
  </ul>
</div> <!-- .indented -->
<h4><?php __e('Development List');?></h4>
<div class="indented">
  <p><?php __e('This is the list where participating developers of the WinMerge meet and discuss issues, code changes/additions, etc.');?></p>
  <ul class="buttons">
    <li><a href="https://sourceforge.net/projects/winmerge/lists/winmerge-development" class="button is-small is-success"><?php __e('Subscribe');?></a></li>
    <li><a href="https://sourceforge.net/projects/winmerge/lists/winmerge-development/unsubscribe" class="button is-small is-danger"><?php __e('Unsubscribe');?></a></li>
    <li><a href="https://sourceforge.net/p/winmerge/mailman/winmerge-development" class="button is-small"><?php __e('Archive');?></a></li>
    <li><strong><?php __e('Normal Traffic');?></strong></li>
  </ul>
</div> <!-- .indented -->
<?php
  $page->printSubHeading(__('Donate'));
  $page->printPara(__('Since WinMerge is an <a href="%s">Open Source</a> project, you may use it free of charge.', '/source-code/'),
                   __('But please consider making a <a href="%s">donation</a> to support the continued development of WinMerge.', 'https://sourceforge.net/project/project_donations.php?group_id=13216'));

  $page->printSubHeading(__('Buy WinMerge merchandise'));
  $page->printPara(__('You can also support WinMerge by buying merchandise at the <a href="%s">WinMerge CafePress store</a>. 20%% of the sales goes to WinMerge.', 'http://www.cafepress.com/winmerge'));

  $page->printFoot();
?>
