<?php

namespace App\Http\Controllers;

use App\Models\Prestataire;
use Illuminate\Http\Request;

class PrestataireController extends Controller
{
    public function index()
    {
        $prestataires = Prestataire::all();
        return response()->json($prestataires);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomP' => 'required|string|max:255',
            'prenomP' => 'required|string|max:255',
            'secteur' => 'required|string|max:255',
        ]);

        $prestataire = Prestataire::create($validatedData);
        return response()->json($prestataire, 201);
    }

    public function show($id)
    {
        $prestataire = Prestataire::findOrFail($id);
        return response()->json($prestataire);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nomP' => 'string|max:255',
            'prenomP' => 'string|max:255',
            'secteur' => 'string|max:255',
        ]);

        $prestataire = Prestataire::findOrFail($id);
        $prestataire->update($validatedData);

        return response()->json($prestataire);
    }

    public function destroy($id)
    {
        $prestataire = Prestataire::findOrFail($id);
        $prestataire->delete();
        return response()->json(['message' => 'Prestataire deleted successfully'], 200);
    }
}
