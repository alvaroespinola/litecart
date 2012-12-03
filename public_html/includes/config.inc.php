<?php

######################################################################
## Files and Directory  ##############################################
######################################################################

// File System
  define('FS_DIR_HTTP_ROOT', realpath($_SERVER['DOCUMENT_ROOT']));
  
// Web System
  define('WS_DIR_HTTP_HOME', str_replace(FS_DIR_HTTP_ROOT, '', realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..') . DIRECTORY_SEPARATOR));
  
  define('WS_DIR_ADMIN',       WS_DIR_HTTP_HOME . 'admin' . DIRECTORY_SEPARATOR);
  define('WS_DIR_AJAX',        WS_DIR_HTTP_HOME  . 'ajax' . DIRECTORY_SEPARATOR);
  define('WS_DIR_CACHE',       WS_DIR_HTTP_HOME  . 'cache' . DIRECTORY_SEPARATOR);
  define('WS_DIR_DATA',        WS_DIR_HTTP_HOME . 'data' . DIRECTORY_SEPARATOR);
  define('WS_DIR_EXT',         WS_DIR_HTTP_HOME . 'ext' . DIRECTORY_SEPARATOR);
  define('WS_DIR_IMAGES',      WS_DIR_HTTP_HOME . 'images' . DIRECTORY_SEPARATOR);
  define('WS_DIR_INCLUDES',    WS_DIR_HTTP_HOME . 'includes' . DIRECTORY_SEPARATOR);
  define('WS_DIR_JOBS',        WS_DIR_HTTP_HOME . 'jobs' . DIRECTORY_SEPARATOR);
  
  define('WS_DIR_BOXES',       WS_DIR_INCLUDES  . 'boxes' . DIRECTORY_SEPARATOR);
  define('WS_DIR_CLASSES',     WS_DIR_INCLUDES  . 'classes' . DIRECTORY_SEPARATOR);
  define('WS_DIR_CONTROLLERS', WS_DIR_INCLUDES  . 'controllers' . DIRECTORY_SEPARATOR);
  define('WS_DIR_FUNCTIONS',   WS_DIR_INCLUDES  . 'functions' . DIRECTORY_SEPARATOR);
  define('WS_DIR_JAVASCRIPTS', WS_DIR_INCLUDES  . 'javascripts' . DIRECTORY_SEPARATOR);
  define('WS_DIR_LIBRARY',     WS_DIR_INCLUDES  . 'library' . DIRECTORY_SEPARATOR);
  define('WS_DIR_MODULES',     WS_DIR_INCLUDES  . 'modules' . DIRECTORY_SEPARATOR);
  define('WS_DIR_PROCESSORS',  WS_DIR_INCLUDES  . 'processors' . DIRECTORY_SEPARATOR);
  define('WS_DIR_REFERENCES',  WS_DIR_INCLUDES  . 'references' . DIRECTORY_SEPARATOR);
  define('WS_DIR_TEMPLATES',   WS_DIR_INCLUDES  . 'templates' . DIRECTORY_SEPARATOR);
  define('WS_DIR_WIDGETS',     WS_DIR_INCLUDES  . 'widgets' . DIRECTORY_SEPARATOR);
  
######################################################################
## Database ##########################################################
######################################################################

// Database
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'timint_sandbox');
  define('DB_PASSWORD', '123456');
  define('DB_DATABASE', 'timint_sandbox');
  define('DB_TABLE_PREFIX', 'c_');
  define('DB_DATABASE_CHARSET', 'utf8'); // utf8 or latin1
  define('DB_PERSISTENT_CONNECTIONS', 'false');
  
// Database tables
  define('DB_TABLE_ADDRESSES',                         DB_DATABASE .'.'. DB_TABLE_PREFIX . 'addresses');
  define('DB_TABLE_CATEGORIES',                        DB_DATABASE .'.'. DB_TABLE_PREFIX . 'categories');
  define('DB_TABLE_CATEGORIES_INFO',                   DB_DATABASE .'.'. DB_TABLE_PREFIX . 'categories_info');
  define('DB_TABLE_COUNTRIES',                         DB_DATABASE .'.'. DB_TABLE_PREFIX . 'countries');
  define('DB_TABLE_CURRENCIES',                        DB_DATABASE .'.'. DB_TABLE_PREFIX . 'currencies');
  define('DB_TABLE_CUSTOMERS',                         DB_DATABASE .'.'. DB_TABLE_PREFIX . 'customers');
  define('DB_TABLE_DELIVERY_STATUS',                   DB_DATABASE .'.'. DB_TABLE_PREFIX . 'delivery_status');
  define('DB_TABLE_DELIVERY_STATUS_INFO',              DB_DATABASE .'.'. DB_TABLE_PREFIX . 'delivery_status_info');
  define('DB_TABLE_DESIGNERS',                         DB_DATABASE .'.'. DB_TABLE_PREFIX . 'designers');
  define('DB_TABLE_DESIGNERS_INFO',                    DB_DATABASE .'.'. DB_TABLE_PREFIX . 'designers_info');
  define('DB_TABLE_GEO_ZONES',                         DB_DATABASE .'.'. DB_TABLE_PREFIX . 'geo_zones');
  define('DB_TABLE_LANGUAGES',                         DB_DATABASE .'.'. DB_TABLE_PREFIX . 'languages');
  define('DB_TABLE_MANUFACTURERS',                     DB_DATABASE .'.'. DB_TABLE_PREFIX . 'manufacturers');
  define('DB_TABLE_MANUFACTURERS_INFO',                DB_DATABASE .'.'. DB_TABLE_PREFIX . 'manufacturers_info');
  define('DB_TABLE_OPTION_GROUPS',                     DB_DATABASE .'.'. DB_TABLE_PREFIX . 'option_groups');
  define('DB_TABLE_OPTION_GROUPS_INFO',                DB_DATABASE .'.'. DB_TABLE_PREFIX . 'option_groups_info');
  define('DB_TABLE_OPTION_VALUES',                     DB_DATABASE .'.'. DB_TABLE_PREFIX . 'option_values');
  define('DB_TABLE_OPTION_VALUES_INFO',                DB_DATABASE .'.'. DB_TABLE_PREFIX . 'option_values_info');
  define('DB_TABLE_ORDERS',                            DB_DATABASE .'.'. DB_TABLE_PREFIX . 'orders');
  define('DB_TABLE_ORDERS_COMMENTS',                   DB_DATABASE .'.'. DB_TABLE_PREFIX . 'orders_comments');
  define('DB_TABLE_ORDERS_ITEMS',                      DB_DATABASE .'.'. DB_TABLE_PREFIX . 'orders_items');
  define('DB_TABLE_ORDERS_TOTALS',                     DB_DATABASE .'.'. DB_TABLE_PREFIX . 'orders_totals');
  define('DB_TABLE_ORDERS_STATUS',                     DB_DATABASE .'.'. DB_TABLE_PREFIX . 'orders_status');
  define('DB_TABLE_ORDERS_STATUS_INFO',                DB_DATABASE .'.'. DB_TABLE_PREFIX . 'orders_status_info');
  define('DB_TABLE_ORDERS_TAX',                        DB_DATABASE .'.'. DB_TABLE_PREFIX . 'orders_tax');
  define('DB_TABLE_PAGES',                             DB_DATABASE .'.'. DB_TABLE_PREFIX . 'pages');
  define('DB_TABLE_PAGES_INFO',                        DB_DATABASE .'.'. DB_TABLE_PREFIX . 'pages_info');
  define('DB_TABLE_PRODUCT_GROUPS',                    DB_DATABASE .'.'. DB_TABLE_PREFIX . 'product_groups');
  define('DB_TABLE_PRODUCT_GROUPS_INFO',               DB_DATABASE .'.'. DB_TABLE_PREFIX . 'product_groups_info');
  define('DB_TABLE_PRODUCT_GROUPS_VALUES',             DB_DATABASE .'.'. DB_TABLE_PREFIX . 'product_groups_values');
  define('DB_TABLE_PRODUCT_GROUPS_VALUES_INFO',        DB_DATABASE .'.'. DB_TABLE_PREFIX . 'product_groups_values_info');
  define('DB_TABLE_PRODUCTS',                          DB_DATABASE .'.'. DB_TABLE_PREFIX . 'products');
  define('DB_TABLE_PRODUCTS_CAMPAIGNS',                DB_DATABASE .'.'. DB_TABLE_PREFIX . 'products_campaigns');
  define('DB_TABLE_PRODUCTS_OPTIONS',                  DB_DATABASE .'.'. DB_TABLE_PREFIX . 'products_options');
  define('DB_TABLE_PRODUCTS_OPTIONS_STOCK',            DB_DATABASE .'.'. DB_TABLE_PREFIX . 'products_options_stock');
  define('DB_TABLE_PRODUCTS_IMAGES',                   DB_DATABASE .'.'. DB_TABLE_PREFIX . 'products_images');
  define('DB_TABLE_PRODUCTS_INFO',                     DB_DATABASE .'.'. DB_TABLE_PREFIX . 'products_info');
  define('DB_TABLE_PRODUCTS_PRICES',                   DB_DATABASE .'.'. DB_TABLE_PREFIX . 'products_prices');
  define('DB_TABLE_SEO_LINKS_CACHE',                   DB_DATABASE .'.'. DB_TABLE_PREFIX . 'seo_links_cache');
  define('DB_TABLE_SETTINGS',                          DB_DATABASE .'.'. DB_TABLE_PREFIX . 'settings');
  define('DB_TABLE_SETTINGS_GROUPS',                   DB_DATABASE .'.'. DB_TABLE_PREFIX . 'settings_groups');
  define('DB_TABLE_SOLD_OUT_STATUS',                   DB_DATABASE .'.'. DB_TABLE_PREFIX . 'sold_out_status');
  define('DB_TABLE_SOLD_OUT_STATUS_INFO',              DB_DATABASE .'.'. DB_TABLE_PREFIX . 'sold_out_status_info');
  define('DB_TABLE_SUPPLIERS',                         DB_DATABASE .'.'. DB_TABLE_PREFIX . 'suppliers');
  define('DB_TABLE_TAX_RATES',                         DB_DATABASE .'.'. DB_TABLE_PREFIX . 'tax_rates');
  define('DB_TABLE_TAX_CLASSES',                       DB_DATABASE .'.'. DB_TABLE_PREFIX . 'tax_classes');
  define('DB_TABLE_TRANSLATIONS',                      DB_DATABASE .'.'. DB_TABLE_PREFIX . 'translations');
  define('DB_TABLE_ZONES',                             DB_DATABASE .'.'. DB_TABLE_PREFIX . 'zones');
  define('DB_TABLE_ZONES_TO_GEO_ZONES',                DB_DATABASE .'.'. DB_TABLE_PREFIX . 'zones_to_geo_zones');

######################################################################
## Application #######################################################
######################################################################
  
// Set session lifetime in seconds
  ini_set('session.gc_maxlifetime', 180000);
  
// Errors
  error_reporting(E_ALL);
  ini_set('ignore_repeated_errors', 'On');
  ini_set('log_errors', 'On');
  ini_set('error_log', FS_DIR_HTTP_ROOT . WS_DIR_DATA . 'errors.log');
  ini_set('display_errors', 'Off');
  if (in_array($_SERVER['REMOTE_ADDR'], array('0.0.0.0', '193.14.28.120'))) {
    ini_set('display_errors', 'On');
  }
  
// Server Cookie ID
  define('SESSION_UNIQUE_ID', 'litecart');
  
// Password Encryption Salt
  define('PASSWORD_SALT', '00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000');
  
?>