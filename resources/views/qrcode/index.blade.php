@extends('layouts.app')
@section('home', 'active')
@section('content')


<div class="bg-white dark:bg-gray-800  ">
  <div class="text-center w-full mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 z-20">
    <h2 class="text-3xl font-extrabold text-black dark:text-white sm:text-4xl">
      <span class="block">
        Want to be millionaire ?
      </span>
      <span class="block text-indigo-500">
        It&#x27;s today or never.
      </span>
    </h2>
    <div class="lg:mt-0 lg:flex-shrink-0">
      <div class="mt-12 inline-flex rounded-md shadow">
        <button type="button"
          class="py-4 px-6  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
          Get started
        </button>
      </div>
      <div class="flex justify-center mt-12">

        {{-- {{ QrCode::eyeColor(1 , 55, 65, 235, 23, 100, 55)->size(300)->style('round')->margin(1)->merge('https://rsvpify.com/wp-content/uploads/2017/03/rsvpify-logo-header-rsvp.png')->generate('fuck you ..........................')}}
        --}}

        {{-- {{  QrCode::BTC('bitcoin address', 0.334)}} --}}
        {{ QrCode::email('foo@bar.com', 'This is the subject.', 'This is the message body.') }}


      </div>
    </div>
  </div>
</div>

@endsection