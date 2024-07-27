<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Region;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with(['category', 'region'])->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $categories = Category::all();
        $regions = Region::all();
        return view('admin.news.create', compact('categories', 'regions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'region_id' => 'required|exists:regions,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_caption' => 'required',
            'date' => 'required',
        ]);

        $imagePath = $request->file('image')->store('news', 'public');

        News::create([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'region_id' => $request->region_id,
            'image_url' => $imagePath,
            'image_caption' => $request->image_caption,
            'date' => $request->date,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        $categories = Category::all();
        $regions = Region::all();
        return view('admin.news.edit', compact('news', 'categories', 'regions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'region_id' => 'required|exists:regions,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_caption' => 'required',
            'date' => 'required',
        ]);

        $news = News::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news', 'public');
            // Delete old image
            Storage::disk('public')->delete($news->image_url);
            $news->image_url = $imagePath;
        }

        $news->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'region_id' => $request->region_id,
            'image_caption' => $request->image_caption,
            'date' => $request->date,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diupdate');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        Storage::disk('public')->delete($news->image_url);
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus');
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('file')->store('news', 'public');

        return response()->json(['location' => asset('storage/' . $path)]);
    }
}
