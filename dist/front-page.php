<?php
$sermons_args = array(
    'numberposts' => '1',
    'post_status' => 'publish',
    'meta_key' => '_thumbnail_id',
    'post_type' => 'page'
);
$sermons = wp_get_recent_posts($sermons_args)[0];

$recent_posts_args = array(
    'numberposts' => '6',
    'post_status' => 'publish'
);
$recent_posts = wp_get_recent_posts($recent_posts_args);

$container = get_theme_mod('understrap_container_type');
get_header();
?>

<div class="wrapper" id="home-wrapper">
    <main class="site-main" id="main">
        <div class="<?php echo esc_attr($container); ?>">
            <h1>Connect with <span class="script">God</span></h1>
        </div>
        <div class="<?php echo esc_attr($container); ?> well">
            <div class="row">
                <div class="d-flex flex-column col-md mb-4 mb-md-0">
                    <h2>Weekly Worship Schedule</h2>
                    Identical services at 9:00 am and 10:30 am.
                    <div class="mt-auto">
                        <a class="btn btn-primary btn-sm mt-3" href="<?php echo esc_url(home_url('sermons')); ?>">Sermons</a>
                        <a class="btn btn-primary btn-sm mt-3" href="https://www.rightnowmedia.org/Account/Invite/CollegeParkChurch" target="_blank">RightNow Media</a>
                        <a class="btn btn-primary btn-sm mt-3" href="<?php echo esc_url(home_url('contact-us')); ?>">Contact Us</a>
                    </div>
                </div>
                <div class="col-md">
                    <?php if (has_post_thumbnail($sermons["ID"])) : ?>
                        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($sermons["ID"]), 'single-post-thumbnail'); ?>
                        <a href="<?php echo get_permalink($sermons["ID"]); ?>">
                            <img src="<?php echo $image[0]; ?>" alt="<?php echo $sermons["post_title"]; ?>" />
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="<?php echo esc_attr($container); ?>">
            <h1>Connect with <span class="script">others</span></h1>
        </div>
        <div class="<?php echo esc_attr($container); ?> well others text-center">
            <div class="row">
                <div class="col">
                    <a href="<?php echo esc_url(home_url('adult-ministries')); ?>">
                        <img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/images/cp-adults.png" alt="Adults" />
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo esc_url(home_url('youth-ministries')); ?>">
                        <img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/images/cp-youth.png" alt="Youth" />
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo esc_url(home_url('childrens-ministries')); ?>">
                        <img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/images/cp-children.png" alt="Children" />
                    </a>
                </div>
            </div>
        </div>
        <div class="<?php echo esc_attr($container); ?>">
            <h1>Connect with <span class="script">College Park</span></h1>
        </div>
        <div class="<?php echo esc_attr($container); ?> well">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-md-0 ml-lg-auto mr-lg-auto">
                    <a class="image-overlay" href="<?php echo esc_url(home_url('missions-ministries')); ?>">
                        <div class="image-text">impact the world for Christ</div>
                        <img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/images/missions.png" alt="Missions" />
                    </a>
                </div>
            </div>
            <div class="row mt-md-4">
                <div class="col-md mb-4 mb-md-0">
                    <h2>Latest News</h2>
                    <dl>
                        <?php foreach ($recent_posts as $recent) { ?>
                            <dd><a href="<?php echo get_permalink($recent["ID"]); ?>"><?php echo $recent["post_title"]; ?></a></dd>
                        <?php } ?>
                    </dl>
                    <div class="mt-auto">
                        <a class="btn btn-primary btn-sm" href="<?php echo esc_url(home_url('category/news')); ?>">View All News</a>
                    </div>
                </div>
                <div class="d-flex flex-column col-md">
                    <?php if (is_active_sidebar('home-upcoming-events')) : ?>
                        <?php dynamic_sidebar('home-upcoming-events'); ?>
                    <?php endif; ?>
                    <div class="mt-auto">
                        <a class="btn btn-primary btn-sm" href="<?php echo esc_url(home_url('calendar/upcoming-events/')); ?>">View All Events</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
