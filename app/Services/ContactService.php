<?php

namespace App\Services;

use App\Mail\ContactMail;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class ContactService
{
  use HttpResponses;


  public function contact($data)
  {
    try {
      Mail::to('info@national-g.com')->send(new ContactMail($data));
      return true;
    } catch (\Exception $e) {
      Log::error('Mail sending failed: ' . $e->getMessage());
      return false;
    }
  }
}
