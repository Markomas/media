<?php

//------------------------------------------------------------------------------
// Configuration to get all data
//------------------------------------------------------------------------------


// Data Return Configuration - Manipulate if you want to tune your results
$cnf['appender']['movie'] = array('credits', 'images', 'release_dates', 'videos', 'reviews', 'rating');
$cnf['appender']['tvshow'] = array('account_states', 'alternative_titles', 'changes', 'content_rating', 'credits', 'external_ids', 'images', 'keywords', 'rating', 'similar', 'translations', 'videos');
$cnf['appender']['season'] = array('changes', 'account_states', 'credits', 'external_ids', 'images', 'videos');
$cnf['appender']['episode'] = array('changes', 'account_states', 'credits', 'external_ids', 'images', 'rating', 'videos');
$cnf['appender']['person'] = array('movie_credits', 'tv_credits', 'combined_credits', 'external_ids', 'images', 'tagged_images', 'changes');
$cnf['appender']['collection'] = array('images');
$cnf['appender']['company'] = array('movies');

?>
