<?php
  document::$snippets['head_tags']['chartist'] = '<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>';

  document::$snippets['head_tags']['chartist'] = '<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>';
  
  document::$snippets['head_tags']['chartist'] = '<style>html, body {height: 100%;margin: 0;}#map {width: 100%;height: 400px;}</style>';
  	
?>
<section id="box-checkout-customer" class="box">
  <?php echo functions::form_draw_hidden_field('customer_details', 'true'); ?>

  <?php if (empty(customer::$data['id'])) { ?>
  <div style="float:right">
    <a href="<?php echo document::ilink('login', array('redirect_url' => document::ilink('checkout'))) ?>" data-toggle="lightbox" data-require-window-width="768"><?php echo language::translate('title_sign_in', 'Sign In'); ?></a>
  </div>
  <?php } ?>

  <h2 class="title"><?php echo language::translate('title_customer_details', 'Customer Details'); ?></h2>

  <div class="address billing-address">

    <?php if (settings::get('customer_field_company') || settings::get('customer_field_tax_id')) { ?>
    <div class="row">
      <?php if (settings::get('customer_field_company')) { ?>
      <div class="form-group col-xs-6">
        <label><?php echo language::translate('title_company', 'Company'); ?> (<?php echo language::translate('text_or_leave_blank', 'Or leave blank'); ?>)</label>
        <?php echo functions::form_draw_text_field('company', true); ?>
      </div>
      <?php } ?>

      <?php if (settings::get('customer_field_tax_id')) { ?>
      <div class="form-group col-xs-6">
        <label><?php echo language::translate('title_tax_id', 'Tax ID'); ?></label>
        <?php echo functions::form_draw_text_field('tax_id', true); ?>
      </div>
      <?php } ?>
    </div>
    <?php } ?>

    <div class="row">
      <div class="form-group col-xs-6">
        <label><?php echo language::translate('title_firstname', 'First Name'); ?></label>
        <?php echo functions::form_draw_text_field('firstname', true, 'required="required"'); ?>
      </div>

      <div class="form-group col-xs-6">
        <label><?php echo language::translate('title_lastname', 'Last Name'); ?></label>
        <?php echo functions::form_draw_text_field('lastname', true, 'required="required"'); ?>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-xs-6">
        <label><?php echo language::translate('title_address1', 'Address 1'); ?></label>
        <?php echo functions::form_draw_text_field('address1', true, 'required="required"'); ?>
      </div>

      <div class="form-group col-xs-6">
        <label><?php echo language::translate('title_address2', 'Address 2'); ?></label>
        <?php echo functions::form_draw_text_field('address2', true); ?>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-xs-6">
        <label><?php echo language::translate('title_latitude', 'Latitude'); ?></label>
        <?php echo functions::form_draw_decimal_field('latitude', '',14,-180,+180); ?>
      </div>

      <div class="form-group col-xs-6">
        <label><?php echo language::translate('title_longitude', 'Longitude'); ?></label>
        <?php echo functions::form_draw_decimal_field('longitude','',14,-180,+180); ?>
      </div>
    </div>
	<div class="row">
		<div class="form-group col-sm-6">
			<?php include(FS_DIR_APP . 'includes/leaflet.inc.html'); ?>
		</div>
    </div>
	
    <div class="row">
      <div class="form-group col-xs-6">
        <label><?php echo language::translate('title_postcode', 'Postal Code'); ?></label>
        <?php echo functions::form_draw_text_field('postcode', true); ?>
      </div>

      <div class="form-group col-xs-6">
        <label><?php echo language::translate('title_city', 'City'); ?></label>
        <?php echo functions::form_draw_text_field('city', true); ?>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-xs-6">
        <label><?php echo language::translate('title_country', 'Country'); ?></label>
        <?php echo functions::form_draw_countries_list('country_code', true); ?>
      </div>

      <div class="form-group col-xs-6">
        <label><?php echo language::translate('title_zone_state_province', 'Zone/State/Province'); ?></label>
        <?php echo functions::form_draw_zones_list(isset($_POST['country_code']) ? $_POST['country_code'] : '', 'zone_code', true); ?>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-xs-6">
        <label><?php echo language::translate('title_email_address', 'Email Address'); ?></label>
        <?php echo functions::form_draw_email_field('email', true, 'required="required"'. (!empty(customer::$data['id']) ? ' readonly="readonly"' : '')); ?>
      </div>

      <div class="form-group col-xs-6">
        <label><?php echo language::translate('title_phone', 'Phone'); ?></label>
        <?php echo functions::form_draw_phone_field('phone', true, 'required="required"'); ?>
      </div>
    </div>
  </div>

  <div class="address shipping-address">

    <h3><?php echo functions::form_draw_checkbox('different_shipping_address', '1', !empty($_POST['different_shipping_address']) ? '1' : '', 'style="margin: 0px;"'); ?> <?php echo language::translate('title_different_shipping_address', 'Different Shipping Address'); ?></h3>

    <fieldset<?php echo (empty($_POST['different_shipping_address'])) ? ' style="display: none;" disabled="disabled"' : false; ?>>

      <?php if (settings::get('customer_field_company')) { ?>
      <div class="row">
        <div class="form-group col-xs-6">
        <label><?php echo language::translate('title_company', 'Company'); ?> (<?php echo language::translate('text_or_leave_blank', 'Or leave blank'); ?>)</label>
          <?php echo functions::form_draw_text_field('shipping_address[company]', true); ?>
        </div>
      </div>
      <?php } ?>

      <div class="row">
        <div class="form-group col-sm-6">
          <label><?php echo language::translate('title_firstname', 'First Name'); ?></label>
          <?php echo functions::form_draw_text_field('shipping_address[firstname]', true); ?>
        </div>

        <div class="form-group col-sm-6">
          <label><?php echo language::translate('title_lastname', 'Last Name'); ?></label>
          <?php echo functions::form_draw_text_field('shipping_address[lastname]', true); ?>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-sm-6">
          <label><?php echo language::translate('title_address1', 'Address 1'); ?></label>
          <?php echo functions::form_draw_text_field('shipping_address[address1]', true); ?>
        </div>

        <div class="form-group col-sm-6">
          <label><?php echo language::translate('title_address2', 'Address 2'); ?></label>
          <?php echo functions::form_draw_text_field('shipping_address[address2]', true); ?>
        </div>
		
		<div class="form-group col-sm-6">
          <label><?php echo language::translate('title_latitude', 'Latitude'); ?></label>
          <?php echo functions::form_draw_decimal_field('shipping_address[latitude]','',14,-180,+180); ?>
        </div>
		
		<div class="form-group col-sm-6">
          <label><?php echo language::translate('title_longitude', 'Longitude'); ?></label>
          <?php echo functions::form_draw_decimal_field('shipping_address[longitude]','',14,-180,+180); ?>
        </div>
      </div>


      <div class="row">
        <div class="form-group col-sm-6">
          <label><?php echo language::translate('title_postcode', 'Postal Code'); ?></label>
          <?php echo functions::form_draw_text_field('shipping_address[postcode]', true); ?>
        </div>

        <div class="form-group col-sm-6">
          <label><?php echo language::translate('title_city', 'City'); ?></label>
          <?php echo functions::form_draw_text_field('shipping_address[city]', true); ?>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-sm-6">
          <label><?php echo language::translate('title_country', 'Country'); ?></label>
          <?php echo functions::form_draw_countries_list('shipping_address[country_code]', true); ?>
        </div>

        <div class="form-group col-sm-6">
          <label><?php echo language::translate('title_zone_state_province', 'Zone/State/Province'); ?></label>
          <?php echo functions::form_draw_zones_list(isset($_POST['shipping_address']['country_code']) ? $_POST['shipping_address']['country_code'] : $_POST['country_code'], 'shipping_address[zone_code]', true); ?>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-sm-6">
          <label><?php echo language::translate('title_phone', 'Phone'); ?></label>
          <?php echo functions::form_draw_phone_field('shipping_address[phone]', true); ?>
        </div>
      </div>
    </fieldset>
  </div>

  <?php if (empty(customer::$data['id'])) { ?>
  <div class="account">

    <?php if (!empty($account_exists)) { ?>

    <div class="alert alert-info">
      <?php echo functions::draw_fonticon('fa-info-circle'); ?> <?php echo language::translate('notice_existing_customer_account_will_be_used', 'We found an existing customer account that will be used for this order'); ?>
    </div>

    <?php } else { ?>

    <h3><?php echo functions::form_draw_checkbox('create_account', '1', (!empty($_POST['create_account']) || settings::get('register_guests')) ? '1' : '', 'style="margin: 0px;"' . (settings::get('register_guests') ? ' disabled="disabled"' : false)); ?> <?php echo language::translate('title_create_account', 'Create Account'); ?></h3>
    <?php if (settings::get('register_guests')) echo functions::form_draw_hidden_field('create_account', '1'); ?>

    <fieldset<?php echo (empty($_POST['create_account'])) ? ' style="display: none;" disabled="disabled"' : false; ?>>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label><?php echo language::translate('title_desired_password', 'Desired Password'); ?></label>
            <?php echo functions::form_draw_password_field('password', '', 'autocomplete="new-password"'); ?>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label><?php echo language::translate('title_confirm_password', 'Confirm Password'); ?></label>
            <?php echo functions::form_draw_password_field('confirmed_password', '', 'autocomplete="off"'); ?>
          </div>
        </div>
      </div>

    </fieldset>
    <?php } ?>
  </div>
  <?php } ?>

  <div>
    <button class="btn btn-block btn-default" name="save_customer_details" type="submit" disabled="disabled"><?php echo language::translate('title_save_changes', 'Save Changes'); ?></button>
  </div>

