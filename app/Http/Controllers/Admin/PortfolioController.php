<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(10);

        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolio.form', ['portfolio' => new Portfolio()]);
    }

    public function store(Request $request)
    {
        $portfolio = new Portfolio();
        $this->savePortfolio($request, $portfolio);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio project added successfully.');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.form', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $this->savePortfolio($request, $portfolio);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio project updated successfully.');
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }

        $portfolio->delete();

        return back()->with('success', 'Portfolio project deleted successfully.');
    }

    private function savePortfolio(Request $request, Portfolio $portfolio): void
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'category' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:2000'],
            'client_name' => ['nullable', 'string', 'max:150'],
            'project_date' => ['nullable', 'date'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('image')) {
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }

            $data['image'] = $request->file('image')->store('portfolio', 'public');
        }

        $portfolio->fill($data)->save();
    }
}
