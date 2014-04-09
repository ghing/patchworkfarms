<?php
$first = true;
$args = array(
    'post_type' => 'pw_location',
);
$locations = new WP_Query($args);
?>

<?php if ($locations->have_posts()): ?>

<nav id="hours-location" class="nav-locations container">
    <h2>Locations</h2>
    <ul class="nav nav-pills">
    <?php while ($locations->have_posts()): ?>
    <?php $locations->the_post(); ?>
        <li class="<?php if ($first) echo "active" ?>"><a href="#location-<?php echo $post->post_name; ?>"><?php the_title(); ?></a></li> 
    <?php $first = false; ?>
    <?php endwhile; ?>
    </ul>
</nav>

<?php $first = true; ?>
<?php while ($locations->have_posts()): ?>
<?php $locations->the_post(); ?>    
<section class="big-map-container location" id="location-<?php echo $post->post_name; ?>" style="<?php if (!$first) echo "display: none" ?>">
  <img class="big-map" src="<?php echo get_post_meta($post->ID, 'map_image', true); ?>">
  <div class="map-content span4 offset1">
      <?php the_content(); ?>
  </div>
</section>
<?php $first = false; ?>
<?php endwhile; ?>

<?php endif; ?>
