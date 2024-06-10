<?php
/**
 * The Header for our theme.
 *
 * @package OceanWP WordPress theme
 */

?>
<!DOCTYPE html>
<html class="<?php echo esc_attr( oceanwp_html_classes() ); ?>" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php oceanwp_schema_markup( 'html' ); ?>>

	<?php wp_body_open(); ?>

	<?php do_action( 'ocean_before_outer_wrap' ); ?>

	<div id="outer-wrap" class="site clr">

		<a class="skip-link screen-reader-text" href="#main"><?php echo esc_html( oceanwp_theme_strings( 'owp-string-header-skip-link', false ) ); ?></a>

		<?php do_action( 'ocean_before_wrap' ); ?>

		<div id="wrap" class="clr">

			<?php do_action( 'ocean_top_bar' ); ?>

            
			<?php do_action( 'ocean_header' ); ?>
            
            <nav id="planty_menu">
                    <ul class="flexmenu">
                        
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'topbar_menu',
                                'menu_id'        => 'header_menu',
                               // 'fallback_cb'    => 'planty_menu_fallback', // Assurez-vous que cette fonction de repli existe
                            ));
                        ?>
                        
                         <div class="buttoncontenair">
                        <a href="http://planty.local/precommande/" class="buttoncommander">Commander</a>
                        </div>
                    </ul>
                </nav>

			<?php do_action( 'ocean_before_main' ); ?>
           
			<main id="main" class="site-main clr"<?php oceanwp_schema_markup( 'main' ); ?> role="main">

            </main>
        </div>
    </div>
</body>

