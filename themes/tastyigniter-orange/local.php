<?php echo get_header(); ?>
<?php echo get_partial('content_top'); ?>
<?php if ($this->alert->get()) { ?>
    <div id="notification">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->alert->display(); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<div id="page-content">
    <div class="container">
        <div class="row">
            <?php
            if (partial_exists('content_right')) {
                $class = "col-sm-8 col-md-9";
            } else {
                $class = "col-sm-12";
            }

            if (partial_exists('content_left')) {
                $menu_class = "col-sm-12 col-md-9";
            } else {
                $menu_class = "col-sm-9";
            }
            ?>

            <div class="<?php echo $class; ?>">
                <div class="row wrap-vertical">
                    <?php echo load_partial('local_tabs'); ?>
                </div>

                <div class="tab-content tab-content-line content">
                    <?php if ($active_tab === 'menus') { ?>
                        <div id="local-menus" class="tab-pane row wrap-all active">

                            <?php echo get_partial('content_left', 'col-md-3 hidden-xs hidden-sm'); ?>

                            <div class="<?php echo $menu_class; ?>">
                                <?php echo load_partial('menu_list', $menu_list); ?>
                            </div>
                        </div>

                    <?php } else if ($active_tab === 'reviews' AND config_item('allow_reviews') != '1') { ?>
                        <div id="local-reviews" class="tab-pane row wrap-all active">
                            <div class="col-md-12">
                                <div class="heading-section">
                                    <h4><?php echo sprintf(lang('text_review_heading'), $local_reviews['location_name']); ?></h4>
                                    <span class="under-heading"></span>
                                </div>
                            </div>

                            <?php echo load_partial('local_reviews', $local_reviews); ?>
                        </div>
                    <?php } else if ($active_tab === 'info') { ?>

                        <div id="local-information" class="tab-pane row wrap-all active">
                            <?php echo load_partial('local_info', $local_info); ?>
                        </div>

                    <?php } else if ($active_tab === 'gallery' AND !empty($local_gallery)) { ?>

                        <div id="local-gallery" class="tab-pane row wrap-all active">
                            <?php echo load_partial('local_gallery', $local_gallery); ?>
                        </div>

                    <?php } ?>
                </div>
            </div>
            <?php echo get_partial('content_right', 'col-sm-4 col-md-3'); ?>
            <?php echo get_partial('content_bottom'); ?>
        </div>
    </div>
</div>
<?php echo get_footer(); ?>