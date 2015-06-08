<?php defined( '_JEXEC' ) or die; 

include_once JPATH_THEMES.'/'.$this->template.'/inc/logic.php';

?><!doctype html>
<html lang="<?php echo $this->language; ?>">
<head>
<jdoc:include type="head" /><?php include_once JPATH_THEMES.'/'.$this->template.'/inc/head.php'; ?>
</head>
  
<body id="origin" class="<?php 
  echo (($menu->getActive() == $menu->getDefault()) ? ('front') : ('site'))
  . ' ' .$active->alias . ' ' . $pageclass; 
  echo $option
  . ' view-' . $view
  . ($layout ? ' layout-' . $layout : ' no-layout')
  . ($task ? ' task-' . $task : ' no-task')
  . ($itemid ? ' itemid-' . $itemid : '');
  ?>" role="document">

  <!-- 
    YOUR CODE HERE
  -->
  <jdoc:include type="modules" name="debug" />
</body>

</html>
