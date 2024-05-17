<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Prestataire;
class ServiceController extends Controller
{
    // public function index3()
    // {
    //     $services = Service::all();
    //     return response()->json($services);
    // }
    public function index3($id)
    {
        $prestataire = Prestataire::findOrFail($id);
        $services = $prestataire->services;
        return response()->json($services);
    }
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'idS' => 'required',
    //         'nomS' => 'required',
    //         'categorieS' => 'required',
    //         'critereS'=>'required',
    //         'idP' => 'required',
    //         // Add more validation rules as needed
    //     ]);
    //     if ($request->hasFile('imgS')) {
    //         $forms['imgS'] = $request->file('imgS')->store('services', 'public');
    //     }
    //     $service = Service::create($validatedData);
    //     return response()->json($service, 201);
        
    // }

public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nomS' => 'required|string|max:255',
            'categorieS' => 'required|string|max:255',
            'critereS' => 'required|string',
            // 'imgS' =&gt; 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048',
        ]);

        $validatedData['idP'] = $id; // Utiliser l'ID du prestataire passé en paramètre

        if ($request->hasFile('imgS')) {
            $validatedData['imgS'] = $request->file('imgS')->store('services', 'public');
        }

        $service = Service::create($validatedData);
        return response()->json($service, 201);
    }

    // public function deleteService($id)
    // {
    //     $service = Service::findOrFail($id);
    //     $service->delete();
    //     return response()->json(['message' => 'Service deleted successfully'], 200);
    // }

    // public function getService($id)
    // {
    //     $service = Service::findOrFail($id);
    //     return response()->json($service);
    // }

    // public function updateService(Request $request, $id)
    // {
    //     $request->validate([
    //         'nomS' => 'required|string|max:255',
    //         'categorieS' => 'required|string|max:255',
    //         'critereS' => 'required|string',
    //         // 'idP' => 'required|exists:prestataires,idP',
    //         // 'imgS' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048',
    //     ]);

    //     $service = Service::findOrFail($id);
    //     $service->nomS = $request->nomS;
    //     $service->categorieS = $request->categorieS;
    //     $service->critereS = $request->critereS;
    //     // $service->idP = $request->idP;

    //     if ($request->hasFile('imgS')) {
    //         $service->imgS = $request->file('imgS')->store('services', 'public');
    //     }

    //     $service->save();
    //     return response()->json($service, 200);
    // }

    public function getService($prestataire_id, $service_id)
    {
        $service = Service::where('idS', $service_id)->where('idP', $prestataire_id)->firstOrFail();
        return response()->json($service);
    }


    public function updateService(Request $request, $prestataire_id, $service_id)
    {
        $request->validate([
            'nomS' =>'required|string|max:255',
            'categorieS' => 'required|string|max:255',
            'critereS' => 'required|string',
            // 'imgS' =&gt; 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048',
        ]);

        $service = Service::where('idS', $service_id)->where('idP', $prestataire_id)->firstOrFail();
        $service->nomS = $request->nomS;
        $service->categorieS = $request->categorieS;
        $service->critereS = $request->critereS;

        if ($request->hasFile('imgS')) {
            $service->imgS = $request->file('imgS')->store('services', 'public');
        }

        $service->save();
        return response()->json($service, 200);
    }
    public function deleteService($prestataire_id, $service_id)
    {
        $service = Service::where('idS', $service_id)->where('idP', $prestataire_id)->firstOrFail();
        $service->delete();
        return response()->json(['message' => 'Service deleted successfully'], 200);
    }
}
