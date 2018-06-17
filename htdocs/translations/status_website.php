<?php
  include('../engine/engine.inc');
  include('translations.inc');

  $page = new Page;
  $page->printHead(__('Translations Status (Website)'), TAB_TRANSLATIONS);

  $page->printHeading(__('Translations Status (Website)'));
  $page->printPara(__('We moved the sources from the website to a own <a href="%1$s">Bitbucket Mercurial repository</a>.', 'https://bitbucket.org/winmerge/website'));
  
  try {
    $status = New TranslationsStatus('status-website.xml');

    $page->printSubHeading(__('Translators'));
    $status->printTranslators();
    
    $page->printSubHeading(__('Website Status <em>from %s</em>', $status->getUpdateDate()));
    $status->printProjectTable('Website', 'https://bitbucket.org/winmerge/website/src/default/po/');
  }
  catch (Exception $ex) { //If problems with translations status...
    $page->printPara(__('The translations status is currently not available...'));
  }
  
  $page->printFoot();
?>