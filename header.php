<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php bloginfo('name'); wp_title(); ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/normalize.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/style.css" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="header" data-component="Header" data-header="fromTop">
        <div class="wrapper">
                <a class="logo" href="<?php bloginfo('url') ?>">
                    <?php $logoimg = get_header_image(); ?>
                    <img src="<?php echo $logoimg; ?>" alt="logo">
                    <?php bloginfo('name') ?>
                </a>

                <nav class="header__nav">
                    <ul>
                        <li><a href="<?php bloginfo('url') ?>#unites">Unités</a></li>
                        <li><a href="https://www.scouts-st-bruno.ca/piwigo/" target="_blank">Photos</a></li>
                        <li><a href="<?php bloginfo('url') ?>#contact">Contact</a></li>
                        <li><a href="<?php bloginfo('url') ?>/ressourcerie">Ressourcerie</a></li>
                        <li><a href="<?php bloginfo('url') ?>/dons">Dons</a></li>
                        <li class="inscription--nav"><a href="<?php bloginfo('url') ?>/inscriptions">Inscriptions</a></li>
                    </ul>
                </nav>

                <a href="<?php bloginfo('url') ?>/inscriptions" class="header__btn btn inscriptions">Inscriptions</a>
                
                <button class="header__toggle js-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
        </div>
    </header>

    <div class="element--header"></div>