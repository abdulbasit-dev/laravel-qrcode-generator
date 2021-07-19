@extends('layouts.app')
@section('home', 'active')
@section('content')

<section class="text-gray-600 body-font overflow-hidden border-t">
  <div class="container px-40 py-12 mx-auto">
    <h1 class="text-3xl mb-12 text-gray-800 ">Build a Phone Number QR Code</h1>
    <div class="flex flex-wrap -m-12 items-center">
      <div class="p-12 md:w-2/3 ">
        <form action="{{ route('qr.phone') }}" method="POST">
          @csrf
          <div class="w-2/3 mb-6">
            <label for="phone" class="pb-12 text-base">Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter Phone Number"
              value="{{ old('name') }}"
              class="rounded border-transparent flex-1  appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base mt-2 focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-transparent" />
            @error('phone')
            <small class="text-red-500 text-sm mt-1">{{ $message }}</small>
            @enderror
          </div>


          <button type="submit"
            class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-1/3 transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-1 focus:ring-offset-1  rounded ">
            Generate QR Code
          </button>
        </form>
      </div>
      <div class="p-12 md:w-1/3 ">

        <h2 class="sm:text-3xl text-2xl text-center title-font font-medium text-gray-900 mt-4 mb-4">
          Qr Code
          Preview 👇👇</h2>

        <div class=" mx-auto" style="max-width: 200px; hieght: 200px;">
          @if (session('code'))
          {!! session('code') !!}
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
@endsection