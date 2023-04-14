<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Stagiaire;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;


class StagiaireController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(string $filiere): View
  {
    $stagiaires = Stagiaire::where('filiere_id', Filiere::firstWhere('nom' , $filiere)?->id)->paginate(10);
    abort_if(!$stagiaires->count(), 404);
    return view('filiere.show', compact('filiere', 'stagiaires'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(string $filiere): View
  {
    $list_filiere = Filiere::all();
    return view('filiere.create', compact('filiere', 'list_filiere'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request, string $filiere): RedirectResponse
  {
    $request->validate([
      'nom' => 'required|string|max:30',
      'adresse' => 'required|string|max:80'
    ]);

    $filiere_id = Filiere::firstWhere('nom', $filiere)?->id;
    abort_if(!$filiere_id, 404);

    Stagiaire::create([
      ...$request->all(), 'filiere_id' => $filiere_id
    ]);

    return redirect()->route('stagiaires.index', ['filiere'=> $filiere])->with('message', 'Le stagiaire a été ajouté avec succès');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $filiere,string $id): View
  {
    $stagiaire = Stagiaire::firstWhere([
      'id'=> $id,
      'filiere_id' => Filiere::firstWhere('nom', $filiere)?->id
    ]);
    abort_if(!$stagiaire, 404);
    return view('filiere.detail', compact('filiere', 'stagiaire'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $filiere, string $id): View
  {
    $list_filiere = Filiere::all();
    $stagiaire = Stagiaire::firstWhere([
      'id'=> $id,
      'filiere_id' => Filiere::firstWhere('nom', $filiere)?->id
    ]);
    abort_if(!$stagiaire, 404);
    return view('filiere.edit', compact('filiere', 'stagiaire', 'list_filiere'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $filiere, string $id): RedirectResponse
  {
    $filiere_id = Filiere::firstWhere('nom', $filiere)?->id;
    abort_if(!$filiere_id, 404);

    $stagiaire = Stagiaire::findOrFail($id);

    $request->validate([
      'nom' => 'required|string|max:30',
      'adresse' => 'required|string|max:80'
    ]);

    $stagiaire->update($request->all());

    return redirect()->route('stagiaires.index', ['filiere'=> $filiere])->with('message', 'Le stagiaire a été mis à jour avec succès');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $filiere, string $id): RedirectResponse
  {
    $filiere_id = Filiere::firstWhere('nom', $filiere)?->id;
    abort_if(!$filiere_id, 404);

    $stagiaire = Stagiaire::findOrFail($id);

    $stagiaire->delete();

    return redirect()->route('stagiaires.index', ['filiere'=> $filiere])->with('message', 'Le stagiaire a été supprimé avec succès');
  }
}