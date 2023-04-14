@extends('layouts.main')
@section('title', 'Add New Stagiaire')
@section('content')
  <main class="overflow-x-auto w-full py-12">
    <div class="mx-auto w-max mt-16 px-6 pb-4 border border-gray-400/50 rounded-md shadow-lg shadow-gray-500/50">
      <div class="border-2 rounded-md w-fit px-5 -mt-14 bg-white py-3 border-gray-600 text-gray-600 ">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
        </svg>
      </div>
      <div class="mt-5">
        <form action="{{ route('stagiaires.store', $filiere) }}" method="POST" class="grid gap-y-6 py-5">
          @csrf
          @include('filiere._form')
        </form>
      </div>
    </div>
  </main>
@endsection