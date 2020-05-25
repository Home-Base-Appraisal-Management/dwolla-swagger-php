<?php
/**
 *  Copyright 2015 SmartBear Software
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */

/**
 *
 *
 * NOTE: This class is auto generated by the swagger code generator program. Do not edit the class manually.
 *
 */

namespace DwollaSwagger\models;

use \ArrayAccess;

class UpdateBankRequest implements ArrayAccess {
  static $swaggerTypes = array(
      '_links' => 'object',
      'name' => 'string',
      'routing_number' => 'string',
      'account_number' => 'string',
      'bank_account_type' => 'string'
  );

  static $attributeMap = array(
      '_links' => '_links',
      'name' => 'name',
      'routing_number' => 'routingNumber',
      'account_number' => 'accountNumber',
      'bank_account_type' => 'bankAccountType'
  );


  public $_links; /* object */
  public $name; /* string */
  public $routing_number; /* string */
  public $account_number; /* string */
  public $bank_account_type; /* string */

  public function __construct(array $data = null) {
    $this->_links = $data["_links"] ?? null;
    $this->name = $data["name"] ?? null;
    $this->routing_number = $data["routing_number"] ?? null;
    $this->account_number = $data["account_number"] ?? null;
    $this->bank_account_type = $data["bank_account_type"] ?? null;
  }

  public function offsetExists($offset) {
    return isset($this->$offset);
  }

  public function offsetGet($offset) {
    return $this->$offset;
  }

  public function offsetSet($offset, $value) {
    $this->$offset = $value;
  }

  public function offsetUnset($offset) {
    unset($this->$offset);
  }
}
