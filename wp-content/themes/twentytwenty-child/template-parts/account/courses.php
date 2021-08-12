<?php
$user = $args['user'];
$root_for_asset = get_stylesheet_directory_uri();

use Cheap_Learning_Fast\Controllers\Woo_Commerce_Controller;

// if (isset($_GET['order_id']) && (int)$_GET['order_id'] > 0)
//     Woo_Commerce_Controller::set_user_id_for_order($user, (int)$_GET['order_id']);

$orders = Woo_Commerce_Controller::get_user_order($user->ID);

$order_count = count($orders['orders']);

?>
<style>
    .show_course_video {
        width: 560px;
        height: 315px;
    }

    .course_wrap {
        display: flex;
        justify-content: flex-start;
        flex-direction: row;
        flex-wrap: wrap;
    }

    @media (max-width:480px) {
        .show_course_video {
            width: 350px;
            /* height: 315px; */
        }

        .content-wrapper {
            padding: 0.8rem;
        }
    }

    .iframe-card {
        background-image: url('<?php echo  get_stylesheet_directory_uri() ?>/assets/img/loading-buffering.gif');

        background-repeat: no-repeat;

        background-position: center;
        background-size: 30px;
    }
</style>
<section style="display: none;" class="video_section">
    <div class="card iframe-card" style="min-height: 150px;">
        <iframe class="show_course_video" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>loading...</iframe>
    </div>
</section>
<section>
    <div class="video_course" class="course_wrap">


        <?php
        $orders = $orders['orders'];
        $count_complete = 0;
        if (!empty($orders)) {
            foreach ($orders as $order) {
                if ($order['status'] == 'completed') {
                    $count_complete++;
                    $items = wc_get_order($order['id'])->get_items();
                    foreach ($items  as $item_id => $item) {

                        $link = $item->get_product()->get_description();

                        $short_description = $item->get_product()->get_short_description();
                        $product_name = $item->get_name();
        ?>
                        <div style="margin: 10px;">
                            <div class="card" style="width: 18rem;">

                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $product_name ?></h5>
                                    <p class="card-text"><?php echo $short_description ?></p>
                                    <span href="#" class="btn btn-primary btn-view" data-src_vid="<?php echo $link ?>">View</span>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }
        }

        if (empty($orders) || $count_complete < 1) {
            ?>
            <div style="text-align: center;font-size: 53px;font-weight: 700;color: #c7c7c7;padding-top: 5rem;">
                No Course Content
            </div><?php

                } 
                    ?>

            <!-- <section>
                <div style="margin: auto;
            width: 205px;text-align:center;margin-top:30px"><a href="https://t.me/joinchat/FL_i3BWRezowZDVk" style="padding: 10px;background: #0088cc;color: #fff;border-radius: 10px;font-size:10px" target='_blank'>Join Our Telegram Community</a></div>
            </section> -->
       
    </div>

</section>





<script>
    document.querySelector('.video_course').addEventListener('click', (e) => {
        if (!e.target.classList.contains('btn-view')) {
            return
        }
        document.querySelector('.show_course_video').src = e.target.dataset.src_vid
        console.log(e.target.dataset.src_vid)
        document.querySelector('.video_section').style.display = 'block'
    })
</script>