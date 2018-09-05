<?php
  include('../engine/engine.inc');
  include('../engine/simplepie/simplepie.inc');
  include('activetopics.inc');

  $page = new Page;
  $page->setDescription(__('The Open Discussion forum is the fastest way to get help. A other way is a subscription to the support mailing list.'));
  $page->setKeywords(__('WinMerge, support, discussion forums, mailing lists, tracker, donate, bugs, support requests, patches, feature requests, todo, open source, sourceforge.net'));
  $page->printHead(__('Support'), TAB_SUPPORT);

  $page->printHeading(__('Support'));
  $page->printPara(__('The <a href="%s">Open Discussion forum</a> is the fastest way to get help. Please be patient, it may take some time for somebody to answer.', 'http://forums.winmerge.org/viewforum.php?f=4'),
                   __('A other way is a subscription to the <a href="%s">support mailing list</a>.', '#support'));
  $page->printPara(__('If you find a bug, please submit it as a <a href="%s">bug report</a>.', 'http://bugs.winmerge.org/'),
                   __('Please attach as much information as you can: at a minimum, the version number of WinMerge that you are using. If you can, also attach a configuration log which, you can display by clicking <span class="guimenu">Help</span> &#8594; <span class="guimenuitem">Configuration</span> in the WinMerge window.'),
                   __('Good information in a bug report makes it more likely that your bug will be fixed quickly.'));
  $page->printPara(__('You must <a href="%s">register with SourceForge.net</a> before posting a bug report (registration is free).', 'https://sourceforge.net/account/registration/'),
                   __('We require registering because anonymous submissions caused a lot of spam and also because there were no possibility to contact people for asking more information.'),
                   __('We rarely sent direct emails but you will get notifications when we ask questions in the bug item.'));
  $page->printPara(__('Wish list items on the <a href="%s">feature request list</a> will also be considered, but we make absolutely no promises.', 'http://feature-requests.winmerge.org/'));

  $page->printSubHeading(__('Active Forum Topics'));
  $activetopics = new Forum_ActiveTopics('http://forums.winmerge.org/');
  print("<ul class=\"rssfeeditems\">\n");
  foreach ($activetopics->getTopics(0, 5) as $topic) { //for all active topics...
    $lastPostLine = '';
    if ($topic->getLastPost() != null) {
        $lastPost = $topic->getLastPost();
        $lastPostLine = __('last post by <strong>%1$s</strong> at %2$s', $lastPost->getUser(), $lastPost->getDate(__('Y-m-d H:i')));
    }
    print("  <li><a href=\"".$topic->getLink()."\">".$topic->getTitle()."</a> <em>".$lastPostLine."</em></li>\n");
  }
  print("  <li><a href=\"http://forums.winmerge.org/search.php?st=0&amp;search_id=active_topics\">".__('View all active topics&hellip;')."</a></li>\n");
  print("</ul>\n");

  $page->printSubHeading(__('Mailing Lists'));
?>
<ul>
  <li><a href="#announce"><?php __e('Announce List');?></a></li>
  <li><a href="#support"><?php __e('Support List');?></a></li>
  <li><a href="#user"><?php __e('User List');?></a></li>
  <li><a href="#translate"><?php __e('Translate List');?></a></li>
  <li><a href="#development"><?php __e('Development List');?></a></li>
</ul>
<div class="infocard">
  <h3><a name="announce"><?php __e('Announce List');?></a></h3>
  <ul>
    <li><strong><?php __e('Low Traffic');?></strong></li>
    <li><a href="http://lists.sourceforge.net/mailman/listinfo/winmerge-announce"><?php __e('Subscribe');?></a></li>
    <li><a href="http://lists.sourceforge.net/mailman/listinfo/winmerge-announce"><?php __e('Unsubscribe');?></a></li>
    <li><a href="https://sourceforge.net/mailarchive/forum.php?forum_name=winmerge-announce"><?php __e('Archive');?></a></li>
  </ul>
  <p><?php __e('This list is only for announcing new releases of WinMerge.');?></p>
</div>
<div class="infocard">
  <h3><a name="support"><?php __e('Support List');?></a></h3>
  <ul>
    <li><strong><?php __e('Normal Traffic');?></strong></li>
    <li><a href="http://lists.sourceforge.net/mailman/listinfo/winmerge-support"><?php __e('Subscribe');?></a></li>
    <li><a href="http://lists.sourceforge.net/mailman/listinfo/winmerge-support"><?php __e('Unsubscribe');?></a></li>
    <li><a href="https://sourceforge.net/mailarchive/forum.php?forum_name=winmerge-support"><?php __e('Archive');?></a></li>
  </ul>
  <p><?php __e('You should ask all your support questions on this list.');?></p>
</div>
<div class="infocard">
  <h3><a name="user"><?php __e('User List');?></a></h3>
  <ul>
    <li><strong><?php __e('Normal Traffic');?></strong></li>
    <li><a href="http://lists.sourceforge.net/mailman/listinfo/winmerge-user"><?php __e('Subscribe');?></a></li>
    <li><a href="http://lists.sourceforge.net/mailman/listinfo/winmerge-user"><?php __e('Unsubscribe');?></a></li>
    <li><a href="https://sourceforge.net/mailarchive/forum.php?forum_name=winmerge-user"><?php __e('Archive');?></a></li>
  </ul>
  <p><?php __e('This list is for user related questions. Having questions posted to this list may allow others having the same problem to solve it on their own.');?></p>
</div>
<div class="infocard">
  <h3><a name="translate"><?php __e('Translate List');?></a></h3>
  <ul>
    <li><strong><?php __e('Low Traffic');?></strong></li>
    <li><a href="http://lists.sourceforge.net/mailman/listinfo/winmerge-translate"><?php __e('Subscribe');?></a></li>
    <li><a href="http://lists.sourceforge.net/mailman/listinfo/winmerge-translate"><?php __e('Unsubscribe');?></a></li>
    <li><a href="https://sourceforge.net/mailarchive/forum.php?forum_name=winmerge-translate"><?php __e('Archive');?></a></li>
  </ul>
  <p><?php __e('This list is used for coordinating the translations.');?></p>
</div>
<div class="infocard">
  <h3><a name="development"><?php __e('Development List');?></a></h3>
  <ul>
    <li><strong><?php __e('Normal Traffic');?></strong></li>
    <li><a href="http://lists.sourceforge.net/mailman/listinfo/winmerge-development"><?php __e('Subscribe');?></a></li>
    <li><a href="http://lists.sourceforge.net/mailman/listinfo/winmerge-development"><?php __e('Unsubscribe');?></a></li>
    <li><a href="https://sourceforge.net/mailarchive/forum.php?forum_name=winmerge-development"><?php __e('Archive');?></a></li>
  </ul>
  <p><?php __e('This is the list where participating developers of the WinMerge meet and discuss issues, code changes/additions, etc.');?></p>
</div>
<?php
  $page->printSubHeading(__('Donate'));
  $page->printPara(__('Since WinMerge is an <a href="%s">Open Source</a> project, you may use it free of charge.', '/source-code/'),
                   __('But please consider making a <a href="%s">donation</a> to support the continued development of WinMerge.', 'https://sourceforge.net/project/project_donations.php?group_id=13216'));

  $page->printSubHeading(__('Buy WinMerge merchandise'));
  $page->printPara(__('You can also support WinMerge by buying merchandise at the <a href="%s">WinMerge CafePress store</a>. 20%% of the sales goes to WinMerge.', 'http://www.cafepress.com/winmerge'));

  $page->printFoot();
?>
