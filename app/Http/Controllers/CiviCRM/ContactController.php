<?php

namespace App\Http\Controllers\CiviCRM;

use YMD\CiviCRMconnector\Entity\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller 
{  
  public function findById(int $id): array {
    return Contact::findById($id);
  }
  public function create(Request $request) {
    return Contact::save($request->all());
  }
}