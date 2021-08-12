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

?>
</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

<style>
	footer {
		background: #251a1e;
		height: 14vh;
		padding: 2rem 2rem 10px 2rem;
	}

	footer .footermenu .head {
		font-size: 15px;
		color: #fff;
	}
</style>
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="flex-space-end footermenu" style="justify-content: space-around;">
		<div>
			<a href="#" style="color:#eedda0">Contact</a>
		</div>
	</div>
	<div>
		<p style="color:#fff" class="text-center">Copyright &copy; Wanalearn <?=date('Y')?></p>
	</div>
</footer><!-- #colophon -->

</div><!-- #page -->
<script>
    document.addEventListener('DOMContentLoaded',()=>{
 
     
       //load font family
        document.querySelector('#load-font-for-all-pages').href='https://fonts.googleapis.com/css?family=Varela';
    })
</script>
</body>

</html>