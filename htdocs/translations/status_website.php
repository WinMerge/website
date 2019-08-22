<?php
  include('../engine/engine.inc');
  include('translations.inc');

  $page = new Page;
  $page->printHead(__('Translations Status (Website)'), TAB_TRANSLATIONS);

  $page->printHeading(__('Translations Status (Website)'));
  $page->printPara(__('We moved the sources from the website to a own <a href="%1$s">GitHub repository</a>.', 'https://github.com/winmerge/website'));
  
  try {
    $status = New TranslationsStatus('status-website.xml');

    $page->printSubHeading(__('Translators'));
    $status->printTranslators();
    
    $page->printSubHeading(__('Website Status <em>from %s</em>', $status->getUpdateDate()));
    $status->printProjectTable('Website', 'https://github.com/WinMerge/website/blob/master/po/');
  }
  catch (Exception $ex) { //If problems with translations status...
    $page->printPara(__('The translations status is currently not available...'));
  }
  
  $page->printFoot();
?>