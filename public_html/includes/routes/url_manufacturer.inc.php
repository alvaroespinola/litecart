<?php
  
  class url_manufacturer {
    
    function routes() {
      return array(
        array(
          'pattern' => '#^.*-m-([0-9]+)/?$#',
          'script' => FS_DIR_HTTP_ROOT . WS_DIR_PAGES .'manufacturer.inc.php',
          'params' => 'manufacturer_id=$1',
        ),
      );
    }
    
  	function rewrite($parsed_link, $language_code) {
      
      if (!isset($parsed_link['query']['manufacturer_id'])) return;
      
      $manufacturer_query = database::query(
        "select id, name from ". DB_TABLE_MANUFACTURERS ."
        where id = '". (int)$parsed_link['query']['manufacturer_id'] ."'
        limit 1;"
      );
      $manufacturer = database::fetch($manufacturer_query);
      if (empty($manufacturer)) return;
      
      $parsed_link['path'] = functions::general_path_friendly($manufacturer['name']) .'-m-'. $manufacturer['id'] .'/';
      
      unset($parsed_link['query']['manufacturer_id']);
      
      return $parsed_link;
    }
  }
  
?>