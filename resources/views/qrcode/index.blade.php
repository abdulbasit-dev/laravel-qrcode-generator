@extends('layouts.app')
@section('home', 'active')
@section('content')

<section class="text-gray-600 body-font overflow-hidden">
  <div class="container px-40 py-24 mx-auto">
    <div class="flex flex-wrap -m-12">
      <div class="p-12 md:w-2/3 ">

        <form action="{{ route('qrCodeGenerator') }}" method="POST">
          @csrf
          <div class="w-2/3 mb-6">
            <label for="name" class="pb-12 text-xl">Name</label>
            <input type="text" id="name" name="name" placeholder="enter name"
              value="{{ old('name') }}"
              class="rounded border-transparent flex-1  appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-lg mt-2 focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-transparent" />
            @error('name')
            <small class="text-red-500 text-sm mt-1">{{ $message }}</small>
            @enderror
          </div>
          <div class="w-2/3 mb-6">
            <label for="body" class="pb-12 text-xl">Body</label>
            <textarea type="text" id="body" name="body" rows="4" placeholder="enter name"
              class="rounded border-transparent flex-1 resize-none appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-lg mt-2 focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-transparent">{{ old('body') }}</textarea>
            @error('body')
            <small class="text-red-500 text-sm mt-1">{{ $message }}</small>
            @enderror
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
        @if (Session::has('code'))
        {{ Session::get('code') }}
        @endif
      </div>
    </div>
  </div>
</section>

@endsection