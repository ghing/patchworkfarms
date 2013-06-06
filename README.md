Patchwork
=========

Patchwork is the theme for http://chicagopatchworkfarms.org. It is based on
[Roots Theme](http://www.rootstheme.com/)

Setup
-----

Configure a menu and assign it to the ``Primary Navigation`` theme location

Make sure their is a static front page

Set the featured image of the home page to something big

Components
----------

Homepage Nav
------------

You can add navigation to sections on the homepage by adding a Text widget
like this to the ``Homepage Header`` area:

```
<nav>
  <ul>
    <li><a href="#hours-location">Location and Hours</a></li>
  </ul>
</nav>
```

Big Map
-------

```
<section id="hours-location" class="big-map-container">
  <img src="http://dev.chicagopatchworkfarms.terrorware.com/wp-content/uploads/2013/04/patchwork_farms_map.png" alt="patchwork_farms_map" width="1440" height="965" class="big-map" />
  <div class="map-content span4 offset1">
    <p>From mid-May through October we sell fruits, veggies, and plants at our garden at 2825 W. Chicago Ave (next to Feed Restaurant) during the following hours:</p>

    <p>
    Sundays  Noon-5<br />
    Wednesdays  Noon-5
    </p>

    <p>If you'd like to volunteer, you should also come during this time.</p>
  </div>
</section>
```
