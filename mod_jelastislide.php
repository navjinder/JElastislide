<?php 
/**
* @file
* @brief    JElastislide - A Joomla Responsive Image Carousel
* @author   Navjinder Kainthrai
* @version  2.2
* @remarks  Copyright (C) 2013 Navjinder.com (Based on Elastislide by Codrops)
* @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
* @see      http://www.navjinder.com/
*/

// no direct access
defined('_JEXEC') or die;

// Loading Parameters
$root = JURI::root();
$orientation = $params->get('orientation');
$modal = $params->get('modal');
$largeoption = $params->get('largeoption');
$background = $params->get('backGround');
$arrowtheme = $params->get('arrowTheme');
$target = $params->get('target');
$jquery = $params->get('jquery');
$minvalue = $params->get('minValue');
$arrowcolor = $params->get('arrowColor'); 
$moduid = $module->id;
$doc = JFactory::getDocument();
$credits = $params->get('credits');
JHtml::script($root.'modules/mod_jelastislide/js/modernizr.custom.17475.js');
if ($jquery != "no") {JHtml::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js');}
JHtml::script($root.'modules/mod_jelastislide/js/jquerypp.custom.js');
JHtml::script($root.'modules/mod_jelastislide/js/jquery.elastislide.js');
if ($modal != "no") {JHtml::_('behavior.modal');}
$doc->addStyleSheet($root.'modules/mod_jelastislide/vari/elastislide.css');
for ($i=1;$i<=10;$i++) {

${'file'.$i} = $params->get('file'.$i);
${'file'.$i.'active'} = $params->get('file'.$i.'active');
${'file'.$i.'large'} = $params->get('file'.$i.'large');
${'file'.$i.'link'} = $params->get('file'.$i.'link');

}

?>


<section class="jelastic<?php echo $moduid ?>" >

	<!-- JElastislide Carousel -->
		    <ul id="carousel<?php echo $moduid?>" class="elastislide-list">
			 <?php for ($i=1;$i<=10;$i++) { if (${'file'.$i} && ${'file'.$i.'active'} == "yes" && ${'file'.$i} != " ") {?>
			
		    	<li >
				<?php if ($modal == "no") { ?>
				
				<?php if (${'file'.$i.'link'}) { ?> <a href="<?php echo ${'file'.$i.'link'}; ?>" target="<?php echo $target ?>"><img src="<?php echo ${'file'.$i}; ?>" /></a><?php } else { ?> <img src="<?php echo ${'file'.$i}; ?>" /> <?php } ?>
				<?php } else { ?>
				
						<?php if ($largeoption == "no") { ?>
						<a class="modal"  href="<?php echo ${'file'.$i}; ?>" ><img src="<?php echo ${'file'.$i}; ?>" /></a>
						<?php } else { ?>
						<a class="modal"  href="<?php echo ${'file'.$i.'large'}; ?>" ><img src="<?php echo ${'file'.$i}; ?>" /></a>
						<?php } ?>

				<?php } ?>
		    	</li>
			
		<?php } ?>  <?php } ?>
		    </ul>
		
<script type="text/javascript">
			
			$( '#carousel<?php echo $moduid ?>' ).elastislide( {
				orientation : '<?php echo $orientation ?>',
				minItems : <?php echo $minvalue ?>,
			} );
			
</script>
<style>
.jelastic<?php echo $moduid ?> .elastislide-wrapper {
 background-color: <?php echo $background; ?>;
}
.jelastic<?php echo $moduid ?> .elastislide-wrapper nav span {
	background: <?php echo $arrowcolor ?> url('<?php echo $root ?>modules/mod_jelastislide/images/nav<?php echo $arrowtheme ?>.png') no-repeat 4px 3px;
	
}

.jelastic<?php echo $moduid ?> .elastislide-wrapper nav span {
	position: absolute;
	width: 23px;
	height: 23px;
	border-radius: 50%;
	text-indent: -9000px;
	cursor: pointer;
	opacity: 0.8;
}

.jelastic<?php echo $moduid ?> .elastislide-wrapper nav span:hover {
	opacity: 1.0
}

.jelastic<?php echo $moduid ?> .elastislide-horizontal nav span {
	top: 50%;
	left: 10px;
	margin-top: -11px;
}

.jelastic<?php echo $moduid ?> .elastislide-vertical nav span {
	top: 10px;
	left: 50%;
	margin-left: -11px;
	background-position: -17px 5px;
}

.jelastic<?php echo $moduid ?> .elastislide-horizontal nav span.elastislide-next {
	right: 10px;
	left: auto;
	background-position: 4px -17px;
}

.jelastic<?php echo $moduid ?> .elastislide-vertical nav span.elastislide-next {
	bottom: 10px;
	top: auto;
	background-position: -17px -18px;
}
</style>
 <link rel="stylesheet" href="<?php echo $root ?>modules/mod_jelastislide/vari/elastislide.css" type="text/css" />

	<!-- End JElastislide Carousel -->
	<?php if ($credits == "yes") {echo '<a href=\'http://demo.navjinder.com/jelastislide-demo\' target=\'_blank\' ><small>JElastislide</small></a>' ;}?>
	</section>
