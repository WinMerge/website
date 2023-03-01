<?php
  //Send 404 headers...
  header('HTTP/1.1 404 Not Found');
  header('Status: 404 Not Found');

  include_once('engine/engine.inc');

  $page = new Page;
  $page->printHead(__('Error 404 (Page Not Found)'), TAB_HOME);

  $page->printHeading(__('Page Not Found...'));
  $page->printPara(__('For some reason (mis-typed URL, faulty referral from another site, out-of-date search engine listing or we simply deleted a file) the page you were looking for could not be found.'),
                   __('This site has recently undergone a major re-working, so that might explain why you got this page instead.'));

  $page->printSubHeading(__('Were you looking for...'));
?>
<ul>
  <li><a href="/docs/"><?php __e('Documentation');?></a>
    <ul>
      <li><?php __e('Manual');?>
        <ul>
          <li><a href="https://manual.winmerge.org/en/"><?php __e('English');?></a></li>
          <li><a href="https://manual.winmerge.org/jp/"><?php __e('Japanese');?></a></li>
        </ul>
      </li>
      <li><a href="<?php print($page->getStableRelease()->getReleaseNotes());?>"><?php __e('Release Notes');?></a></li>
      <li><a href="<?php print($page->getStableRelease()->getChangeLog());?>"><?php __e('Change Log');?></a></li>
    </ul>
  </li>
  <li><a href="/downloads/"><?php __e('Downloads');?></a></li>
  <li><a href="/screenshots/"><?php __e('Screenshots');?></a></li>
  <li><a href="/source-code/"><?php __e('Source Code');?></a></li>
  <li><a href="/support/"><?php __e('Support');?></a></li>
  <li><a href="/translations/"><?php __e('Translations');?></a></li>
</ul>
<?php
  $page->printFoot();
?>