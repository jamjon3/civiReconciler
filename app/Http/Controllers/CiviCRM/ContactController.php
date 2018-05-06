<?php

namespace App\Http\Controllers;

use YMD\CiviCRMconnector\Entity\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller 
{  
  public function findById(Request $request): array {
    return Contact::findById($request->get('id'));
  }
  public function create(Request $request) {
    return Contact::save($request->all());
  }
}