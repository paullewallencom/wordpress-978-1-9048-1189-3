<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
<input type="submit" value="<?php _e('Search'); ?>" />
</form>
