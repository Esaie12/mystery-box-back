<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{

    public function index(Request $request)
    {
        // Optionnel : filtrer uniquement les pays actifs si ?active=1
        $query = Country::query();

        if ($request->has('active')) {
            $query->where('is_active', $request->boolean('active'));
        }

        $countries = $query->orderBy('name')->get();
        return view('admins.countries',compact('countries'));
    }

    public function update(Request $request, $id)
    {
        $country = Country::findOrFail($id);

        $validated = $request->validate([
            'devise' => 'required|string|max:100',
            'delivery_delai' => 'nullable|string',
            'transporteur' => 'nullable|string',
            'delivery_price' => 'nullable|integer',
        ]);

        $country->update($validated);

        return redirect()->back()->with('success','Pays mis à jour avec succès');
    }

    //
    public function toggleStatus($id)
    {
        $country = Country::findOrFail($id);

        $country->is_active = !$country->is_active;
        $country->save();

       $message = $country->is_active 
                ? 'Pays activé avec succès' 
                : 'Pays désactivé avec succès';

        return redirect()->back()->with('success',$message);
    }
}
