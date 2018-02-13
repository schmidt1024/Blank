<?php defined( '_JEXEC' ) or die;

include_once JPATH_THEMES.'/'.$this->template.'/logic.php';

?><!doctype html>
<html lang="<?php echo $this->language; ?>">

<head>
    <jdoc:include type="head" />
</head>

<body class="<?php echo $active->alias . ' ' . $pageclass; ?>">
    <jdoc:include type="component" />
    <jdoc:include type="modules" name="debug" />
    <script src="templates/frontend/build/app.js"></script>
</body>

</html>
