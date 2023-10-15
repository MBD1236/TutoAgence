<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPropertyRequest;
use App\Models\Property;


class HomePropertyController extends Controller
{
    public function index(SearchPropertyRequest $request) {
        $query = Property::query()->orderBy('created_at', 'desc');
        if ($price = $request->validated('price')) {
            $query = $query->where('price', '<=', $price);
        }
        if ($surface = $request->validated('surface')) {
            $query = $query->where('surface', '>=', $surface);
        }
        if ($rooms = $request->validated('rooms')) {
            $query = $query->where('rooms', '>=', $rooms);
        }
        if ($title = $request->validated('title')) {
            $query = $query->where('title', 'like', "%{$title}%");
        }
        return view('homeProperty', [
            'properties' => $query->paginate(25),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Property $property) {
        if ($slug !== $property->getSlug()) {
            return to_route('property.show', ['slug' => $property->getSlug(), 'property' => $property]);
        }
        return view('showProperty', ['property' => $property]);
    }
}
