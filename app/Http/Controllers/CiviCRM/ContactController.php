<?php

namespace App\Http\Controllers\CiviCRM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Description of ContactController
 *
 * @author James Jones
 */
class ContactController extends Controller 
{  
  private $civiApi;
  private $limit = 25;
  public function __construct() {
    $this->civiApi = new \Leanwebstart\CiviApi3\CiviApi();
  }
  public function findById(int $id): array {
    return (array) $this->civiApi->Contact->Get(["sequential" => 1, "id" => $id ]);    
  }
  public function getFields(): array {
    return (array) $this->civiApi->Contact->Getfields(["sequential" => 1, "options[limit]" => 1000 ]);     
  }
  public function create(Request $request): object {
    // return $this->entity->save($request->all());
  }
  public function findByConditions(Request $request): object {
    return (array) $this->civiApi->Contact->Get(\array_merge([
      "sequential" => 1,
      "options[limit]" => $request->input('limit')?$request->input('limit'):$this->limit
    ],$request->all()));
  }
}