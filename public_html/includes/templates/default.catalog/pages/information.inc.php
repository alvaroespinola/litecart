<aside id="sidebar" class="box shadow rounded-corners">
  <?php include vmod::check(FS_DIR_HTTP_ROOT . WS_DIR_BOXES . 'box_information_links.inc.php'); ?>
</aside>

<main id="content">
  <!--snippet:notices-->

  <div id="box-information" class="box">
    <?php echo $content; ?>
  </div>
</main>