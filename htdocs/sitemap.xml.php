<?php
  header('Content-Type: application/xml; charset=utf-8');

  include('engine/engine.inc');

  $baseUrls = [
    'https://winmerge.org/',
    'https://winmerge.org/docs/',
    'https://winmerge.org/docs/changelog.php',
    'https://winmerge.org/docs/releasenotes.php',
    'https://winmerge.org/downloads/',
    'https://winmerge.org/screenshots/',
    'https://winmerge.org/source-code/',
    'https://winmerge.org/support/',
    'https://winmerge.org/translations/',
    'https://winmerge.org/translations/status_website.php'
  ];

  $languages = $translations->getLanguages();
  $alternateLanguages = $translations->getLanguages();

  print("<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n");
  print("<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xmlns:xhtml=\"http://www.w3.org/1999/xhtml\">\n");
  foreach ($baseUrls as $baseUrl) { //for all base URLs...
    foreach ($languages as $language) { //for all languages...
      print("  <url>\n");
      $url = $translations->appendUrlParameter($baseUrl, 'lang', $language->getId());
      print("    <loc>$url</loc>\n");
      foreach ($alternateLanguages as $alternateLanguage) { //for all alternate languages...
        $hreflang = $alternateLanguage->getId();
        $href = $translations->appendUrlParameter($baseUrl, 'lang', $hreflang);
        print("    <xhtml:link rel=\"alternate\" hreflang=\"$hreflang\" href=\"$href\"/>\n");
      }
      print("  </url>\n");
    }
  }
  print("</urlset>\n");
