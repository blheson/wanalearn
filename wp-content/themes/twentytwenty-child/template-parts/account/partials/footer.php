<?php

use Cheap_Learning_Fast\Plugin;

?>
  <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Wanalearn. All rights reserved.</span>
          </div>
        </footer>
<script>
    let site_url ='<?php echo site_url() ?>'
    let rest_route = '<?php echo $rest_api = site_url() . '/wp-json/' . Plugin::get_instance()->get_api_route_namespace() ?>user/logout'
    document.getElementById('logout').addEventListener('click', (e) => {
        e.target.innerHTML = '<i class="icon-loader menu-icon rotate"></i>'
        console.log(0);
        fetch(rest_route).then(response => response.json()).then(result => {
            window.location=`${site_url}/account/login`
        })
    })
</script>