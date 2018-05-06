<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\CiviCRM;

use YMD\CiviCRMconnector\Entity\CustomField;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Description of CustomFieldController
 *
 * @author jam
 */
class CustomFieldController extends Controller {
  public function findAll(): array {
    return CustomField::findAll();
  }
  public function findByGroupAndLabel(string $group,string $label): array {
    return CustomField::findByGroupAndLabel($group,$label);
  }
  public function findAllByGroup(string $group,Request $request): array {
    return CustomField::findAllByGroup($group,$request->input('limit')?$request->input('limit'):100);
  }
}
