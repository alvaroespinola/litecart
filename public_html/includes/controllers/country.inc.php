<?php

  class ctrl_country {
    public $data = array();
    
    public function __construct($country_code=null) {
      global $system;
      
      $this->system = &$system;
      
      if ($country_code !== null) $this->load($country_code);
    }
    
    public function load($country_code) {
      $country_query = $this->system->database->query(
        "select * from ". DB_TABLE_COUNTRIES ."
        where iso_code_2 = '". $this->system->database->input($country_code) ."'
        limit 1;"
      );
      $this->data = $this->system->database->fetch($country_query);
      if (empty($this->data)) trigger_error('Could not find country ('. $country_code .') in database.', E_USER_ERROR);
      
      $zones_query = $this->system->database->query(
        "select * from ". DB_TABLE_ZONES ."
        where country_code = '". $this->system->database->input($this->data['iso_code_2']) ."'
        order by name;"
      );
      
      $this->data['zones'] = array();
      while ($zone = $this->system->database->fetch($zones_query)) {
        $this->data['zones'][$zone['id']] = $zone;
      }
    }
    
    public function save() {
      if (empty($this->data['id'])) {
        $this->system->database->query(
          "insert into ". DB_TABLE_COUNTRIES ."
          (date_created)
          values ('". $this->system->database->input(date('Y-m-d H:i:s')) ."');"
        );
        $this->data['id'] = $this->system->database->insert_id();
      }
      
      $this->system->database->query(
        "update ". DB_TABLE_COUNTRIES ."
        set
          status = '". (int)$this->data['status'] ."',
          iso_code_2 = '". $this->system->database->input($this->data['iso_code_2']) ."',
          iso_code_3 = '". $this->system->database->input($this->data['iso_code_3']) ."',
          name = '". $this->system->database->input($this->data['name']) ."',
          domestic_name = '". $this->system->database->input($this->data['domestic_name']) ."',
          address_format = '". $this->system->database->input($this->data['address_format']) ."',
          postcode_required = '". (int)$this->data['postcode_required'] ."',
          currency_code = '". $this->system->database->input($this->data['currency']) ."',
          phone_code = '". $this->system->database->input($this->data['phone_code']) ."',
          date_updated = '". date('Y-m-d H:i:s') ."'
        where id = '". (int)$this->data['id'] ."'
        limit 1;"
      );
      
      $this->system->database->query(
        "delete from ". DB_TABLE_ZONES ."
        where country_code = '". $this->system->database->input($this->data['iso_code_2']) ."'
        and id not in ('". @implode("', '", @array_keys($this->data['zones'])) ."');"
      );
      
      if (!empty($this->data['zones'])) {
        foreach ($this->data['zones'] as $zone) {
          if (empty($zone['id'])) {
            $this->system->database->query(
              "insert into ". DB_TABLE_ZONES ."
              (country_code, date_created)
              values ('". $this->system->database->input($this->data['iso_code_2']) ."', '". date('Y-m-d H:i:s') ."');"
            );
            $zone['id'] = $this->system->database->insert_id();
          }
          $this->system->database->query(
            "update ". DB_TABLE_ZONES ." 
            set code = '". $this->system->database->input($zone['code']) ."',
            name = '". $this->system->database->input($zone['name']) ."',
            date_updated =  '". date('Y-m-d H:i:s') ."'
            where country_code = '". $this->system->database->input($this->data['iso_code_2']) ."'
            and id = '". (int)$zone['id'] ."'
            limit 1;"
          );
        }
      }
    }
    
    public function delete() {
    
      if ($this->data['code'] == $this->system->settings->get('system_country')) {
        trigger_error('Cannot delete the store system country', E_USER_ERROR);
        return;
      }
      
      if ($this->data['code'] == $this->system->settings->get('default_country_code')) {
        trigger_error('Cannot delete the store default country', E_USER_ERROR);
        return;
      }
      
      $this->system->database->query(
        "delete from ". DB_TABLE_ZONES ."
        where code = '". $this->system->database->input($this->data['iso_code_2']) ."';"
      );
      
      $this->system->database->query(
        "delete from ". DB_TABLE_COUNTRIES ."
        where id = '". (int)$this->data['id'] ."'
        limit 1;"
      );
      
      $this->data['id'] = null;
    }
  }

?>