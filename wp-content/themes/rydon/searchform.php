<?php
/**
 * Template for displaying search forms in Rydon
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" value="<?php esc_html_e('Search Site...','rydon'); ?>" onfocus="this.value=''; this.onfocus=null;" name="s" id="s" />
</form>