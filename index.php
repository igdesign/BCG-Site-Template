<?php defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;


$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

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

// remove generator metatag
$this->setGenerator(null);

// unset($this->_scripts['/media/system/js/mootools-core.js']);
// unset($this->_scripts['/media/system/js/core.js']);
// unset($this->_scripts['/media/jui/js/jquery.min.js']);
// unset($this->_scripts['/media/jui/js/jquery-noconflict.js']);
// unset($this->_scripts['/media/jui/js/jquery-migrate.min.js']);
// unset($this->_scripts['/media/jui/js/chosen.jquery.min.js']);
// unset($this->_script['text/javascript']);
// unset($this->_styleSheets['/media/jui/css/chosen.css']);

?><!doctype HTML>
<html lang="<?= $this->language ?>">
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
        $doc->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
    ?>

    <?php
        /**
         * Scripts
         */
        // $doc->addScript('templates/' .$this->template. '/assets/js/modernizr.min.js');
    ?>

	<jdoc:include type="head" />
	<jdoc:include type="modules" name="head" style="clean" />


<body>
    <jdoc:include type="message" />

    <!-- Menu Collapse Handler -->
    <input type="checkbox" name="main-menu" id="main-menu" class="main-menu__toggle" />
    <label for="main-menu" class="main-menu__label"><span class="sr-only">Menu</span><span class="lines"></span></label>
    <!-- /menu-handler -->


    <!-- Search Collapse Handler -->
    <input type="checkbox" name="site-search" id="site-search" class="site-search__toggle" />
    <label for="site-search" class="site-search__label"><span class="icon">Search</span></label>
    <!-- /search-handler -->


    <div class="l-page">

        <!-- Banner -->
        <div class="l-banner">
            <jdoc:include type="modules" name="banner" style="basic" />
        </div> <!-- /banner -->

        <!-- Quick Nav -->
        <div class="l-quick-nav">
            <jdoc:include type="modules" name="quick-nav" style="basic" />
        </div> <!-- /banner -->

        <!-- Main -->
        <div class="l-main">
            <!-- Component -->
            <div class="l-component">
                <!-- Component Header -->
                <div class="l-component-header">
                    <jdoc:include type="modules" name="header" style="basic" />
                </div> <!-- /component-header -->

                <?php if ($this->params->get('load_component', 1)) : ?>
                <!-- Component Top -->
                <div class="l-component-top">
                    <jdoc:include type="modules" name="component-top" style="basic" />
                </div> <!-- /component-top -->

                <!-- Component Body -->
                <div class="l-component-body">
                    <jdoc:include type="component" />
                </div> <!-- /component-body -->

                <!-- Component Bottom -->
                <div class="l-component-bottom">
                    <jdoc:include type="modules" name="component-bottom" style="basic" />
                </div> <!-- /component-bottom -->
                <?php endif; ?>

                <!-- Component Footer -->
                <div class="l-component-footer">
                    <jdoc:include type="modules" name="component-footer" style="basic" />
                </div>

            </div> <!-- /component -->

            <!-- Sidebar -->
            <div class="l-sidebar">
                <jdoc:include type="modules" name="sidebar" style="basic" />
            </div> <!-- /sidebar -->
        </div> <!-- /main -->

        <!-- Footer -->
        <div class="l-footer">
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

                <div class="contact">
                    <jdoc:include type="modules" name="contact" style="clean" />
                </div>
            </div>


        </div> <!-- /footer -->
    </div> <!-- /page -->

    <jdoc:include type="modules" name="debug" style="basic" />

    <!-- optimized GA Script http://mathiasbynens.be/notes/async-analytics-snippet -->
    <script>var _gaq=[['_setAccount','UA-210752-5'],['_trackPageview']];(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src='//www.google-analytics.com/ga.js';s.parentNode.insertBefore(g,s)}(document,'script'))</script>
