<?php
  include('../engine/engine.inc');

  $page = new Page;
  $page->printHead(__('Translations Status (Website)'), TAB_TRANSLATIONS);

  $page->printHeading(__('Translations Status (Website)'));
  $page->printPara(__('We move the sources from the website to a <a href="%1$s">bitbucket Mercurial repository</a> and use now <a href="%2$s">Transifex</a> as platform for the translations.', 'http://bitbucket.org/kimmov/winmerge-web/', 'http://www.transifex.net/projects/p/winmerge-web/'));

  $page->printSubHeading(__('Translations Status'));
?>
<p><img src="http://www.transifex.net/projects/p/winmerge-web/c/translations/chart/image_png" alt="<?php __e('Translations Status (Website)');?>"></p>
<p><a href="http://www.transifex.net/projects/p/winmerge-web/c/translations/" target="_blank"><?php __e('See more information on Transifex.net');?></a></p>
<?php
  $page->printFoot();
?>