<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdvantageController extends Controller
{
    public function index()
    {
        $advantages = Advantage::orderBy('order')->get();
        return Inertia::render('Admin/Advantages', [
            'advantages' => $advantages,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        Advantage::create($validated);

        return redirect()->back()->with('success', 'Преимущество добавлено');
    }

    public function update(Request $request, Advantage $advantage)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $advantage->update($validated);

        return redirect()->back()->with('success', 'Преимущество обновлено');
    }

    public function destroy(Advantage $advantage)
    {
        $advantage->delete();
        return redirect()->back()->with('success', 'Преимущество удалено');
    }

    public function reorder(Request $request)
    {
        $items = $request->input('items', []);

        foreach ($items as $item) {
            Advantage::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return redirect()->back()->with('success', 'Порядок преимуществ обновлен');
    }
}


