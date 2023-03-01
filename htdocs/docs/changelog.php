<?php
  include('../engine/engine.inc');
  
  $page = new Page;
  
  header(sprintf('Location: %s', $page->getStableRelease()->getChangeLog()), true, 301);
  exit();