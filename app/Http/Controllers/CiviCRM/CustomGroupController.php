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
 * Description of CustomGroupController
 *
 * @author James Jones
 */
class CustomGroupController extends Controller {
  private $civiApi;
  private $limit = 25;
  public function __construct() {
    $this->civiApi = new \Leanwebstart\CiviApi3\CiviApi();
  }
  public function findAll(Request $request): array {
    return (array) $this->civiApi->CustomGroup->Get(["sequential" => 1, "options[limit]" => $request->input('limit')?$request->input('limit'):$this->limit ]);
  }
  public function findById(int $id): array {
    return (array) $this->civiApi->CustomGroup->Get(["sequential" => 1, "id" => $id ]);    
  }
  public function findByTitle(string $title): array {
    return (array) $this->civiApi->CustomGroup->Get(["sequential" => 1, "title" => $title ]);
  }
  public function getFields(): array {
    return (array) $this->civiApi->CustomGroup->Getfields(["sequential" => 1, "options[limit]" => 1000 ]);     
  }
}
