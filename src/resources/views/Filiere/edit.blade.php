@extends('layouts.main')
@section('title', 'Edit Stagiaire')
@section('content')
  <main class="overflow-x-auto w-full py-12">
    <div class="mx-auto w-max mt-16 px-6 pb-4 border border-gray-400/50 rounded-md shadow-lg shadow-gray-500/50 relative">
      <div class="border-2 rounded-md w-fit px-5 -mt-14 bg-white py-3 border-gray-600 text-gray-600 shadow-md shadow-gray-500/50">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
        </svg>
      </div>
      <div class="mt-5">
        <form action="{{ route('stagiaires.update', ['filiere' => $filiere, 'stagiaire' => $stagiaire->id]) }}" method="POST" class="grid gap-y-6 py-5">
          @csrf
          @method('put')
          @include('filiere._form')
        </form>
      </div>
      <div class="absolute right-5 top-3 ">
        @if (isset($stagiaire))
          <form action="{{ route('stagiaires.destroy', ['filiere' => $filiere, 'stagiaire' => $stagiaire->id]) }}" method="POST" onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('delete')
            <button
                type="submit"
                name="action"
                value="delete"
                class="flex items-center gap-3 font-medium text-white bg-gradient-to-r rounded-md from-red-500 to-red-800 px-8 py-2 shadow-lg shadow-red-500/50 hover:bg-gradient-to-br"
            >
              Delete
            </button>
          </form>
        @endif
      </div>
    </div>
  </main>
@endsection