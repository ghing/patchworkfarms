<?php
$first = true;
$args = array(
    'post_type' => 'pw_location',
    'orderby' => 'menu_order',
    'order' => 'ASC',
);
$locations = new WP_Query($args);
?>

<?php if ($locations->have_posts()): ?>

<section id="hours-location">
    <div class="container">
        <h2>Locations</h2>

        <nav class="nav-locations">
            <ul class="nav nav-pills">
            <?php while ($locations->have_posts()): ?>
            <?php $locations->the_post(); ?>
                <li class="<?php if ($first) echo "first" ?>"><a href="#location-<?php echo $post->post_name; ?>"><?php the_title(); ?></a></li> 
            <?php $first = false; ?>
            <?php endwhile; ?>
            </ul>
        </nav>
    </div>

    <?php 
    $first = true;
    while ($locations->have_posts()): 
    ?>
    <?php $locations->the_post(); ?>    
    <div class="big-map-container location <?php if ($first) echo "first" ?>" id="location-<?php echo $post->post_name; ?>">
      <div class="map-content span4 offset1">
          <?php the_content(); ?>
      </div>
      <!-- <img class="big-map" src="<?php echo get_post_meta($post->ID, 'map_image', true); ?>"> -->
      <?php 
      the_post_thumbnail('full', array(
          'class' => 'background',
      )); 
      $thumb = get_post(get_post_thumbnail_id($post->ID));
      ?>
      <div class="img-description"><?php echo $thumb->post_content; ?></div>
    
    </div>
    <?php $first = false; ?>
    <?php endwhile; ?>
</section>

<?php endif; ?>
