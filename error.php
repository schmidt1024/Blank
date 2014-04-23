<?php defined( '_JEXEC' ) or die;

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$tpath = $this->baseurl.'/templates/'.$this->template;

?><!doctype html>

<html lang="<?php echo $this->language; ?>">

<head>
  <title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" /> <!-- mobile viewport optimized -->
  <link rel="stylesheet" href="<?php echo $tpath; ?>/css/error.css?v=1">
</head>

<body>
  <div align="center">
    <div id="error">
      <h1>
        <?php echo htmlspecialchars($app->getCfg('sitename')); ?>
      </h1>
      <p>
        <?php 
          echo $this->error->getCode().' - '.$this->error->getMessage(); 
          if (($this->error->getCode()) == '404') {
            echo '<br />';
            echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND');
          }
        ?>
      </p>
      <p>
        <?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>: 
        <a href="<?php echo $this->baseurl; ?>/"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a>.
      </p>
      <?php // render module mod_search
        $module = new stdClass();
        $module->module = 'mod_search';
        echo JModuleHelper::renderModule($module);
      ?>
    </div>
  </div>
</body>

</html>
