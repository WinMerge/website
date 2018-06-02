<?php
  include('../engine/engine.inc');
  include('../engine/simplepie/simplepie.inc');

  $page = new Page;
  $stablerelease = $page->getStableRelease();
  $page->setDescription(__('Download the current WinMerge version %1$s, which was released at %2$s. For detailed info on what is new, read the change log and the release notes.', $stablerelease->getVersionNumber(), $stablerelease->getDate()));
  $page->setKeywords(__('WinMerge, free, download, Windows, setup, installer, binaries, runtimes, stable, beta, experimental, portable'));
  $page->addRssFeed('https://sourceforge.net/api/file/index/project-id/13216/rss', __('Project File Releases'));
  $page->printHead(__('Download WinMerge'), TAB_DOWNLOADS, 'toggle(\'checksumslist\');');
  
  $page->printHeading(__('Download WinMerge'));
  $page->printSubHeading(__('WinMerge %s <em>for Windows 2000/XP/2003/Vista/2008/7/8/2012</em>', $stablerelease->getVersionNumber()));
  $page->printPara(__('The current WinMerge version is <strong>%1$s</strong> and was released at <strong>%2$s</strong>.', $stablerelease->getVersionNumber(), $stablerelease->getDate()),
                   __('For detailed info on what is new, read the <a href="%1$s">change log</a> and the <a href="%2$s">release notes</a>.', '/docs/changelog.php', '/docs/releasenotes.php'));
?>
<table class="table">
  <tr>
    <th class="left"><?php __e('Download');?></th>
    <th class="center"><?php __e('Size');?></th>
    <th class="center"><?php __e('Typ');?></th>
    <th class="center"><?php __e('Format');?></th>
  </tr>
  <tr>
    <td class="left"><a href="<?php echo $stablerelease->getDownload('setup.exe');?>"><?php echo $stablerelease->getDownloadFileName('setup.exe');?></a></td>
    <td class="center"><?php __e('%s MB', $stablerelease->getDownloadSizeMb('setup.exe'));?></td>
    <td class="center"><?php __e('Installer');?></td>
    <td class="center"><?php __e('EXE');?></td>
  </tr>
  <tr>
    <td class="left"><a href="<?php echo $stablerelease->getDownload('exe.zip');?>"><?php echo $stablerelease->getDownloadFileName('exe.zip');?></a></td>
    <td class="center"><?php __e('%s MB', $stablerelease->getDownloadSizeMb('exe.zip'));?></td>
    <td class="center"><?php __e('Binaries');?></td>
    <td class="center"><?php __e('ZIP');?></td>
  </tr>
  <tr>
    <td class="left"><a href="<?php echo $stablerelease->getDownload('exe.7z');?>"><?php echo $stablerelease->getDownloadFileName('exe.7z');?></a></td>
    <td class="center"><?php __e('%s MB', $stablerelease->getDownloadSizeMb('exe.7z'));?></td>
    <td class="center"><?php __e('Binaries');?></td>
    <td class="center"><?php __e('7z');?></td>
  </tr>
</table>
<div class="checksums">
  <h4><a href="javascript:toggle('checksumslist')"><?php __e('SHA-1 Checksums');?></a></h4>
  <dl id="checksumslist">
    <dt><?php echo $stablerelease->getDownloadFileName('setup.exe'); ?></dt>
    <dd><code><?php echo $stablerelease->getDownloadSha1Sum('setup.exe') ?></code></dd>
    <dt><?php echo $stablerelease->getDownloadFileName('exe.zip'); ?></dt>
    <dd><code><?php echo $stablerelease->getDownloadSha1Sum('exe.zip') ?></code></dd>
    <dt><?php echo $stablerelease->getDownloadFileName('exe.7z'); ?></dt>
    <dd><code><?php echo $stablerelease->getDownloadSha1Sum('exe.7z') ?></code></dd>
  </dl>
</div> <!-- #checksums -->
<?php
  $page->printPara(__('The easiest way to install WinMerge is to download and run the Installer. Read the <a href="%s">online manual</a> for help using it.', 'http://manual.winmerge.org/Installing.html'));
  $page->printPara(__('You can also download additional <a href="%1$s">plugins</a> and the whole <a href="%2$s">source code</a> from WinMerge.', 'plugins.php', 'source-code.php'));

  $page->printSubSubHeading(__('Requirements'));
?>
<ul>
  <li><?php __e('Microsoft Windows 2000/XP/2003/Vista/2008/7/8/2012');?></li>
  <li><?php __e('Microsoft Visual C++ 2008 Runtime Components (included in the installer)');?></li>
  <li><?php __e('Admin rights for the installer');?></li>
</ul>
<?php
  $page->printSubHeading(__('WinMerge 2.12.4 <em>for Windows 95/98/ME/NT</em>'));
  $page->printPara(__('WinMerge version 2.12.4 was the last version to ship with Microsft Visual C++ 2005 runtimes that support Windows 95/98/ME/NT. It was also the last version to ship with an ANSI version of WinMerge.'));
?>
<ul>
  <li><a href="https://sourceforge.net/projects/winmerge/files/stable/2.12.4/"><?php __e('Get version 2.12.4');?></a></li>
</ul>
<?php
  $page->printSubHeading(__('Other Versions'));
?>
<ul>
  <li><a href="https://sourceforge.net/projects/winmerge/files/stable/"><?php __e('Stable Versions');?></a></li>
  <li><a href="https://sourceforge.net/projects/winmerge/files/beta/"><?php __e('Beta Versions');?></a></li>
  <li><a href="https://sourceforge.net/projects/winmerge/files/alpha/"><?php __e('Experimental Builds');?></a></li>
  <li><a href="https://portableapps.com/apps/utilities/winmerge_portable"><?php __e('WinMerge Portable');?></a> <?php __e('(by PortableApps.com)');?></li>
  <li><a href="http://www.geocities.co.jp/SiliconValley-SanJose/8165/winmerge.html"><?php __e('Japanese WinMerge Version');?></a> (by Takashi Sawanaka)</li>
  <li><a href="http://www.geocities.co.jp/SiliconValley-SanJose/8165/unofficial_winmerge_nightly_builds.html"><?php __e('Unofficial WinMerge Builds');?></a> (by Takashi Sawanaka)</li>
  <li><a href="https://bitbucket.org/jtuc/winmerge2011/">WinMerge 2011</a> (by Jochen Neubeck)</li>
</ul>
<?php
  $page->printRssSubHeading(__('Project File Releases'), 'https://sourceforge.net/api/file/index/project-id/13216/rss');
  $feed = new SimplePie();
  $feed->set_feed_url('https://sourceforge.net/api/file/index/project-id/13216/rss');
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
  "screenshot": "http://winmerge.org/about/screenshots/screenshot.png",
  "license": "https://www.gnu.org/licenses/gpl-2.0.html"
}
</script>
<?php
  $page->printFoot();
?>
