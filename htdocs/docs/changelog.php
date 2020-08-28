<?php
  include('../engine/engine.inc');
  
  $page = new Page;
  $page->setDescription(__('The change log is a more complete list of changes in the last WinMerge releases.'));
  $page->setKeywords(__('WinMerge, change log, changes, release, tracker item, revision number'));
  $page->printHead(__('Change Log'), TAB_DOCS);
  $changelog = $page->getContentFromHtmlFile('ChangeLog.html');
  if ($changelog == '')
    $page->printPara(__('The change log is currently not available...'));
  else 
    print($changelog);
  $page->printFoot();
?>