<?php defined( '_JEXEC' ) or die;

// variables
$doc = JFactory::getDocument();
$tpath = $this->baseurl.'/templates/'.$this->template;

// generator tag
$this->setGenerator(null);

// load sheets and scripts
// $doc->addStyleSheet($tpath.'/css/print.css?v=1');

JHtml::_('stylesheet', 'print.css', array('version' => 'auto', 'relative' => true));

?><!doctype html>

<html lang="<?php echo $this->language; ?>">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <jdoc:include type="head" />
</head>

<body id="print">
  <div id="overall">
    <jdoc:include type="message" />
    <jdoc:include type="component" />
  </div>
  <?php if ($_GET['print'] == '1') echo '<script type="text/javascript">window.print();</script>'; ?>
</body>

</html>
