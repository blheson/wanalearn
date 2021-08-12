<?php

/**
 * Displays the content when the cover template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One_Child
 * @since Twenty Twenty One 1.0
 */
?>
<style>
    a.seemore {
        background: #e91e63;
        font-size: 9px;
        padding: 4px;
        color: #fff;
    }
    p.producttitle {
        height: 40px;
        }
    
    @media (min-width:969px) {
        p.producttitle {
            font-size: 20px;
        }
    }
</style>
<div class="row">
    <?php
   
    foreach ($args['products'] as $product) :
   
      if($product->get_status()== 'publish' &&  $product->get_featured()):
        $product_title = $product->get_name();
        $product_link = $product->get_permalink(); ?>
        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-6">
            <div style="margin-bottom: 1rem;border: 1px solid #ddd;padding: 5px;background-color: white;height:90px">
                <p class="producttitle"><?= $product_title ?></p>
                <a href="<?= $product_link ?>" class="seemore">see more</a>
            </div>
        </div>
    <?php endif; endforeach;
    ?>
</div>