<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', config('pagination.count'));
        $search = $request->get('search');

        $features = Feature::query()
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%');
            })
            ->paginate($perPage)
            ->appends($request->query());
      
        return view('admin.features.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.features.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeatureRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title'], '-');

        Feature::create($data);
        return to_route('admin.features.index')->with('success', __('keywords.added_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
        return view('admin.features.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        return view('admin.features.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
        $data= $request->validated();
        $data['slug'] = Str::slug($data['title'], '-');

        $feature->update($data);
        return to_route('admin.features.index')->with('success', __('keywords.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        $feature->delete();
        return to_route('admin.features.index')->with('success', __('keywords.deleted_successfully'));
    }
}
