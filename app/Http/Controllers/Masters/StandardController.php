<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use App\Models\Standard;
use App\Traits\StandardTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class StandardController extends Controller
{
    use StandardTrait;
    
    public function index(Request $request)
    {
        $query = Standard::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('standard', 'like', "%{$search}%");
        }

        $standards = $query->latest()->paginate(15)->withQueryString();

        $this->pageSummaryIndex();
        return view('pages.masters.standards.index', compact('standards'));
    }

    public function create(Request $request)
    {
        $this->pageSummaryCreate();
        return view('pages.masters.standards.create', [
            'redirect' => $request->redirect ?? ''
        ])->render();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'standard' => 'required|string|max:255',
        ]);

        $standard = Standard::create($validated);

        return Response::json([
            'Status' => 'Success',
            'Msg' => 'Standard Saved Successfully',
            'RedirectUrl' => ($request->redirecturl)
                ? url($request->redirecturl)
                : route('standards.show', $standard->id),
        ], 201);
    }

    public function show($id)
    {
        $standard = Standard::findOrFail($id);
        $this->pageSummaryShow($standard);
        return view('pages.masters.standards.show', compact('standard'));
    }

    public function edit(Request $request, $id)
    {
        $standard = Standard::findOrFail($id);
        $this->pageSummaryEdit($standard);

        return view('pages.masters.standards.edit', [
            'standard' => $standard,
            'redirect' => $request->redirect ?? '',
        ])->render();
    }

    public function update(Request $request, $id)
    {
        $standard = Standard::findOrFail($id);

        $validated = $request->validate([
            'standard' => 'required|string|max:255',
        ]);

        $standard->update($validated);

        return Response::json([
            'Status' => 'Success',
            'Msg' => 'Standard Updated Successfully',
            'RedirectUrl' => ($request->redirecturl)
                ? url($request->redirecturl)
                : route('standards.show', $standard->id),
        ]);
    }

    public function destroy($id)
    {
        $standard = Standard::findOrFail($id);
        $standard->delete();

        return Response::json([
            'Status' => 'Success',
            'Msg' => 'Standard Deleted Successfully',
            'RedirectUrl' => route('standards.index'),
        ]);
    }
}
