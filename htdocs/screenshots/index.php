<?php
  include('../engine/engine.inc');

  $page = new Page;
  $page->setDescription(__('Screenshots from WinMerge features like file comparison, folder comparison results and location pane.'));
  $page->setKeywords(__('WinMerge, screenshots, file comparison, open-dialog, folder comparison results, highlight line diff, location pane, splash screen'));
  $page->printHead(__('Screenshots'), TAB_SCREENSHOTS);
  
  $page->printHeading(__('Screenshots'));
?>
<h3><?php __e('File Comparison');?></h3>
<p><a href="filecmp.png" target="_blank"><img class="image" src="filecmp.png" alt="<?php __e('File Comparison');?>" border="0"></a></p>
<p><?php __e('File compare window is basically two files opened to editor into two horizontal panes. Editing allows user to easily do small changes without need to open files to other editor or development environment.');?></p>

<h3><?php __e('3-way File Comparison');?></h3>
<p><a href="filecmp_3way.png" target="_blank"><img class="image" src="filecmp_3way.png" alt="<?php __e('3-way File Comparison');?>" border="0"></a></p>
<p><?php __e('The 3-way file compare even allows comparing and editing three files at the same time.');?></p>

<h3><?php __e('Folder Comparison Results');?></h3>
<p><a href="foldercmp.png" target="_blank"><img class="image" src="foldercmp.png" alt="<?php __e('Folder Comparison Results');?>" border="0"></a></p>
<p><?php __e('Folder compare shows all files and subfolders found from compared folders as list. Folder compare allows synchronising folders by copying and deleting files and subfolders. Folder compare view can be versatile customised.');?></p>

<h3><?php __e('Folder Compare Tree View');?></h3>
<p><a href="foldercmp_treeview.png" target="_blank"><img class="image" src="foldercmp_treeview.png" alt="<?php __e('Folder Compare Tree View');?>" border="0"></a></p>
<p><?php __e('In the tree view, folders are expandable and collapsible, containing files and subfolders. This is useful for an easier navigation in deeply nested directory structures. <em>The tree view is available only in recursive compares.');?></em></p>

<h3><?php __e('Image Comparison');?></h3>
<p><a href="imgcmp.png" target="_blank"><img class="image" src="imgcmp.png" alt="<?php __e('Image Comparison');?>" border="0"></a></p>
<p><?php __e('WinMerge can compare images and highlight the differences in several ways.');?></p>

<h3><?php __e('Table Comparison');?></h3>
<p><a href="tblcmp.png" target="_blank"><img class="image" src="tblcmp.png" alt="<?php __e('Table Comparison');?>" border="0"></a></p>
<p><?php __e('Table compare shows the contents of CSV/TSV files in table format.');?></p>

<h3><?php __e('Binary Comparison');?></h3>
<p><a href="hexcmp.png" target="_blank"><img class="image" src="hexcmp.png" alt="<?php __e('Binary Comparison');?>" border="0"></a></p>
<p><?php __e('WinMerge can detect whether files are in text or binary format. When you launch a file compare operation on binary files, WinMerge opens each file in the binary file editor.');?></p>

<h3><?php __e('Open-dialog');?></h3>
<p><a href="open-dialog.png" target="_blank"><img class="image" src="open-dialog.png" alt="<?php __e('Open-dialog');?>" border="1"></a></p>
<p><?php __e('WinMerge allows selecting/opening paths in several ways. Using the Open-dialog is just one of them.');?></p>
<?php
  $page->printFoot();
?>