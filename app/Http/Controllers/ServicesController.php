<?php

namespace App\Http\Controllers;
use App\Models\Service;

class ServicesController extends Controller
{
  public function equityMutualFund()
  {
    $data = Service::find(1);
    return view('mutual-funds.index', ['data' => $data]);
  }

  public function debtMutualFund()
  {
    $data = Service::find(2);
    return view('mutual-funds.index', ['data' => $data]);
  }

  public function hybridMutualFund()
  {
    $data = Service::find(3);
    return view('mutual-funds.index', ['data' => $data]);
  }

  public function lifeInsurance()
  {
    $data = Service::find(12);
    return view('mutual-funds.index', ['data' => $data]);
  }

  public function healthInsurance()
  {
    $data = Service::find(8);
    return view('mutual-funds.index', ['data' => $data]);
  }

  // public function termInsurance()
  // {
  //   $data = Service::find(8);
  //   return view('mutual-funds.index', ['data' => $data]);
  // }

  public function disclaimerAndDiscolosure()
  {
    $data = Service::find(17);
    return view('mutual-funds.index', ['data' => $data]);
  }
}
