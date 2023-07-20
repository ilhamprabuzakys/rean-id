<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Cache::remember('categories', now()->addDays(7), function () {
            return Category::with('posts')->orderBy('updated_at', 'desc')->get();
        });
        confirmDelete('Apakah anda yakin untuk menghapus kategori ini?', 'Postingan yang dihapus akan masuk ke tempat sampah.');
        return view('dashboard.categories.index', [
            'title' => 'Daftar Kategori',
        ], compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create', [
            'title' => 'Tambah Kategori',
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', Rule::unique('categories')],
        ];

        $validator = Validator::make($request->all(), $rules,  [
            'name.required' => 'Category name field is required',
        ]);

        if ($validator->fails()) {
            // dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        $validatedData['slug'] = SlugService::createSlug(Category::class, 'slug', $validatedData['name']);
        $category = Category::create($validatedData);

        toast('Data Kategori berhasil ditambahkan!','success');
        // Alert::success('Data Kategori berhasil ditambahkan!', 'Tabel berhasil diperbarui.');

        return redirect()->route('categories.index')->with('message', "Kategori <b>$category->name</b> telah berhasil <b>ditambahkan!</b>");
    }

    public function show(Category $category)
    {

        return view('dashboard.categories.show', [
            'title' => 'Postingan dengan kategori ' . $category->name,
        ], compact('category'));
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'title' => 'Edit Kategori',
        ], compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => ['required', Rule::unique('categories')->ignore($category->id)],
        ];

        $validator = Validator::make($request->all(), $rules, [
            'name.required' => 'Category name field is required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        $validatedData['slug'] = SlugService::createSlug(Category::class, 'slug', $validatedData['name']);
        $oldNama = $category->name;
        $category->update($validatedData);

        toast('Data Kategori berhasil diperbarui!','success');
        // Alert::success('Data Kategori berhasil diperbarui!', 'Tabel berhasil diperbarui.');

        return redirect()->route('categories.index')->with('message', "Kategori <b>{$oldNama}</b> telah berhasil <b>diperbarui!</b>");
    }

    public function destroy(Category $category)
    {
        $namaKategori = $category->name;
        $category->delete();

        toast('Data Kategori berhasil dihapus!','success');
        // Alert::success('Data Kategori berhasil dihapus!', 'Tabel berhasil diperbarui.');
        return back()->with('message', "Kategori <b>$namaKategori</b> telah berhasil <b>dihapus!</b>");
    }
}
