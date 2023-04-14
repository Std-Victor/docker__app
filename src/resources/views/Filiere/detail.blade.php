@extends('layouts.main')
@section('title', 'Ahmed')
@section('content')
  <main class="overflow-x-auto w-full py-12">
    <div class="mx-auto w-2/5 px-4 pb-4">
      <h1 class="text-lg font-semibold my-2">Stagiaire</h1>
      <p class="text-gray-500 text-base">Toutes les informations relatives au stagiaire, ID, nom, adress et son filiere.</p>
    </div>
    <div class="mx-auto w-2/5 ">
      <div class="h-3 bg-gray-700 rounded-t-md "></div>
      <div class="flex gap-4 py-3 px-4 border-b-2 border-x border-gray-400">
        <p class="w-20 flex justify-between text-base font-medium">ID <span>:</span></p>
        <p class="text-gray-600"> {{ $stagiaire->id }} </p>
      </div>
      <div class="flex gap-4 py-3 px-4 border-b-2 border-x border-gray-400">
        <p class="w-20 flex justify-between text-base font-medium">Nom <span>:</span></p>
        <p class="text-gray-600"> {{ $stagiaire->nom }} </p>
      </div>
      <div class="flex gap-4 py-3 px-4 border-b-2 border-x border-gray-400">
        <p class="w-20 flex justify-between text-base font-medium">Adresse <span>:</span></p>
        <p class="text-gray-600"> {{ $stagiaire->adresse }} </p>
      </div>
      <div class="flex gap-4 py-3 px-4 border-b-2 border-x border-gray-400">
        <p class="w-20 flex justify-between text-base font-medium">Filiere <span>:</span></p>
        <p class="text-gray-600">{{ $filiere }}</p>
      </div>
    </div>
    <div class="mx-auto w-2/5 mt-6">
      <div class="flex justify-center items-center gap-2">
        <button class="flex items-center gap-3 font-medium text-gray-500 px-4 py-2 shadow-lg shadow-gray-500/50 hover:border-b-2 hover:text-gray-800 hover:font-medium hover:border-gray-500 rounded-md" onclick="window.location.href='{{ route('stagiaires.index', $filiere) }}'">
          Back
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
          </svg>
        </button>
        <button class="flex items-center gap-3 font-medium text-gray-500 px-4 py-2 shadow-lg shadow-gray-500/50 hover:border-b-2 hover:text-green-600 hover:font-medium hover:border-green-500 rounded-md" onclick="window.location.href='{{ route('stagiaires.edit', ['filiere' => $filiere, 'stagiaire' => $stagiaire->id]) }}'">
          Modifier
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
          </svg>

        </button>
        <form action="{{ route('stagiaires.destroy', ['filiere' => $filiere, 'stagiaire' => $stagiaire->id]) }}" method="POST" onsubmit="return confirm('Are you sure?')">
          @csrf
          @method('delete')
          <button
              type="submit"
              name="action"
              value="delete"
              class="flex items-center gap-3 font-medium text-gray-500 px-4 py-2 shadow-lg shadow-gray-500/50 hover:border-b-2 hover:text-red-600 hover:font-medium hover:border-red-500 rounded-md">
            Supprimer
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>
          </button>
        </form>
      </div>
    </div>
  </main>
@endsection