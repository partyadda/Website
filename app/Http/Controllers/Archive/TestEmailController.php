<?php

namespace App\Http\Controllers;

use App\Helper\Helper;

use Exception;

class TestEmailController extends Controller
{

  protected $rzrApi, $pckg, $helper;

  public function __construct(Helper $helper)
  {
    $this->helper = $helper;
  }

  public function index()
  {
    $htmlData = "<b>Test Email</b>";

    $this->helper->sendAdminMail(array("ujjammanavar.satish@gmail.com"), $htmlData);

    echo "DONE";
  }
}