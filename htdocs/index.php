<?php
  include('engine/engine.inc');
  include('engine/simplepie/simplepie.inc');

  $page = new Page;
  $page->setDescription(__('WinMerge is an Open Source differencing and merging tool for Windows. WinMerge can compare both folders and files, presenting differences in a visual text format that is easy to understand and handle.'));
  $page->setKeywords(__('WinMerge, free, open source, Windows, windiff, diff, merge, compare, tool, utility, text, file, folder, directory, compare files, compare folders, merge files, merge folders, diff tool, merge tool, compare tool'));
  $page->addRssFeed('https://sourceforge.net/export/rss2_projnews.php?group_id=13216', __('Project News'));
  $page->printHead('', TAB_HOME);
  $stablerelease = $page->getStableRelease();
  
  $page->printHeading(__('What is WinMerge?'));
  $page->printPara(__('WinMerge is an <a href="%s">Open Source</a> differencing and merging tool for Windows. WinMerge can compare both folders and files, presenting differences in a visual text format that is easy to understand and handle.', 'source-code/'));
?>
<p><strong><?php __e('<a href="%1$s">Learn More</a> or <a href="%2$s">Download Now!</a>', 'about/', 'downloads/');?></strong></p>
<?php
  $page->printSubHeading(__('Screenshot'));
?>
<p><img class="image" src="about/screenshots/screenshot.png" alt="<?php __e('File Comparison');?>" width="792" height="519" border="0"></p>
<?php
  $page->printPara(__('See the <a href="%s">screenshots page</a> for more screenshots.', 'about/screenshots/'));

  $page->printSubHeading(__('WinMerge %s - latest stable version', $stablerelease->getVersionNumber()));
  $page->printPara(__('<a href="%1$s">WinMerge %2$s</a> is the latest stable version, and is recommended for most users.', 'downloads/', $stablerelease->getVersionNumber()));
  $page->printDownloadNow();

  $page->printRssSubHeading(__('Project News'), 'https://sourceforge.net/export/rss2_projnews.php?group_id=13216');
  $feed = new SimplePie();
  $feed->set_feed_url('https://sourceforge.net/export/rss2_projnews.php?group_id=13216');
  $feed->set_cache_location('./engine/simplepie/cache');
  $feed->init();
  print("<ul class=\"rssfeeditems\">\n");
  foreach ($feed->get_items(0, 5) as $item) { //for the last 5 news items...
    print("  <li><a href=\"".$item->get_link()."\">".$item->get_title()."</a> <em>".$item->get_date(__('Y-m-d'))."</em></li>\n");
  }
  print("  <li><a href=\"https://sourceforge.net/news/?group_id=13216\">" . __('View all news&hellip;') . "</a></li>\n");
  print("</ul>\n");

  $page->printSubHeading(__('Support'));
  $page->printPara(__('If you need support, look at our <a href="%s">support page</a> for more information how you can get it.', 'support/'));

  $page->printSubHeading(__('Developers'));
  $page->printPara(__('WinMerge is an open source project, which means that the program is maintained and developed by volunteers.'));
  $page->printPara(__('In addition, WinMerge is translated into a number of different languages. See our <a href="%s">information on translating WinMerge</a> into your own language.', 'translations/'));

  $page->printFoot();
?>
