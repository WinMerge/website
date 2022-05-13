<?php
  include('../engine/engine.inc');

  $page = new Page;
  $page->setDescription(__('The Open Discussion forum is the fastest way to get help.'));
  $page->setKeywords(__('WinMerge, support, discussion forums, tracker, donate, bugs, support requests, patches, feature requests, todo, open source'));
  $page->printHead(__('Support'), TAB_SUPPORT);

  $page->printHeading(__('Support'));
  $page->printPara(__('The <b>Discussion forums</b> are the fastest way to get help:'));
?>
<ul>
  <li><a href="https://github.com/WinMerge/winmerge/discussions"><?php __e('WinMerge discussions');?></a></li>
  <li><a href="https://github.com/WinMerge/winimerge/discussions"><?php __e('Image Compare discussions');?></a></li>
  <li><a href="https://github.com/WinMerge/website/discussions"><?php __e('Website discussions');?></a></li>
</ul>
<p><em><?php __e('Please be patient, it may take some time for somebody to answer.');?></em></p>
<?php
  $page->printSubHeading(__('Issues'));
  $page->printPara(__('If you find a bug, please submit it as a <a href="%s">issue</a>.', 'https://github.com/WinMerge/winmerge/issues'),
                   __('Please attach as much information as you can: at a minimum, the version number of WinMerge that you are using. If you can, also attach a configuration log which, you can display by clicking <span class="guimenu">Help</span> &#8594; <span class="guimenuitem">Configuration</span> in the WinMerge window.'),
                   __('Good information in a bug report makes it more likely that your bug will be fixed quickly.'));
  $page->printPara(__('Wish list items on the <a href="%s">issues list</a> will also be considered, but we make absolutely no promises.', 'https://github.com/WinMerge/winmerge/issues'));

  $page->printSubHeading(__('Donate'));
  $page->printPara(__('Since WinMerge is an <a href="%s">Open Source</a> project, you may use it free of charge.', $translations->prepareLink('source-code/')),
                   __('But please consider making a <a href="%s">donation</a> to support the continued development of WinMerge.', 'https://sourceforge.net/project/project_donations.php?group_id=13216'));

  $page->printSubHeading(__('Buy WinMerge merchandise'));
  $page->printPara(__('You can also support WinMerge by buying merchandise at the <a href="%s">WinMerge CafePress store</a>. 20%% of the sales goes to WinMerge.', 'http://www.cafepress.com/winmerge'));

  $page->printFoot();
?>
