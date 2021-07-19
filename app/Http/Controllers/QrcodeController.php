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
    $qr_size = $request->size ?? 200;
    $qr_correction = $request->correction ?? "H";
    $qr_encoding = $request->encoding ?? 'UTF-8';
    $qr_img_type = $request->type ?? 'png';
    $code = Str::slug($qr_name) . '.' . $qr_img_type;
    $qr_eye_style = $request->eye_style ?? 'square';
    $qr_style = $request->qr_style ?? 'square';
    $qr_margin = $request->margin ?? '1';
    $qr_color = Hex::fromString($request->qr_color ?? '#000000')->toRgb();
    $qr_background_color = Hex::fromString($request->qr_background_color ?? '#ffffff')->toRgb();
    $qr_background_transparent = $request->qr_background_transparent ?? 0;

    // eye color 
    $qr_eye_color_inner_0 = Hex::fromString($request->qr_eye_color_inner_0 ?? '#000000')->toRgb();
    $qr_eye_color_outer_0 = Hex::fromString($request->qr_eye_color_outer_0 ?? '#000000')->toRgb();
    $qr_eye_color_inner_1 = Hex::fromString($request->qr_eye_color_inner_1 ?? '#000000')->toRgb();
    $qr_eye_color_outer_1 = Hex::fromString($request->qr_eye_color_outer_1 ?? '#000000')->toRgb();
    $qr_eye_color_inner_2 = Hex::fromString($request->qr_eye_color_inner_2 ?? '#000000')->toRgb();
    $qr_eye_color_outer_2 = Hex::fromString($request->qr_eye_color_outer_2 ?? '#000000')->toRgb();

    //gradient
    $qr_gradient_start = Hex::fromString($request->qr_gradient_start ?? '#000000')->toRgb();
    $qr_gradient_end = Hex::fromString($request->qr_gradient_end ?? '#000000')->toRgb();
    $qr_gradient_type = $request->qr_gradient_type ?? 'vertical';


    //genreate qr code
    $qr = QrCode::format($qr_img_type);
    $qr->size($qr_size);
    $qr->errorCorrection($qr_correction);
    $qr->encoding($qr_encoding);
    $qr->eye($qr_eye_style);
    $qr->style($qr_style);
    $qr->margin($qr_margin);
    $qr->color($qr_color->red(), $qr_color->green(), $qr_color->blue());
    $qr->backgroundColor($qr_background_color->red(), $qr_background_color->green(), $qr_background_color->blue(), $qr_background_transparent);

    //eye color 0
    $qr->eyeColor(
      0,
      $qr_eye_color_inner_0->red(),
      $qr_eye_color_inner_0->green(),
      $qr_eye_color_inner_0->blue(),
      $qr_eye_color_outer_0->red(),
      $qr_eye_color_outer_0->green(),
      $qr_eye_color_outer_0->blue(),
    );

    //eye color 1
    $qr->eyeColor(
      1,
      $qr_eye_color_inner_1->red(),
      $qr_eye_color_inner_1->green(),
      $qr_eye_color_inner_1->blue(),
      $qr_eye_color_outer_1->red(),
      $qr_eye_color_outer_1->green(),
      $qr_eye_color_outer_1->blue(),
    );

    // eye color 2
    $qr->eyeColor(
      2,
      $qr_eye_color_inner_2->red(),
      $qr_eye_color_inner_2->green(),
      $qr_eye_color_inner_2->blue(),
      $qr_eye_color_outer_2->red(),
      $qr_eye_color_outer_2->green(),
      $qr_eye_color_outer_2->blue(),
    );

    $qr->gradient(
      $qr_gradient_start->red(),
      $qr_gradient_start->green(),
      $qr_gradient_start->blue(),
      $qr_gradient_end->red(),
      $qr_gradient_end->green(),
      $qr_gradient_end->blue(),
      $qr_gradient_type
    );

    $qr->generate($qr_body, '../public/qr_code/' . $code);

    return back()->with([
      'code' => $code,
      'message' => 'QR Code Succsefully Genrated',
      'type' => 'success',
    ]);
  }

  public function qrEmail()
  {
    return view('qrcode.email');
  }

  public function qrEmailBuilder()
  {
    return 'its here';
  }

  public function qrPhone()
  {
    return view('qrcode.phone');
  }

  public function qrPhoneBuilder(Request $request)
  {

    $request->validate([
      'phone' => 'required'
    ]);

    $code = QrCode::size(200)->phoneNumber($request->phone);

    // return $code;
    return back()->with([
      'code' => $code,
      'message' => 'QR Code Succsefully Genrated',
      'type' => 'success',
    ]);
  }

  public function qrSms()
  {
    return view('qrcode.sms');
  }

  public function qrSmsBuilder(Request $request)
  {

    $request->validate([
      'phone' => 'required',
      'body' => 'required'
    ]);
    //Creates a text message with the number and message filled in.
    $code = QrCode::size(200)->SMS($request->phone, $request->body);
    // return $code;
    return back()->with([
      'code' => $code,
      'message' => 'QR Code Succsefully Genrated',
      'type' => 'success',
    ]);
  }
  public function qrGeo()
  {
    return view('qrcode.geo');
  }

  public function qrGeoBuilder()
  {
    return 'its here';
  }
}
