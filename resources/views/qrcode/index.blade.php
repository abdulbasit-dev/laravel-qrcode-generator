@extends('layouts.app')
@section('home', 'active')
@section('content')

<section class="text-gray-600 body-font overflow-hidden border">
  <div class="container px-40 py-12 mx-auto">
    <div class="flex flex-wrap -m-12 items-start">
      <div class="p-12 md:w-2/3 ">

        <form action="{{ route('qrCodeGenerator') }}" method="POST">
          @csrf
          <div class="w-2/3 mb-6">
            <label for="name" class="pb-12 text-base">Name</label>
            <input type="text" id="name" name="name" placeholder="enter name"
              value="{{ old('name') }}"
              class="rounded border-transparent flex-1  appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base mt-2 focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-transparent" />
            @error('name')
            <small class="text-red-500 text-sm mt-1">{{ $message }}</small>
            @enderror
          </div>
          <div class="w-2/3 mb-6">
            <label for="body" class="pb-12 text-base">Body</label>
            <textarea type="text" id="body" name="body" rows="4" placeholder="enter body"
              class="rounded border-transparent flex-1 resize-none appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base mt-2 focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-transparent">{{ old('body') }}</textarea>
            @error('body')
            <small class="text-red-500 text-sm mt-1">{{ $message }}</small>
            @enderror
          </div>

          <hr>


          <div class="grid grid-cols-4 gap-4  my-6">
            <div>
              <label for="size" class="pb-12 text-base">QR Size</label>
              <select id="size" name="size"
                class="w-full h-10 pl-3 pr-6 mt-2 text-base text-gray-700  border shadow-sm border-gray-300 rounded appearance-none  focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-transparent">
                <option value="">Select Size</option>
                <option value="200">200x200</option>
                <option value="400">400x400</option>
                <option value="800">800x800</option>
              </select>
            </div>
            <div>
              <label for="type" class="pb-12 text-base">Image Type</label>
              <select id="type" name="type"
                class="w-full h-10 pl-3 pr-6 mt-2 text-base text-gray-700  border shadow-sm border-gray-300 rounded appearance-none  focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-transparent">
                <option value="">Select Type</option>
                <option value="svg">PNG</option>
                <option value="png">SVG</option>
              </select>
            </div>
            <div>
              <label for="correction" class="pb-12 text-base">QR Correction</label>
              <select id="correction" name="correction"
                class="w-full h-10 pl-3 pr-6 mt-2 text-base text-gray-700  border shadow-sm border-gray-300 rounded appearance-none  focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-transparent">
                <option value="">Select Correction</option>
                <option value="L">7%</option>
                <option value="M">15%</option>
                <option value="Q">25%</option>
                <option value="H">30%</option>
              </select>
            </div>
            <div>
              <label for="encoding" class="pb-12 text-base">QR Encoding</label>
              <select id="encoding" name="encoding"
                class="w-full h-10 pl-3 pr-6 mt-2 text-base text-gray-700  border shadow-sm border-gray-300 rounded appearance-none  focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-transparent">
                <option value="">Select Encoding</option>
                <option value="">Select QR Encoding</option>
                <option value="UTF-8">UTF-8</option>
                <option value="ISO-8859-1">ISO-8859-1</option>
                <option value="ISO-8859-2">ISO-8859-2</option>
                <option value="ISO-8859-3">ISO-8859-3</option>
                <option value="ISO-8859-4">ISO-8859-4</option>
                <option value="ISO-8859-5">ISO-8859-5</option>
                <option value="ISO-8859-6">ISO-8859-6</option>
                <option value="ISO-8859-7">ISO-8859-7</option>
                <option value="ISO-8859-8">ISO-8859-8</option>
                <option value="ISO-8859-9">ISO-8859-9</option>
                <option value="ISO-8859-10">ISO-8859-10</option>
                <option value="ISO-8859-11">ISO-8859-11</option>
                <option value="ISO-8859-12">ISO-8859-12</option>
                <option value="ISO-8859-13">ISO-8859-13</option>
                <option value="ISO-8859-14">ISO-8859-14</option>
                <option value="ISO-8859-15">ISO-8859-15</option>
                <option value="ISO-8859-16">ISO-8859-16</option>
                <option value="SHIFT-JIS">SHIFT-JIS</option>
                <option value="WINDOWS-1250">WINDOWS-1250</option>
                <option value="WINDOWS-1251">WINDOWS-1251</option>
                <option value="WINDOWS-1252">WINDOWS-1252</option>
                <option value="WINDOWS-1256">WINDOWS-1256</option>
                <option value="UTF-16BE">UTF-16BE</option>
                <option value="ASCII">ASCII</option>
                <option value="GBK">GBK</option>
                <option value="EUC-KR">EUC-KR</option>
              </select>
            </div>

          </div>

          <div class="grid grid-cols-4 gap-4  my-6">
            <div>
              <label for="eye_style" class="pb-12 text-base">QR Eye</label>
              <select id="eye_style" name="eye_style"
                class="w-full h-10 pl-3 pr-6 mt-2 text-base text-gray-700  border shadow-sm border-gray-300 rounded appearance-none  focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-transparent">
                <option value="">Select Eye Style</option>
                <option value="square">Square</option>
                <option value="circle">Circle</option>

              </select>
            </div>
            <div>
              <label for="qr_style" class="pb-12 text-base">QR Style</label>
              <select id="qr_style" name="qr_style"
                class="w-full h-10 pl-3 pr-6 mt-2 text-base text-gray-700  border shadow-sm border-gray-300 rounded appearance-none  focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-transparent">
                <option value="">Select Style</option>
                <option value="square">Square</option>
                <option value="dot">Dot</option>
                <option value="round">Round</option>
              </select>
            </div>
            <div>
              <label for="margin" class="pb-12 text-base">QR Margin</label>
              <input type="number" min="1" max="100" value='1' step="1" id="margin" name="margin"
                placeholder="enter number"
                class="w-full h-10 pl-3 pr-6 mt-2 text-base text-gray-700  border shadow-sm border-gray-300 rounded appearance-none  focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-transparent" />
            </div>

            <div>
              <label for="qr_color" class="pb-12 text-base">QR Color</label>
              <input type="color" id="qr_color" name="qr_color"
                class="w-full h-10 pl-3 pr-6 mt-2 text-base text-gray-700  border shadow-sm border-gray-300 rounded appearance-none  focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-transparent" />
            </div>

          </div>


          <button type="submit"
            class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-1/3 transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-1 focus:ring-offset-1  rounded ">
            Generate QR Code
          </button>
        </form>
      </div>
      <div class="p-12 md:w-1/3 flex flex-col items-center">

        <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">Qr Code
          Preview</h2>

        {{-- @if (session('code'))
        {!! session('code') !!}
        <a href="{{  session('code')  }}">download</a>
        @endif --}}
        @if (session('code'))
        @if (pathinfo(session('code'))['extension'] === 'eps')
        QR Code available, <a href="{{ asset('qr_code/' . session('code')) }}">click here</a> to
        download
        it.
        @else
        <img src="{{ asset('qr_code/' . session('code')) }}" alt="{{ session('code') }}"
          class="img-fluid">

        {{-- <a href="{{ asset('qr_code/' . session('code')) }}"><button
          class="py-2 px-4 bg-green-500" download target="_blank">
          Download Qr Code</button></a> --}}
        @endif
        @endif
      </div>
    </div>
  </div>
</section>

@endsection