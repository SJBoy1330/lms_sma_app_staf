<!-- Required jquery and libraries -->

<script src="<?= base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js"></script>

<script>
    var BASE_URL = baseUrl = '<?= base_url(); ?>';
    var loading_scene = new bootstrap.Modal(document.getElementById("loading_scene"), {});
    var css_button = 'btn btn-block btn-md';
</script>
<!-- swiper js script -->
<script src="<?= base_url(); ?>assets/vendor/swiperjs-6.6.2/swiper-bundle.min.js"></script>


<!-- Customized jquery file  -->
<script src="<?= base_url(); ?>assets/js/main.js"></script>
<script src="<?= base_url(); ?>assets/js/color-scheme.js"></script>

<!-- PWA app service registration and works -->
<script src="<?= base_url(); ?>assets/js/pwa-services.js"></script>
<script src="<?= base_url(); ?>assets/js/global.js?v=<?= date('YmdHis'); ?>"></script>
<script src="<?= base_url(); ?>assets/js/page/function.js?v=<?= date('YmdHis'); ?>"></script>

<script src="<?= base_url('assets/js/alert/sweetalert2.all.min.js') ?>"></script>
<script src="<?= base_url('assets/js/alert/scriptalert.js') ?>"></script>
<?php

if (isset($js_add) && is_array($js_add)) {
    foreach ($js_add as $js) {
        echo $js;
    }
} else {
    echo (isset($js_add) && ($js_add != "") ? $js_add : "");
}

?>