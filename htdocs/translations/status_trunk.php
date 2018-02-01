<?php
  include('../engine/engine.inc');
  include('translations.inc');

  $page = new Page;
  $page->addRssFeed('status_trunk_rss.php');
  $page->printHead(__('Translations Status (Unstable Trunk)'), TAB_TRANSLATIONS);
  
  $page->printRssHeading(__('Translations Status (Unstable Trunk)'), 'status_trunk_rss.php');
  try {
    $status = New TranslationsStatus('status_trunk.xml');
    $status->srcUrl = 'https://bitbucket.org/winmerge/winmerge/src/default/Translations/';
    $status->printTOC();
    $status->printStatus();
    $status->printTranslators();
  }
  catch (Exception $ex) { //If problems with translations status...
    $page->printPara(__('The translations status is currently not available...'));
  }
  $page->printFoot();
?>