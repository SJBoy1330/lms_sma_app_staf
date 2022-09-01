<?php include_once("header.php"); ?>
<?php include_once("sidemenu.php"); ?>
<div id="reload-content">
    <script src="https://kit.fontawesome.com/b2ed95a515.js" crossorigin="anonymous"></script>
    <?php

    echo alert_show($this->session->flashdata('judul'), $this->session->flashdata('message'), $this->session->flashdata('icon'), $this->session->flashdata('image'));

    ?>
    <?php
    if (isset($css_add) && is_array($css_add)) {
        foreach ($css_add as $css) {
            echo $css;
        }
    } else {
        echo (isset($css_add) && ($css_add != "") ? $css_add : "");
    }
    ?>
    <?php echo $content; ?>

</div>
<?php include_once("javascript.php"); ?>

<?php include_once("footer.php"); ?>