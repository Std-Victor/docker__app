<input type="hidden" name="id" value="{{ $stagiaire->id ?? 00 }}" />

<div class="w-96">
  <label for="name" class="block mb-2 text-sm font-medium text-gray-900"
  >Nom</label
  >
  <input
      type="text"
      id="nom"
      name="nom"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 outline-none
        @error('nom') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror"
      placeholder="John Doe"
      value="{{ $stagiaire->nom ?? old('nom') }}"
  />
  @error('nom')
  <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
  @enderror
</div>
<div class="w-96">
  <label for="address" class="block mb-2 text-sm font-medium text-gray-900"
  >Adresse</label
  >
  <input
      type="text"
      id="address"
      name="adresse"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm outline-none rounded-lg block w-full p-2.5
        @error('adresse') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror"
      placeholder="6, avenue Kifah (c.y.m.), imm. Bahia"
      value="{{ $stagiaire->adresse ?? old('adresse') }}"
  />
  @error('adresse')
  <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
  @enderror
</div>
<div class="w-96">
  <label for="filiere" class="block mb-2 text-sm font-medium text-gray-900"
  >Filiere</label
  >
  <select
      name="filiere_id"
      id="filiere"
      class="bg-gray-50 border @if (!isset($stagiaire)) cursor-not-allowed @endif border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
      @if (!isset($stagiaire)) disabled @endif
  >
    @foreach ($list_filiere as $item )
      <option @if($item->nom === $filiere) selected @endif value="{{ $item->id }}"> {{ $item->nom }} </option>
    @endforeach
  </select>
</div>
<div class="w-96 flex gap-3 mt-3 justify-center">
  <button
      type="button"
      class="flex items-center gap-3 font-medium text-white bg-gradient-to-r rounded-md from-slate-400 to-gray-700 px-8 py-2 shadow-lg shadow-gray-500/50 hover:bg-gradient-to-br"
      onclick="window.location.href='{{ route('stagiaires.index', $filiere) }}'"
  >
    Cancel
  </button>
  <button
      type="submit"
      name="action"
      value="update"
      class="flex items-center gap-3 font-medium text-white bg-gradient-to-r rounded-md from-emerald-400 to-green-700 px-8 py-2 shadow-lg shadow-green-500/50 hover:bg-gradient-to-br"
  >
    Save
  </button>
</div>