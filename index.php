<?php defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;


$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
/* $this->direction = $doc->direction; */

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

$template = 'templates/' . $this->template;
$user = JFactory::getUser();


//get the array containing all the script declarations
$document = JFactory::getDocument();
$headData = $document->getHeadData();
$scripts = $headData['scripts'];


unset($this->_scripts['/media/system/js/mootools-core.js']);
unset($this->_scripts['/media/system/js/core.js']);
unset($this->_scripts['/media/jui/js/jquery.min.js']);
unset($this->_scripts['/media/jui/js/jquery-noconflict.js']);
unset($this->_scripts['/media/jui/js/jquery-migrate.min.js']);
unset($this->_scripts['/media/jui/js/chosen.jquery.min.js']);
unset($this->_script['text/javascript']);
unset($this->_styleSheets['/media/jui/css/chosen.css']);


?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<!--
                                                 :::
                                             :: :::.
                       \/,                    .:::::
           \),          \`-._                 :::888
           /\            \   `-.             ::88888
          /  \            | .(                ::88
         /,.  \           ; ( `              .:8888
            ), \         / ;``               :::888
           /_   \     __/_(_                  :88
             `. ,`..-'      `-._    \  /      :8
               )__ `.           `._ .\/.
              /   `. `             `-._______m         _,
  ,-=====-.-;'                 ,  ___________/ _,-_,'"`/__,-.
 C   =--   ;                   `.`._    V V V       -=-'"#==-._
:,  \     ,|      UuUu _,......__   `-.__A_A_ -. ._ ,--._ ",`` `-
||  |`---' :    uUuUu,'          `'--...____/   `" `".   `
|`  :       \   UuUu:
:  /         \   UuUu`-._
 \(_          `._  uUuUu `-.
 (_3             `._  uUu   `._
                    ``-._      `.
                         `-._    `.
                             `.    \
                               )   ;
                              /   /
               `.        |\ ,'   /
                 ",_A_/\-| `   ,'
                   `--..,_|_,-'\
                          |     \
                          |      \__
                          |__

-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="fav icon" href="/favicon.ico" type="image/x-icon" />

  <?php
    /**
     * Stylesheets
     */
    $doc->addStyleSheet('templates/'.$this->template.'/assets/css/style.css');
  ?>

  <?php
    /**
     * Scripts
     */
//     $doc->addScript('templates/' .$this->template. '/assets/js/modernizr.min.js');
  ?>

<!-- /// HEADER -->
	<jdoc:include type="head" />


<!-- // HEADER -->


	<jdoc:include type="modules" name="head" style="clean" />

</head>

<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->






<!--
    - Menu Collapse Handler
    -
    -->
<input type="checkbox" name="site-nav__handler" id="site-nav__handler" class="site-nav__handler" />
<label for="site-nav__handler" class="site-nav__label" aria-label="Toggle Navigation">
  <i class="icon">&#x2261;</i> Menu
  <span class="lines"></span>
</label>
<!--
  <label for="site-nav__handler" class="site-nav__label" aria-label="Toggle Navigation">
    <span class="lines">Menu</span>
  </label>
-->
<!-- /menu-handler -->




  <!--
    - Search Collapse Handler
    -
    -->
<input type="checkbox" name="site-search__handler" id="site-search__handler" class="site-search__handler" />
<label for="site-search__handler" class="site-search__label" aria-label="Toggle Navigation">
  <span class="icon">Search</span>
</label>
  <!-- /search-handler -->


  <div class="page-wrapper">






    <!--
      -- Banner
      -->
    <div class="l-banner">
      <jdoc:include type="modules" name="banner" style="basic" />
    </div>
    <!-- /banner -->





    <!--
      -- Header
      -->
    <header class="l-header">
      <div class="site-logo">
        <a href="/">
          <h1><?php echo $sitename; ?></h1>
        </a>
      </div><!--

   --><div class="header__tools">
        <jdoc:include type="modules" name="header-tools" style="basic" />
      </div><!--


   --><jdoc:include type="modules" name="header" style="basic" />
    </header>
    <!-- /header -->










    <div class="l-main">
      <div class="l-component-header">
        <jdoc:include type="modules" name="component-header" style="basic" />
      </div>

      <div class="l-component">
        <jdoc:include type="modules" name="component-top" style="basic" />
        <jdoc:include type="message" />



        <?php if ($this->params->get('load_component', 1)) : ?>
        <jdoc:include type="component" />
        <?php endif; ?>


        <jdoc:include type="modules" name="component-bottom" style="basic" />
      </div>

      <div class="l-component-footer">
        <jdoc:include type="modules" name="component-footer" style="basic" />
      </div>

      <div class="l-sidebar  js-desk-parent">
        <jdoc:include type="modules" name="sidebar" style="basic" />
      </div>
    </div>
  </div>
</div> <!-- /page wrapper -->


  <div class="l-footer">
    <div class="footer__wrapper">
      <jdoc:include type="modules" name="footer" style="basic" />

      <div class="copyright">
        <div class="copyright__logo">
          <jdoc:include type="modules" name="copyright-logo" style="clean" />
        </div>

        <div class="copyright__text">
          <jdoc:include type="modules" name="copyright-text" style="clean" />
        </div>

        <div class="copyright__menu">
          <jdoc:include type="modules" name="copyright-menu" style="clean" />
        </div>
      </div><!--

   --><div class="contact">
        <jdoc:include type="modules" name="contact" style="clean" />
      </div>

    </div>


  </div>


  <!-- optimized GA Script http://mathiasbynens.be/notes/async-analytics-snippet -->
<script>var _gaq=[['_setAccount','UA-21971529-1'],['_trackPageview']];(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src='//www.google-analytics.com/ga.js';s.parentNode.insertBefore(g,s)}(document,'script'))</script>



	<jdoc:include type="modules" name="debug" style="basic" />
</body>
</html>
