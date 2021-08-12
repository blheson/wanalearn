<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
$root_for_asset = get_stylesheet_directory_uri()
?>

<!-- plugins:js -->
<script src="<?php echo $root_for_asset ?>/assets/vendors/js/vendor.bundle.base.js"></script>

<script src="<?php echo $root_for_asset ?>/assets/js/off-canvas.js"></script>
<!-- endinject -->

</div><!-- page body wrapper -->
</div><!-- container scroller -->
<script>
	document.addEventListener('DOMContentLoaded', () => {


		//load font family
		document.querySelector('#load-font-for-all-pages').href = 'https://fonts.googleapis.com/css?family=Varela';
	})
</script>
</body>

</html>