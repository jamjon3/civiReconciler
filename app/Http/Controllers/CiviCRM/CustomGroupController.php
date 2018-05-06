<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\CiviCRM;

use YMD\CiviCRMconnector\Entity\CustomGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Description of CustomGroupController
 *
 * @author jam
 */
class CustomGroupController extends Controller {
  public function findAll(): array {
    return CustomGroup::findAll();
  }
  public function findByTitle(string $title): array {
    return CustomGroup::findByTitle($title);
  }
}
