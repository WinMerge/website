<?php
  include('../engine/engine.inc');
  include('../engine/simplepie/simplepie.inc');

  $page = new Page;
  $stablerelease = $page->getStableRelease();
  $page->setDescription(__('Download the current WinMerge version %1$s, which was released at %2$s. For detailed info on what is new, read the change log and the release notes.', $stablerelease->getVersionNumber(), $stablerelease->getDate()));
  $page->setKeywords(__('WinMerge, free, download, Windows, setup, installer, binaries, runtimes, stable, beta, experimental, portable'));
  $page->addRssFeed('https://sourceforge.net/projects/winmerge/rss?path=/', __('Project File Releases'));
  $page->printHead(__('Download WinMerge'), TAB_DOWNLOADS, 'toggle(\'checksumslist\');');
  
  $page->printHeading(__('Download WinMerge'));
  $page->printPara(__('The easiest way to install WinMerge is to download and run the Installer. Read the <a href="%s">online manual</a> for help using it.', 'https://manual.winmerge.org/en/Install.html'));
  $page->printSubHeading(__('WinMerge %s', $stablerelease->getVersionNumber()));
  $page->printPara(__('The current WinMerge version is <strong>%1$s</strong> and was released at <strong>%2$s</strong>.', $stablerelease->getVersionNumber(), $stablerelease->getDate()),
                   __('For detailed info on what is new, read the <a href="%1$s">change log</a> and the <a href="%2$s">release notes</a>.', '/docs/changelog.php', '/docs/releasenotes.php'));
?>
<div class="table-scrollable">
  <table class="table is-striped">
    <tr>
      <th class="left"><?php __e('Download');?></th>
      <th class="center"><?php __e('Size');?></th>
      <th class="center"><?php __e('Type');?></th>
      <th class="center"><?php __e('Format');?></th>
    </tr>
    <tr>
      <td class="left"><a href="<?php echo $stablerelease->getDownload('setup.exe');?>" target="_blank" class="button"><?php echo $stablerelease->getDownloadFileName('setup.exe');?></a></td>
      <td class="center"><?php __e('%s MB', $stablerelease->getDownloadSizeMb('setup.exe'));?></td>
      <td class="center"><?php __e('Installer');?></td>
      <td class="center"><?php __e('EXE');?></td>
    </tr>
<!--
    <tr>
      <td class="left"><a href="<?php echo $stablerelease->getDownload('setup64.exe');?>" target="_blank" class="button is-dark"><?php echo $stablerelease->getDownloadFileName('setup64.exe');?></a></td>
      <td class="center"><?php __e('%s MB', $stablerelease->getDownloadSizeMb('setup64.exe'));?></td>
      <td class="center"><?php __e('Installer');?></td>
      <td class="center"><?php __e('EXE');?></td>
    </tr>
-->
    <tr>
      <td class="left"><a href="<?php echo $stablerelease->getDownload('exe.zip');?>" target="_blank" class="button is-dark"><?php echo $stablerelease->getDownloadFileName('exe.zip');?></a></td>
      <td class="center"><?php __e('%s MB', $stablerelease->getDownloadSizeMb('exe.zip'));?></td>
      <td class="center"><?php __e('Binaries');?></td>
      <td class="center"><?php __e('ZIP');?></td>
    </tr>
    <tr>
      <td class="left"><a href="<?php echo $stablerelease->getDownload('exe64.zip');?>" target="_blank" class="button is-dark"><?php echo $stablerelease->getDownloadFileName('exe64.zip');?></a></td>
      <td class="center"><?php __e('%s MB', $stablerelease->getDownloadSizeMb('exe64.zip'));?></td>
      <td class="center"><?php __e('Binaries');?></td>
      <td class="center"><?php __e('ZIP');?></td>
    </tr>
    <tr>
      <td class="left"><a href="<?php echo $stablerelease->getDownload('src.7z');?>" target="_blank" class="button is-light"><?php echo $stablerelease->getDownloadFileName('src.7z');?></a></td>
      <td class="center"><?php __e('%s MB', $stablerelease->getDownloadSizeMb('src.7z'));?></td>
      <td class="center"><?php __e('Source Code');?></td>
      <td class="center"><?php __e('7z');?></td>
    </tr>
  </table>
</div> <!-- .table-scrollable -->
<div class="checksums">
  <h4><a href="javascript:toggle('checksumslist')"><?php __e('SHA-256 Checksums');?></a></h4>
  <dl id="checksumslist">
    <dt><?php echo $stablerelease->getDownloadFileName('setup.exe'); ?></dt>
    <dd><code><?php echo $stablerelease->getDownloadSha256Sum('setup.exe') ?></code></dd>
    <!--<dt><?php echo $stablerelease->getDownloadFileName('setup64.exe'); ?></dt>
    <dd><code><?php echo $stablerelease->getDownloadSha256Sum('setup64.exe') ?></code></dd>-->
    <dt><?php echo $stablerelease->getDownloadFileName('exe.zip'); ?></dt>
    <dd><code><?php echo $stablerelease->getDownloadSha256Sum('exe.zip') ?></code></dd>
    <dt><?php echo $stablerelease->getDownloadFileName('exe64.zip'); ?></dt>
    <dd><code><?php echo $stablerelease->getDownloadSha256Sum('exe64.zip') ?></code></dd>
    <dt><?php echo $stablerelease->getDownloadFileName('src.7z'); ?></dt>
    <dd><code><?php echo $stablerelease->getDownloadSha256Sum('src.7z') ?></code></dd>
  </dl>
