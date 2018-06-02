<?php
  include('../engine/engine.inc');
  include('../engine/simplepie/simplepie.inc');

  $page = new Page;
  $page->setDescription(__('Download the source code of WinMerge, which is released under the GNU General Public License.'));
  $page->setKeywords(__('WinMerge, free, download, source code, GPL, Bitbucket, Mercurial'));
  $page->addRssFeed('https://bitbucket.org/winmerge/winmerge/rss', __('Recent Code Changes'));
  $page->printHead(__('Download Source Code'), TAB_DOWNLOADS, 'toggle(\'checksumslist\');');
  $stablerelease = $page->getStableRelease();
  
  $page->printHeading(__('Download Source Code'));
  $page->printPara(__('WinMerge is released under the <a href="%s">GNU General Public License</a>. That means you can get the whole source code and can build the program yourself.', 'http://www.gnu.org/licenses/gpl-2.0.html'));
?>
<table class="table">
  <tr>
    <th class="left"><?php __e('Download');?></th>
    <th class="center"><?php __e('Size');?></th>
    <th class="center"><?php __e('Format');?></th>
  </tr>
  <tr>
    <td class="left"><a href="<?php echo $stablerelease->getDownload('src.zip');?>"><?php echo $stablerelease->getDownloadFileName('src.zip');?></a></td>
    <td class="center"><?php __e('%s MB', $stablerelease->getDownloadSizeMb('src.zip'));?></td>
    <td class="center"><?php __e('ZIP');?></td>
  </tr>
  <tr>
    <td class="left"><a href="<?php echo $stablerelease->getDownload('src.7z');?>"><?php echo $stablerelease->getDownloadFileName('src.7z');?></a></td>
    <td class="center"><?php __e('%s MB', $stablerelease->getDownloadSizeMb('src.7z'));?></td>
    <td class="center"><?php __e('7z');?></td>
  </tr>
</table>
<div class="checksums">
  <h3><a href="javascript:toggle('checksumslist')"><?php __e('SHA-1 Checksums');?></a></h3>
  <dl id="checksumslist">
    <dt><?php echo $stablerelease->getDownloadFileName('src.zip'); ?></dt>
    <dd><code><?php echo $stablerelease->getDownloadSha1Sum('src.zip') ?></code></dd>
    <dt><?php echo $stablerelease->getDownloadFileName('src.7z'); ?></dt>
    <dd><code><?php echo $stablerelease->getDownloadSha1Sum('src.7z') ?></code></dd>
  </dl>
</div> <!-- #checksums -->
<?php
  $page->printPara(__('The source code is hosted on <a href="%1$s">Bitbucket</a> in a <a href="%2$s">Mercurial</a> repository.', 'https://bitbucket.org/', 'https://www.mercurial-scm.org/'));
?>
<dl class="headinglist">
  <dt><?php __e('Developer Version');?></dt>
  <dd><a href="https://bitbucket.org/winmerge/winmerge">https://bitbucket.org/winmerge/winmerge</a></dd>
  <dt><?php __e('WinMerge %s', $stablerelease->getVersionNumberMajor());?></dt>
  <dd><a href="https://bitbucket.org/winmerge/winmerge/branch/<?php echo $stablerelease->getBranchName();?>">https://bitbucket.org/winmerge/winmerge/branch/<?php echo $stablerelease->getBranchName();?></a></dd>
</dl>
<?php
  $page->printRssSubHeading(__('Recent Code Changes'), 'https://bitbucket.org/winmerge/winmerge/rss');
  $feed = new SimplePie();
  $feed->set_feed_url('https://bitbucket.org/winmerge/winmerge/rss');
  $feed->set_cache_location('../engine/simplepie/cache');
  $feed->init();
  print("<ul class=\"rssfeeditems\">\n");
  foreach ($feed->get_items(0, 10) as $item) { //for the last 10 code changes...
    $title = strip_tags($item->get_title());
    $link = $item->get_link();
    $date = $item->get_date(__('Y-m-d H:i'));
    print("  <li><a href=\"$link\">$title</a> <em>$date</em></li>\n");
  }
  print("  <li><a href=\"https://bitbucket.org/winmerge/winmerge/commits/\">" . __('View code history&hellip;') . "</a></li>\n");
  print("</ul>\n");

  $page->printFoot();
?>
