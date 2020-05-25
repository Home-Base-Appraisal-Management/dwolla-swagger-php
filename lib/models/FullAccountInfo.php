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

class FullAccountInfo implements ArrayAccess {
  static $swaggerTypes = array(
      '_links' => 'map[string,HalLink]',
      'id' => 'string',
      'name' => 'string',
      'timezone_offset' => 'int',
      'type' => 'string',
      '_embedded' => 'object'
  );

  static $attributeMap = array(
      '_links' => '_links',
      'id' => 'id',
      'name' => 'name',
      'timezone_offset' => 'timezoneOffset',
      'type' => 'type',
      '_embedded' => '_embedded'
  );


  public $_links; /* map[string,HalLink] */
  public $id; /* string */
  public $name; /* string */
  public $timezone_offset; /* int */
  public $type; /* string */
  public $_embedded; /* object */

  public function __construct(array $data = null) {
    $this->_links = $data["_links"] ?? null;
    $this->id = $data["id"] ?? null;
    $this->name = $data["name"] ?? null;
    $this->timezone_offset = $data["timezone_offset"] ?? null;
    $this->type = $data["type"] ?? null;
    $this->_embedded = $data["_embedded"] ?? null;
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
