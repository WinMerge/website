<?php
  include('../engine/engine.inc');
  
  $page = new Page;
  
  header(sprintf('Location: %s', $page->getStableRelease()->getReleaseNotes()), true, 301);
  exit();