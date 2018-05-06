<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\CiviCRM;

use YMD\CiviCRMconnector\Entity\ContactType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Description of ContactTypeController
 *
 * @author jam
 */
class ContactTypeController  extends Controller {
  public function findAll(): array {
    return ContactType::findAll();
  }
  public function findByName(string $name): array {
    return ContactType::findByName($name);
  }
}
