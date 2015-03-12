<?php if(!defined('PLX_ROOT')) exit; 
/**
 * Plugin subDomForPict
 *
 * @package	PLX
 * @version	1.0
 * @date	29/01/2014
 * @author	Cyril MAGUIRE
 **/
# Control du token du formulaire
plxToken::validateFormToken($_POST);

if(!empty($_POST)) {
	$plxPlugin->setParam('subdom', $_POST['subdom'], 'string');
	$plxPlugin->saveParams();
	header('Location: parametres_plugin.php?p=subDomForPict');
	exit;
}
$subdom =  $plxPlugin->getParam('subdom')=='' ? str_replace('www','pict',plxUtils::getRacine()) : $plxPlugin->getParam('subdom');
?>

<h2><?php echo $plxPlugin->getInfo('title') ?></h2>

<form id="form" action="parametres_plugin.php?p=subDomForPict" method="post">
	<fieldset>
		<p class="field"><label for="id_subdom"><?php $plxPlugin->lang('L_SUBDOM') ?>&nbsp;:</label></p>
		<?php plxUtils::printInput('subdom',$subdom,'text','50-100') ?>
		<a class="help" title="<?php echo $plxPlugin->lang('L_HELP_SUB_DOM') ?>">&nbsp;</a>
		<p>
			<?php echo plxToken::getTokenPostMethod() ?>
			<input type="submit" name="submit" value="<?php $plxPlugin->lang('L_SAVE') ?>" />
		</p>
	</fieldset>
</form>