</section>

<script>
  <?php if (!empty(notices::$data['errors'])) { ?>
  alert("<?php echo functions::general_escape_js(notices::$data['errors'][0]); notices::$data['errors'] = array(); ?>");
  <?php } ?>

// Initiate fields

  if ($('select[name="country_code"] option:selected').data('tax-id-format')) {
    $('input[name="tax_id"]').attr('pattern', $('select[name="country_code"] option:selected').data('tax-id-format'));
  } else {
    $('input[name="tax_id"]').removeAttr('pattern');
  }

  if ($('select[name="country_code"] option:selected').data('postcode-format')) {
    $('input[name="postcode"]').attr('pattern', $('select[name="country_code"] option:selected').data('postcode-format'));
  } else {
    $('input[name="postcode"]').removeAttr('pattern');
  }

  if ($('select[name="country_code"] option:selected').data('phone-code')) {
    $('input[name="phone"]').attr('placeholder', '+' + $('select[name="country_code"] option:selected').data('phone-code'));
  } else {
    $('input[name="phone"]').removeAttr('placeholder');
  }

  if ($('select[name="shipping_address[country_code]"] option:selected').data('postcode-format')) {
    $('input[name="shipping_address[postcode]"]').attr('pattern', $('select[name="shipping_address[country_code]"] option:selected').data('postcode-format'));
  } else {
    $('input[name="shipping_address[postcode]"]').removeAttr('pattern');
  }

  if ($('select[name="shipping_address[country_code]"] option:selected').data('phone-code')) {
    $('input[name="shipping_address[phone]"]').attr('placeholder', '+' + $('select[name="shipping_address[country_code]"] option:selected').data('phone-code'));
  } else {
    $('input[name="shipping_address[phone]"]').removeAttr('placeholder');
  }

  $('input[name="create_account"][type="checkbox"]').trigger('change');

  window.customer_form_changed = false;
  window.customer_form_checksum = $('#box-checkout-customer :input').serialize();
</script>