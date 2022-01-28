<?php
  include('engine/engine.inc');

  $page = new Page;
  $page->setDescription(__('WinMerge is an Open Source differencing and merging tool for Windows. WinMerge can compare both folders and files, presenting differences in a visual text format that is easy to understand and handle.'));
  $page->setKeywords(__('WinMerge, free, open source, Windows, windiff, diff, merge, compare, tool, utility, text, file, folder, directory, compare files, compare folders, merge files, merge folders, diff tool, merge tool, compare tool'));
  $page->printHead('', TAB_HOME);
  $stablerelease = $page->getStableRelease();
  
  $page->printHeading(__('What is WinMerge?'));
  $page->printPara(__('WinMerge is an <a href="%s">Open Source</a> differencing and merging tool for Windows. WinMerge can compare both folders and files, presenting differences in a visual text format that is easy to understand and handle.', $translations->prepareLink('source-code/')));

  $page->printSubHeading(__('Screenshot'));
?>
<p><img class="image" src="screenshots/filecmp.png" alt="<?php __e('File Comparison');?>" border="0"></p>
<?php
  $page->printPara(__('See the <a href="%s">screenshots page</a> for more screenshots.', $translations->prepareLink('screenshots/')));

  $page->printSubHeading(__('Features'));
  $page->printPara(__('WinMerge is highly useful for determining what has changed between project versions, and then merging changes between versions. WinMerge can be used as an external differencing/merging tool or as a standalone application.'));
  $page->printPara(__('In addition, WinMerge has many helpful supporting features that make comparing, synchronising, and merging as easy and useful as possible:'));
?>
<h4><?php __e('General');?></h4>
<ul>
  <li><?php __e('Supports Microsoft Windows XP SP3 or newer');?></li>
  <li><?php __e('Handles Windows, Unix and Mac text file formats');?></li>
  <li><?php __e('Unicode support');?></li>
  <li><?php __e('Tabbed interface');?></li>
</ul>
<h4><?php __e('File Compare');?></h4>
<ul>
  <li><?php __e('3-way File Comparison');?> <span class="tag is-success"><?php __e('New!');?></span></li>
  <li><?php __e('Visual differencing and merging of text files');?></li>
  <li><?php __e('Flexible editor with syntax highlighting, line numbers and word-wrap');?></li>
  <li><?php __e('Highlights differences inside lines');?></li>
  <li><?php __e('Difference pane shows current difference in two vertical panes');?></li>
  <li><?php __e('Location pane shows map of files compared');?></li>
  <li><?php __e('Moved lines detection');?></li>
</ul>
<h4><?php __e('Folder Compare');?></h4>
<ul>
  <li><?php __e('Regular Expression based file filters allow excluding and including items');?></li>
  <li><?php __e('Fast compare using file sizes and dates');?></li>
  <li><?php __e('Compares one folder or includes all subfolders');?></li>
  <li><?php __e('Can show folder compare results in a tree-style view');?></li>
  <li><?php __e('3-way Folder Comparison');?></span></li>
</ul>
<h4><?php __e('Image Compare');?> <span class="tag is-success"><?php __e('New!');?></span></h4>
<ul>
  <li><?php __e('Support many types of images');?></li>
  <li><?php __e('Can highlight the differences with blocks');?></li>
  <li><?php __e('Overlaying of the pictures is possible');?></li>
</ul>
<h4><?php __e('Table Compare');?> <span class="tag is-success"><?php __e('New!');?></span></h4>
<ul>
  <li><?php __e('Shows CSV/TSV file contents in table format');?></li>
  <li><?php __e('Text can be wrapped for each column');?></li>
</ul>
<h4><?php __e('Version Control');?></h4>
<ul>
  <li><?php __e('Creates patch files (Normal-, Context- and Unified formats)');?></li>
  <li><?php __e('Resolve conflict files');?></li>
</ul>
<h4><?php __e('Other');?></h4>
<ul>
  <li><?php __e('Shell Integration (supports 64-bit Windows versions)');?></li>
  <li><?php __e('Archive file support using 7-Zip');?></li>
  <li><?php __e('Plugin support');?></li>
  <li><?php __e('Localizable interface');?></li>
  <li><?php __e('<a href="%s">Online manual</a> and installed HTML Help manual', 'https://manual.winmerge.org/en/');?></li>
</ul>
<?php
  $page->printSubHeading(__('WinMerge %s - latest stable version', $stablerelease->getVersionNumber()));
  $page->printPara(__('<a href="%1$s">WinMerge %2$s</a> is the latest stable version, and is recommended for most users.', $translations->prepareLink('downloads/'), $stablerelease->getVersionNumber()));

  $page->printSubHeading(__('Support'));
  $page->printPara(__('If you need support, look at our <a href="%s">support page</a> for more information how you can get it.', $translations->prepareLink('support/')));

  $page->printSubHeading(__('Developers'));
  $page->printPara(__('WinMerge is an open source project, which means that the program is maintained and developed by volunteers.'));
  $page->printPara(__('In addition, WinMerge is translated into a number of different languages. See our <a href="%s">information on translating WinMerge</a> into your own language.', $translations->prepareLink('translations/')));

  $page->printFoot();
?>
