<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrcodeController extends Controller
{
  public function index()
  {
    return view('qrcode.index');
  }

  public function qrCodeGenerator(Request $request)
  {

    $request->validate([
      'name' => 'required',
      'body' => 'required'
    ]);

    $code = QrCode::size(200)->generate($request->name);
    return back()->with([
      'code' => $code,
      'message' => 'QR Code Succsefully Genrated',
      'type' => 'success',
    ]);
  }
}
