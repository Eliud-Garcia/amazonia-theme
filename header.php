<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

    <header id="masthead" class="site-header">
        <div class="site-branding">
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <p class="site-description"><?php bloginfo( 'description' ); ?></p>
        </div>
        
        <nav id="site-navigation" class="main-navigation">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                    'fallback_cb'    => false,
                )
            );
            ?>

            <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                <ul class="wc-header-links" style="list-style: none; padding: 0; display: flex; justify-content: center; gap: 30px; margin-top: 1rem; border-top: 1px solid #2d3748; padding-top: 1rem;">
                    <li><a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"><?php esc_html_e( 'Tienda', 'amazonia-theme' ); ?></a></li>
                    <li><a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>"><?php esc_html_e( 'Mi Cuenta', 'amazonia-theme' ); ?></a></li>
                    <li>
                        <a class="cart-customlocation" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'Ver tu carrito', 'amazonia-theme' ); ?>">
                            <?php esc_html_e( 'Carrito', 'amazonia-theme' ); ?>
                            <span class="cart-count" style="background: #4ade80; color: #0f172a; padding: 2px 8px; border-radius: 999px; font-weight: bold; font-size: 0.8rem; margin-left: 5px;">
                                <?php echo WC()->cart ? wp_kses_data( WC()->cart->get_cart_contents_count() ) : '0'; ?>
                            </span>
                        </a>
                    </li>
                    <li><a href="<?php echo esc_url( wc_get_checkout_url() ); ?>"><?php esc_html_e( 'Checkout', 'amazonia-theme' ); ?></a></li>
                </ul>
            <?php endif; ?>
        </nav>
    </header>

    <div id="content" class="site-content">
