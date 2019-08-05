<?php
  ob_start('ob_gzhandler'); //Use GZIP compression from PHP, since 1and1 don't support it from Apache!
  header('Content-type: application/rss+xml');
  
  include('../../engine/engine.inc');
  include('../translations.inc');
  
  try {
    $status = New TranslationsStatus('../status.xml');
    $webStatus = New TranslationsStatus('../status-website.xml');
    print("<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n");
    print("<rss version=\"2.0\">\n");
    print("  <channel>\n");
    print("    <title>WinMerge Translations Status</title>\n");
    print("    <link>https://winmerge.org/</link>\n");
    print("    <description>...</description>\n");
    $status->printProjectRssItem('WinMerge', 'https://winmerge.org/translations/#winmerge', 'https://bitbucket.org/winmerge/winmerge/src/default/Translations/WinMerge/');
    $status->printProjectRssItem('ShellExtension', 'https://winmerge.org/translations/#shellextension', 'https://bitbucket.org/winmerge/winmerge/src/default/Translations/ShellExtension/');
    $status->printProjectRssItem('InnoSetup', 'https://winmerge.org/translations/#innosetup', 'https://bitbucket.org/winmerge/winmerge/src/default/Translations/InnoSetup/');
    $status->printProjectRssItem('Docs/Readme', 'https://winmerge.org/translations/#readme', 'https://bitbucket.org/winmerge/winmerge/src/default/Translations/Docs/Readme/');
    $webStatus->printProjectRssItem('Website', 'https://winmerge.org/translations/status_website.php', 'https://bitbucket.org/winmerge/website/src/default/po/');
  }
  catch (Exception $ex) { //If problems with translations status...
    print("<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n");
    print("<rss version=\"2.0\">\n");
    print("</rss>\n");
  }
?>