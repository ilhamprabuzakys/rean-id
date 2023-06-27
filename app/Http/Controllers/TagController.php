<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class TagController extends Controller
{
    public function index()
    {
        $tags = cache()->remember('tags', now()->addDays(7), function () {
            return Tag::orderBy('updated_at', 'desc')->get();
        });
        confirmDelete('Apakah anda yakin untuk menghapus tag ini?', 'Data yang dihapus akan masuk ke tempat sampah.');
        return view('dashboard-borex.tags.index', [
            'title' => 'Daftar Tag',
        ], compact('tags'));
    }

    public function create()
    {
        return view('dashboard-borex.tags.create', [
            'title' => 'Tambah Tag',
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', Rule::unique('tags')],
        ];

        $validator = Validator::make($request->all(), $rules,  [
            'name.required' => 'Tag name field is required',
        ]);

        if ($validator->fails()) {
            // dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        $validatedData['slug'] = SlugService::createSlug(Tag::class, 'slug', $validatedData['name']);
        $tag = Tag::create($validatedData);

        toast('Data Tag berhasil ditambahkan!','success');
        // Alert::success('Data Tag berhasil ditambahkan!', 'Tabel berhasil diperbarui.');

        return redirect()->route('tags.index')->with('message', "Tag <b>$tag->name</b> telah berhasil <b>ditambahkan!</b>");
    }

    public function show(Tag $tag)
    {
        return view('dashboard-borex.tags.show', [
            'title' => 'Postingan dengan tag ' . $tag->name,
        ], compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('dashboard-borex.tags.edit', [
            'title' => 'Edit Tag',
        ], compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $rules = [
            'name' => ['required', Rule::unique('tags')->ignore($tag->id)],
        ];

        $validator = Validator::make($request->all(), $rules, [
            'name.required' => 'Tag name field is required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        $validatedData['slug'] = SlugService::createSlug(Tag::class, 'slug', $validatedData['name']);
        $oldNama = $tag->name;
        $tag->update($validatedData);

        toast('Data Tag berhasil diperbarui!','success');
        // Alert::success('Data Tag berhasil diperbarui!', 'Tabel berhasil diperbarui.');
        return redirect()->route('tags.index')->with('message', "Tag <b>{$oldNama}</b> telah berhasil <b>diperbarui!</b>");
    }

    public function destroy(Tag $tag)
    {
        $oldName = $tag->name;
        $tag->delete();

        toast('Data Tag berhasil dihapus!','success');
        // Alert::success('Data Tag berhasil dihapus!', 'Tabel berhasil diperbarui.');
        return back()->with('message', "Tag <b>$oldName</b> telah berhasil <b>dihapus!</b>");
    }
}
