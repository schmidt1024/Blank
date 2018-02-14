<?php defined( '_JEXEC' ) or die;

// variables
$app = JFactory::getApplication();

// generator tag
$this->setGenerator(null);

// load css
JHtml::_('stylesheet', 'normalize.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'offline.css', array('version' => 'auto', 'relative' => true));

?><!doctype html>

<html lang="<?php echo $this->language; ?>">

<head>
  <jdoc:include type="head" />
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
</head>

<body>
  <div id="frame">
    <?php if ($app->getCfg('offline_image')) : ?>
      <img src="<?php echo $app->getCfg('offline_image'); ?>" alt="<?php echo $app->getCfg('sitename'); ?>" />
    <?php endif; ?>
    <h1>
      <?php echo htmlspecialchars($app->getCfg('sitename')); ?>
    </h1>
    <?php if ($app->getCfg('display_offline_message', 1) == 1 && str_replace(' ', '', $app->getCfg('offline_message')) != ''): ?>
		<p><?php echo $app->getCfg('offline_message'); ?></p>
    <?php elseif ($app->getCfg('display_offline_message', 1) == 2 && str_replace(' ', '', JText::_('JOFFLINE_MESSAGE')) != ''): ?>
		<p><?php echo JText::_('JOFFLINE_MESSAGE'); ?></p>
    <?php endif; ?>
    <jdoc:include type="message" />
    <form action="<?php echo JRoute::_('index.php', true); ?>" method="post" name="login" id="form-login">
      <fieldset class="input">
        <p id="form-login-username">
          <input type="text" name="username" id="username" class="inputbox" alt="<?php echo JText::_('JGLOBAL_USERNAME'); ?>" size="18" placeholder="<?php echo JText::_('JGLOBAL_USERNAME'); ?>" />
        </p>
        <p id="form-login-password">
          <input type="password" name="password" id="password" class="inputbox" alt="<?php echo JText::_('JGLOBAL_PASSWORD'); ?>" size="18" placeholder="<?php echo JText::_('JGLOBAL_PASSWORD'); ?>" />
        </p>
        <p id="form-login-remember">
          <input type="checkbox" name="remember" value="yes" alt="<?php echo JText::_('JGLOBAL_REMEMBER_ME'); ?>" id="remember" />
          <label for="remember"><?php echo JText::_('JGLOBAL_REMEMBER_ME'); ?></label>
        </p>
        <p id="form-login-submit">
          <input type="submit" name="Submit" class="button" value="<?php echo JText::_('JLOGIN'); ?>" />
        </p>
      </fieldset>
      <input type="hidden" name="option" value="com_users" />
      <input type="hidden" name="task" value="user.login" />
      <input type="hidden" name="return" value="<?php echo base64_encode(JURI::base()); ?>" />
      <?php echo JHTML::_( 'form.token' ); ?>
    </form>
  </div>
</body>

</html>
