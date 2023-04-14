@extends('layouts.main')
@section('title', 'All Stagiaires')
@section('content')
  <main>
    <div class="overflow-x-auto w-full py-12">
      <div class="mx-auto w-3/5 flex justify-between items-center px-5 pb-4">
        <div>
          <h1 class="text-lg font-semibold my-2">Stagiaires</h1>
          <p class="text-gray-500 text-base">La liste de tous les stagiaires de la filière <span class="capitalize font-medium underline text-black ">{{$filiere}}</span>, y compris leur id, nom et adresse.</p>
        </div>
        <button type="button" class="font-medium text-white bg-gradient-to-r rounded-md from-cyan-500 to-blue-700 px-4 py-3 shadow-lg shadow-blue-500/50 hover:bg-gradient-to-br" onclick="window.location.href='{{ route('stagiaires.create', $filiere) }}'">Add Stagiaire</button>
      </div>
      @if ($message = session('message'))
        <div class="mx-auto w-3/5 flex p-4 my-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
          <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Info</span>
          <div>
            <span class="font-medium">Success alert!</span> {{ $message }}
          </div>
        </div>
      @endif
      <table
          class="mx-auto w-3/5 text-sm text-left text-gray-500 rounded-md overflow-hidden"
      >
        <thead
            class="text-sm font-medium text-white bg-gray-400"
        >
        <tr>
          <th scope="col" class="px-6 py-3">ID</th>
          <th scope="col" class="px-6 py-3">Nom</th>
          <th scope="col" class="px-6 py-3">Adresse</th>
          <th scope="col" class="px-6 py-3 w-44">Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($stagiaires as $stg )
          <tr class="bg-white border-b">
            <td
                scope="row"
                class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap"
            >
              {{ $stg->id }}
            </td>
            <td class="px-6 py-2"> {{ $stg->nom }} </td>
            <td class="px-6 py-2"> {{ $stg->adresse }} </td>
            <td class="px-6 py-2 flex items-center gap-1 w-40 ">
              <button type="button" class="px-2 py-1 hover:text-blue-600 hover:drop-shadow-lg " onclick="window.location.href='{{ route('stagiaires.show', ['filiere' => $filiere, 'stagiaire' => $stg->id ]) }}'">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                </svg>
              </button>
              <button type="button" class="px-2 py-1 hover:text-green-600 hover:drop-shadow-lg " onclick="window.location.href='{{ route('stagiaires.edit', ['filiere' => $filiere, 'stagiaire' => $stg->id]) }}'">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
              </button>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4">No Data Founded</td>
          </tr>
        @endforelse
        </tbody>
      </table>
      <div class="mx-auto w-3/5 flex justify-center items-center mt-9"> {{ $stagiaires->links() }} </div>
    </div>
  </main>
@endsection