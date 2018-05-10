<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\CiviCRM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Description of CustomFieldController
 *
 * @author James Jones
 */
class CustomFieldController extends Controller {
  private $civiApi;
  private $limit = 25;
  public function __construct() {
    $this->civiApi = new \Leanwebstart\CiviApi3\CiviApi();
  }
  public function findAll(Request $request): array {
    return (array) $this->civiApi->CustomField->Get(["sequential" => 1, "options[limit]" => $request->input('limit')?$request->input('limit'):5000 ]);
  }
  public function findByGroupAndLabel(string $group,string $label): array {
    $groupResponse = (array) $this->civiApi->CustomGroup->Get(["sequential" => 1, "title" => $group ]);
    if($groupResponse['count'] == 1) {
      return (array) $this->civiApi->CustomField->Get([
        "sequential" => 1, 
        "custom_group_id" => $groupResponse['values'][0]->{'id'},
        "label" => $label
      ]);
    }
    return [
      "is_error" => 1,
      "version" => 3,
      "count" => 0,
      "values" => []
    ];
  }
  public function findAllByGroup(string $group,Request $request): array {
    $groupResponse = (array) $this->civiApi->CustomGroup->Get(["sequential" => 1, "title" => $group ]);
    if($groupResponse['count'] == 1) {
      return (array) $this->civiApi->CustomField->Get([
        "sequential" => 1, 
        "custom_group_id" => $groupResponse['values'][0]->{'id'},
        "options[limit]" => $request->input('limit')?$request->input('limit'):($this->limit*10)
      ]);
    }
    return [
      "is_error" => 1,
      "version" => 3,
      "count" => 0,
      "values" => []
    ];
  }
  public function getFields(): array {
    return (array) $this->civiApi->CustomField->Getfields(["sequential" => 1, "options[limit]" => 1000 ]);     
  }
}
