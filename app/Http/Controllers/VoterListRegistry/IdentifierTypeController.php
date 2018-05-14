<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers\VoterListRegistry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/**
 * Description of IdentifierTypeController
 *
 * @author jam
 */
class IdentifierTypeController extends Controller {
  private $vlrApi;
  private $limit = 25;
  public function __construct() {
    $this->vlrApi = new \YMD\VoterListRegistryAPI\VoterListRegistryAPI();
  }
  public function findAll(Request $request): array {
    return (array) $this->vlrApi->IdentifierType->getIdentifierTypes($request->input('limit')?$request->input('limit'):$this->limit);
  }
}
