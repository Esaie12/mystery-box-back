<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Occasion;
use App\Models\Country;

class OccasionController extends Controller
{
    public function index(Request $request)
    {
        $occasions = Occasion::latest()->get();
        $countries = Country::where('is_active',true)->get();
        return view('admins.occasions.list', compact('occasions','countries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'emoji' => 'nullable|string|max:10',
            'description' => 'required|string',
            'status' => 'required|in:active,disactive,comming',
            'date_start' => 'nullable|date',
            'picture' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'countries_code' => 'nullable|array', 
            'countries_date_activate' => 'nullable|array', // tableau optionnel des dates par pays
        ]);

        // upload image
        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('occasions', 'public');
        }

        // créer l'occasion
        $occasion = Occasion::create($validated);

        // lier les pays si fournis
        if (!empty($validated['countries_code'])) {
            foreach ($validated['countries_code'] as $index => $code) {

                $country = Country::where('code', $code)->first();
                if ($country) {
                    $dateActivate = $validated['countries_date_activate'][$index] ?? date('Y-m-d');
                    $occasion->countries()->attach($country->id, ['date_activate' => $dateActivate]);
                }

            }
        }

        return redirect()->back()->with('success', 'Occasion créée avec succès');
    }

    public function update(Request $request, $id)
    {
        $occasion = Occasion::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'emoji' => 'nullable|string|max:10',
            'description' => 'required|string',
            'status' => 'required|in:active,disactive,comming',
            'date_start' => 'nullable|date',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'countries_code' => 'nullable|array', // tableau des codes des pays
            'countries_date_activate' => 'nullable|array', // tableau optionnel des dates par pays
        ]);

        // upload nouvelle image
        if ($request->hasFile('picture')) {
            if ($occasion->picture) {
                Storage::disk('public')->delete($occasion->picture);
            }
            $validated['picture'] = $request->file('picture')->store('occasions', 'public');
        }

        $occasion->update($validated);

        // sync des pays
        $syncData = [];
        if (!empty($validated['countries_code'])) {
            foreach ($validated['countries_code'] as $index => $code) {
                $country = Country::where('code', $code)->first();
                if ($country) {
                    $syncData[$country->id] = [
                        'date_activate' => $validated['countries_date_activate'][$index] ?? null
                    ];
                }
            }
        }

        // mettre à jour la table pivot
        $occasion->countries()->sync($syncData);

        return redirect()->back()->with('success', 'Occasion mise à jour');
    }

}
