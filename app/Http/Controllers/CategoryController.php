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
        return view('dashboard.categories.index', [
            'title' => 'Daftar Kategori',
        ]);
    }

    public function create()
    {
        return view('dashboard.categories.create', [
            'title' => 'Tambah Kategori',
        ]);
    }

    public function store(Request $request)
    {
        // return 'JOSS';
        $rules = [
            'name' => ['required', Rule::unique('categories')],
        ];

        $validator = Validator::make($request->all(), $rules,  [
            'name.required' => 'Kategori nama harus diisi',
            'name.unique' => 'Kategori harus unik. Kategori dengan nama ini telah dibuat',
        ]);

        if ($validator->fails()) {
            // dd($validator->errors());
            return response()->json(['errors' => $validator->errors()]);
            // return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $validatedData = $validator->validated();
            $validatedData['slug'] = SlugService::createSlug(Category::class, 'slug', $validatedData['name']);
            $category = Category::create($validatedData);

            // toast('Data Kategori berhasil ditambahkan!','success');
            return response()->json(['success' => 'Data Kategori berhasil ditambahkan!']);
            // Alert::success('Data Kategori berhasil ditambahkan!', 'Tabel berhasil diperbarui.');

            // return redirect()->route('categories.index')->with('message', "Kategori <b>$category->name</b> telah berhasil <b>ditambahkan!</b>");
        }

        
    }

    public function show(Category $category)
    {

        return view('dashboard.categories.show', [
            'title' => 'Postingan dengan kategori ' . $category->name,
        ], compact('category'));
    }

    public function edit($id)
    {
        $data = Category::where('id', $id)->first();
        return response()->json(['result' => $data]);
        // return view('dashboard.categories.edit', [
        //     'title' => 'Edit Kategori',
        // ], compact('category'));
    }

    public function update(Request $request, $id)
    {
        // return "JOSS";

        $rules = [
            'name' => ['required', Rule::unique('categories')->ignore($id)],
        ];

        $validator = Validator::make($request->all(), $rules, [
            'name.required' => 'Kategori nama harus diisi',
            'name.unique' => 'Kategori harus unik. Kategori dengan nama ini telah dibuat',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
            // return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $category = Category::findOrFail($id);
            $validatedData = $validator->validated();
            $validatedData['slug'] = SlugService::createSlug(Category::class, 'slug', $validatedData['name']);
            $category->update($validatedData);
            return response()->json(['success' => 'Data Kategori berhasil diperbarui!']);
        }

        
        // toast('Data Kategori berhasil diperbarui!','success');
        // Alert::success('Data Kategori berhasil diperbarui!', 'Tabel berhasil diperbarui.');

        // return redirect()->route('categories.index')->with('message', "Kategori <b>{$oldNama}</b> telah berhasil <b>diperbarui!</b>");
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
