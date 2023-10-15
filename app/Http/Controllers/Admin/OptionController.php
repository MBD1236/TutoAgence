<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FormOptionRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('admin.option.index', [
            'options' => Option::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.option.form', [
            'option' => new Option()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormOptionRequest $request)
    {
        Option::create($request->validated());
        return to_route('admin.option.index')->with('success', 'Ajout effectué avec succès');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        return view('admin.option.form', [
            'option' => $option
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormOptionRequest $request, Option $option)
    {
        $option->update($request->validated());
        return to_route('admin.option.index')->with('success', 'Modification effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return to_route('admin.option.index')->with('success', 'Suppression effectuée avec succès');
    }
}


