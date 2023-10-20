<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FormPropertyRequest;
use App\Http\Requests\FormPostRequest;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.property.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.property.form', [
            'property' => new Property(),
            'options' => Option::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormPropertyRequest $request)
    {
        $data = $request->validated();
        /** @var UploadedFile|null $image */
        $image = $request->validated('image');
        if ($image !== null && !$image->getError()) {
            $data['image'] = $image->store('property', 'public');
        }
        $property = Property::create($data);
        $property->options()->sync($data['options']);

        return to_route('admin.property.index')->with("success", "Ajout effectué avec succès");
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.property.form', [
            'property' => $property,
            'options' => Option::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormPropertyRequest $request, Property $property)
    {
        $data = $request->validated();
        /** @var UploadedFile|null $image */
        $image = $request->validated('image');
        if ($image !== null && !$image->getError()) {
            if ($property->image) {
                Storage::disk('public')->delete($property->image);
            }
            $data['image'] = $image->store('property', 'public');
        }
        $property->update($data);
        $property->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with("success", "Modification effectuée avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        if($property->image) {
            Storage::disk('public')->delete($property->image);
        }
        $property->delete();
        return to_route('admin.property.index')->with("success", "Suppression effectuée avec succès");
    }
}