</div> <!-- #checksums -->
<?php
  $page->printSubSubHeading(__('Requirements'));
?>
<ul>
  <li><?php __e('Microsoft Windows XP or newer');?></li>
  <li><?php __e('Microsoft Visual C++ 2013 Runtime Components (included in the installer)');?></li>
  <li><?php __e('Admin rights for the installer');?></li>
</ul>
<?php
  $page->printSubHeading(__('Other Versions'));
  $page->printSubSubHeading(__('WinMerge 2.14.0 <em>for Windows 2000</em>'));
  $page->printPara(__('WinMerge version 2.14.0 was the last version to ship with Microsoft Visual C++ 2008 runtimes that support Windows 2000.'));
?>
<p><a href="https://sourceforge.net/projects/winmerge/files/stable/2.14.0/" class="button is-small"><?php __e('Get version %s', '2.14.0');?></a></li></p>
<?php
  $page->printSubSubHeading(__('WinMerge 2.12.4 <em>for Windows 95/98/ME/NT</em>'));
  $page->printPara(__('WinMerge version 2.12.4 was the last version to ship with Microsoft Visual C++ 2005 runtimes that support Windows 95/98/ME/NT. It was also the last version to ship with an ANSI version of WinMerge.'));
?>
<p><a href="https://sourceforge.net/projects/winmerge/files/stable/2.12.4/" class="button is-small"><?php __e('Get version %s', '2.12.4');?></a></li></p>
<?php
  $page->printSubSubHeading(__('Unofficial Versions'));
?>
<ul>
  <li><a href="https://ci.appveyor.com/project/sdottaka/winmerge"><?php __e('Continuous Integration Builds');?></a></li>
  <li><a href="https://portableapps.com/apps/utilities/winmerge_portable"><?php __e('WinMerge Portable');?></a> <?php __e('(by PortableApps.com)');?></li>
  <li><a href="https://bitbucket.org/jtuc/winmerge2011/">WinMerge 2011</a> (by Jochen Neubeck)</li>
</ul>
<?php
  $page->printRssSubHeading(__('Project File Releases'), 'https://sourceforge.net/projects/winmerge/rss?path=/');

  $feed = new SimplePie();
  $feed->set_feed_url('https://sourceforge.net/projects/winmerge/rss?path=/');
  $feed->set_cache_location('../engine/simplepie/cache');
  $feed->init();
  print("<ul class=\"rssfeeditems\">\n");
  foreach ($feed->get_items(0, 10) as $item) { //for the last 10 file releases...
    $title = $item->get_title();
    $title = preg_replace('#(\([A-Z][a-z][a-z],.*GMT\))#si', '', $title);
    $title = str_replace('1. Stable versions', 'Stable version', $title);
    $title = str_replace('2. Documentation', 'Documentation', $title);
    $title = str_replace('3. 7-Zip plugin', '7-Zip plugin', $title);
    $title = str_replace('4. Beta versions', 'Beta version', $title);
    $title = str_replace('5. Experimental builds', 'Experimental build', $title);
    $title = str_replace('6. Developer tools', 'Developer tool', $title);
    print("  <li><a href=\"".$item->get_link()."\">".$title."</a> <em>".$item->get_date(__('Y-m-d'))."</em></li>\n");
  }
  print("  <li><a href=\"https://sourceforge.net/projects/winmerge/files/\">" . __('View all file releases&hellip;') . "</a></li>\n");
  print("</ul>\n");
?>
<ul class="buttons">
  <li><a href="https://sourceforge.net/projects/winmerge/files/stable/" class="button is-success"><?php __e('Stable Versions');?></a></li>
  <li><a href="https://sourceforge.net/projects/winmerge/files/beta/" class="button is-warning"><?php __e('Beta Versions');?></a></li>
  <li><a href="https://sourceforge.net/projects/winmerge/files/alpha/" class="button is-danger"><?php __e('Experimental Builds');?></a></li>
  <!--<li><a href="https://sourceforge.net/projects/winmerge/files/" class="button"><?php __e('All File Releases');?></a></li>-->
</ul>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "SoftwareApplication",
  "name": "WinMerge",
  "operatingSystem": "Windows",
  "applicationCategory": "http://schema.org/BusinessApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "softwareVersion": "<?php echo $stablerelease->getVersionNumber();?>",
  "downloadUrl": "<?php echo $stablerelease->getDownload('setup.exe');?>",
  "screenshot": "https://winmerge.org/screenshots/filecmp.png",
  "license": "https://www.gnu.org/licenses/gpl-2.0.html"
}
</script>
<?php
  $page->printFoot();
?>
