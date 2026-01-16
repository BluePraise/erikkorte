<?php

/* Template Name: Contact Us */

get_header();

get_template_part('template-parts/hero-banner');

$contact_details = get_field('contact_us_details');
?>
<div class="content-wrapper">
    <?php if (!empty($contact_details)) { ?>
        <div class="container-fluid my-lg-5 my-3">
            <div class="row contact-info-row">
                <?php foreach ($contact_details as $key => $row) { ?>
                    <div class="col-sm-12 col-lg-3">
                        <div class="icon">
                            <img src="<?php echo $row['icon']; ?>" />
                        </div>
                        <h2><?php echo $row['title']; ?></h2>
                        <?php if ($row['link'] != '') { ?>
                            <a href="<?php echo $row['link']; ?>">
                                <p><?php echo $row['contant']; ?></p>
                            </a>
                        <?php } else { ?>
                            <p><?php echo $row['contant']; ?></p>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    <div class="container-fluid my-lg-5 my-3">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="contact-map-container">
                    <?php echo get_field('map'); ?>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6">
                <div class="contact-form">
                    <?php
                    $form_code = get_field('form_code');
                    if ($form_code) {
                        echo do_shortcode($form_code);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();

?>