<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
use Spatie\Color\Hex;

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

    //get request inputs
    $qr_name = $request->name;
    $qr_body = $request->body;
    $qr_size = $request->size;
    $qr_type = $request->type;
    $qr_correction = $request->correction;
    $qr_encoding = $request->encoding;
    $qr_img_type = $request->type ?? 'png';
    $code = Str::slug($qr_name) . '.' . $qr_img_type;
    $qr_eye_style = $request->eye_style ?? 'square';
    $qr_style = $request->qr_style ?? 'square';
    $qr_margin = $request->margin ?? '1';
    $qr_color = Hex::fromString($request->qr_color ?? '#000000')->toRgb();

    //genreate qr code
    $qr = QrCode::format($qr_type);
    $qr->size($qr_size);
    $qr->errorCorrection($qr_correction);
    $qr->encoding($qr_encoding);
    $qr->eye($qr_eye_style);
    $qr->style($qr_style);
    $qr->margin($qr_margin);
    $qr->color($qr_color->red(), $qr_color->green(), $qr_color->blue());
    $qr->generate($qr_body, '../public/qr_code/' . $code);

    return back()->with([
      'code' => $code,
      'message' => 'QR Code Succsefully Genrated',
      'type' => 'success',
    ]);
  }
}
