<?php

define('EMAIL_FOR_REPORTS', '');
define('RECAPTCHA_PRIVATE_KEY', '@privatekey@');
define('FINISH_URI', 'http://');
define('FINISH_ACTION', 'redirect');
define('FINISH_MESSAGE', 'Thanks for filling out my form!');
define('UPLOAD_ALLOWED_FILE_TYPES', 'doc, docx, xls, csv, txt, rtf, html, zip, jpg, jpeg, png, gif');

define('_DIR_', str_replace('\\', '/', dirname(__FILE__)) . '/');
require_once _DIR_ . '/handler.php';

?>

<?php if (frmd_message()): ?>
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-solid-blue.css" type="text/css" />
<span class="alert alert-success"><?php echo FINISH_MESSAGE; ?></span>
<?php else: ?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-solid-blue.css" type="text/css" />
<script type="text/javascript" src="<?php echo dirname($form_path); ?>/jquery.min.js"></script>
<form class="formoid-solid-blue" style="background-color:#ffffff;font-size:14px;font-family:'Courier New',Courier,monospace;color:#34495E;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Authentification</h2></div>
	<div class="element-name<?php frmd_add_class("name"); ?>" title="Votre nom"><label class="title"><span class="required">*</span></label><span class="nameFirst"><input placeholder=" Nom" type="text" size="8" name="name[first]" required="required"/><span class="icon-place"></span></span><span class="nameLast"><input placeholder=" Prénom" type="text" size="14" name="name[last]" required="required"/><span class="icon-place"></span></span></div>
	<div class="element-password<?php frmd_add_class("password"); ?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="password" name="password" value="" required="required" placeholder="Password"/><span class="icon-place"></span></div></div>
<div class="submit"><input type="submit" value="Enrégistrer"/></div></form><script type="text/javascript" src="<?php echo dirname($form_path); ?>/formoid-solid-blue.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>