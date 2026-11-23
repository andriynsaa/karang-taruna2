<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Division;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::withCount('members')
            ->orderBy('urutan')
            ->orderBy('id')
            ->get();

        return view('public.divisions.index', compact('divisions'));
    }

    public function show(Division $division)
    {
        $division->load([
            'members' => function ($query) {
                $query->orderByRaw("
                    CASE jabatan
                        WHEN 'ketua' THEN 1
                        WHEN 'wakil' THEN 2
                        ELSE 3
                    END
                ")
                ->orderBy('urutan')
                ->orderBy('id');
            }
        ]);

        return view('public.divisions.show', compact('division'));
    }
}
