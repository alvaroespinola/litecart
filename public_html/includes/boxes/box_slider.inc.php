<?php
  document::$snippets['head_tags']['nivo-slider'] = '<script src="'. WS_DIR_EXT .'nivo-slider/jquery.nivo.slider.pack.js"></script>' . PHP_EOL
                                                  . '<link rel="stylesheet" href="'. WS_DIR_EXT .'nivo-slider/nivo-slider.css" media="screen" />' . PHP_EOL
                                                  . '<link rel="stylesheet" href="'. WS_DIR_EXT .'nivo-slider/themes/default/default.css" media="screen" />';
  
  $box_slider_cache_id = cache::cache_id('box_slider', array('language'));
  if (cache::capture($box_slider_cache_id, 'file')) {
    
    $slides_query = database::query(
      "select * from ". DB_TABLE_SLIDES ."
      where status
      and language_code = '". database::input(language::$selected['code']) ."'
      and (date_valid_from <= '". date('Y-m-d H:i:s') ."')
      and (date_valid_to < '1971' or date_valid_to >= '". date('Y-m-d H:i:s') ."')
      order by priority asc;"
    );
    
    if (database::num_rows($slides_query)) {
    
      $box_slider = new view();
      
      $box_slider->snippets['slides'] = array();
      
      while ($slide = database::fetch($slides_query)) {
        $box_slider->snippets['slides'][] = array(
          'link' => $slide['link'],
          'image' => WS_DIR_IMAGES . $slide['image'],
          'caption' => $slide['caption'],
        );
      }
      
      echo $box_slider->stitch('views/box_slider');
      
    }
    
    cache::end_capture($box_slider_cache_id);
  }
?>
