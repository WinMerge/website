<?php
  include('../engine/engine.inc');

  $page = new Page;
  $page->setDescription(__('Documentation from WinMerge like manual, release notes, change log and Development Wiki.'));
  $page->setKeywords(__('WinMerge, documentation, manual, release notes, known issues, change log, Development Wiki'));
  $page->printHead(__('Documentation'), TAB_DOCS);

  $page->printHeading(__('Documentation'));
  $page->printSubHeading(__('Manual'));
  $page->printPara(__('The <a href="%s">manual</a> explains how to use WinMerge, and documents its capabilities and limitations.', 'https://manual.winmerge.org/en/'), 
                   __('It is currently available in the following languages:'));
?>
<ul class="buttons">
  <li><a href="https://manual.winmerge.org/en/" class="button is-small"><?php __e('English');?></a></li>
  <li><a href="https://manual.winmerge.org/jp/" class="button is-small"><?php __e('Japanese');?></a></li>
</ul>
<?php
  $page->printLinkedSubHeading(__('Release Notes'), 'releasenotes.php');
  $page->printPara(__('The <a href="%1$s">release notes</a> are a short summary of important changes, enhancements, bug fixes and <a href="%2$s">known issues</a> in the current WinMerge release.', 'releasenotes.php', 'releasenotes.php#known-issues'));
  $page->printLinkedSubHeading(__('Change Log'), 'changelog.php');
  $page->printPara(__('The <a href="%s">change log</a> is a more complete list of changes in the last WinMerge releases.', 'changelog.php'));
  //$page->printLinkedSubHeading(__('Development Wiki'), 'http://wiki.winmerge.org/');
  //$page->printPara(__('The <a href="%s">Development Wiki</a> contains much information about the WinMerge development.', 'http://wiki.winmerge.org/'));

  $page->printFoot();
?>