<?php
  include('../engine/engine.inc');
  include('translations.inc');

  $page = new Page;
  $page->addRssFeed('status-feed/', __('Translations Status'));
  $page->printHead(__('Translations'), TAB_TRANSLATIONS);
  
  $page->printRssHeading(__('Translations'), 'status-feed/');
  
  try {
    $status = New TranslationsStatus('status.xml');
    
    print("<ul>\n");
    print("  <li><a href=\"#translators\">" . __('Translators') . "</a></li>\n");
    print("  <li><a href=\"#winmerge\">" . __('WinMerge Status') . "</a></li>\n");
    print("  <li><a href=\"#shellextension\">" . __('ShellExtension Status') . "</a></li>\n");
    print("  <li><a href=\"#innosetup\">" . __('InnoSetup Files') . "</a></li>\n");
    print("  <li><a href=\"#readme\">" . __('Readme Files') . "</a></li>\n");
    print("</ul>\n");
    
    $page->printSubHeading(__('Translating'));
    $page->printPara(__('We currently have WinMerge translated into the languages listed below:'));
    
    print("<ul class=\"inline\">\n");
    $languages = $status->getLanguagesArray();
    foreach ($languages as $language) { //for all languages...
      print("  <li>" . $language . "</li>\n");
    }
    print("</ul>\n");
    
    $page->printPara(__('If you would like to update any of these translations or add another translation, then please follow <a href="%s">these instructions</a>.', 'instructions.php'));
    
    $page->printAnchorSubHeading(__('Translators'), 'translators');
    $status->printTranslators();
    
    $page->printAnchorSubHeading(__('WinMerge Status <em>from %s</em>', $status->getUpdateDate()), 'winmerge');
    $status->printProjectTable('WinMerge', 'https://bitbucket.org/winmerge/winmerge/src/default/Translations/WinMerge/');
    
    $page->printAnchorSubHeading(__('ShellExtension Status <em>from %s</em>', $status->getUpdateDate()), 'shellextension');
    $status->printProjectTable('ShellExtension', 'https://bitbucket.org/winmerge/winmerge/src/default/Translations/ShellExtension/');
    
    $page->printAnchorSubHeading(__('InnoSetup Files'), 'innosetup');
    $status->printProjectList('InnoSetup', 'https://bitbucket.org/winmerge/winmerge/src/default/Translations/InnoSetup/');
    
    $page->printAnchorSubHeading(__('Readme Files'), 'readme');
    $status->printProjectList('Docs/Readme', 'https://bitbucket.org/winmerge/winmerge/src/default/Translations/Docs/Readme/');
  }
  catch (Exception $ex) { //If problems with translations status...
    $page->printPara(__('The translations status is currently not available...'));
  }

  $page->printFoot();
?>