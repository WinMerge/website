<?php
// This program is free software; you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation; either version 2 of the License, or
// (at your option) any later version.
// 
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.

  include('simpletranslate.inc');
  include('page.inc');

  $languagesdir = dirname(__FILE__) . '/languages/';

  $translations = new SimpleTranslate;
  $translations->setUrlParameter('lang');
  $translations->addLanguage('en', __('English'));
  $translations->addLanguage('eu', __('Basque'), $languagesdir . 'eu.po');
  $translations->addLanguage('ca', __('Catalan'), $languagesdir . 'ca.po');
  $translations->addLanguage('nl', __('Dutch'), $languagesdir . 'nl.po');
  $translations->addLanguage('el', __('Greek'), $languagesdir . 'el.po');
  $translations->addLanguage('de', __('German'), $languagesdir . 'de.po');
  $translations->addLanguage('fr', __('French'), $languagesdir . 'fr.po');
  $translations->addLanguage('ja', __('Japanese'), $languagesdir . 'ja.po');
  $translations->addLanguage('pl', __('Polish'), $languagesdir . 'pl.po');
  $translations->addLanguage('pt_BR', __('Portuguese (Brazil)'), $languagesdir . 'pt_BR.po');
  $translations->addLanguage('pt_PT', __('Portuguese (Portugal)'), $languagesdir . 'pt_BR.po');
  $translations->addLanguage('ru', __('Russian'), $languagesdir . 'ru.po');
  $translations->addLanguage('es', __('Spanish'), $languagesdir . 'es.po');
  $translations->addLanguage('es_VE', __('Spanish (Venezuela)'), $languagesdir . 'es_VE.po');
  $translations->addLanguage('sv', __('Swedish'), $languagesdir . 'sv.po');
  $translations->addLanguage('tr', __('Turkish'), $languagesdir . 'tr.po');
  if (!$translations->detectLanguageFromUrl()) { //if NOT detect language from URL...
    $translations->detectLanguageFromBrowser();
  }

  function __($text) {
    global $translations;
    
    $numargs = func_num_args();
    if ($numargs > 1 ) { //if more the one argument...
      $args = func_get_args();
      array_shift($args);
      return vsprintf($translations->translate($text), $args);
    }
    else { //if one argument...
      return $translations->translate($text);
    }
  }

  function __e($text) {
    global $translations;
    
    $numargs = func_num_args();
    if ($numargs > 1 ) { //if more the one argument...
      $args = func_get_args();
      array_shift($args);
      vprintf($translations->translate($text), $args);
    }
    else { //if one argument...
      echo $translations->translate($text);
    }
  }

  if (!$translations->isValidLanguageId()) { //if NOT a valid language ID...
    header('HTTP/1.1 404 Not Found');
    header('Status: 404 Not Found');
  }
?>