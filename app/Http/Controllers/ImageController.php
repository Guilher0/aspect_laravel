<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $modules = Module::with('images')->get();

        return view('admin.images.index', compact('modules'));
    }

    /**
     * Store a newly created module.
     */
    public function storeModule(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:modules',
        ]);

        Module::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.images.index')->with('success', 'Módulo criado com sucesso!');
    }

    /**
     * Store a newly created image in storage.
     */
    public function storeImage(Request $request)
    {
        $request->validate([
            'module_id' => 'required|exists:modules,id',
            'key' => 'required|string|max:255',
            'base64_data' => 'required|string',
            'alt_text' => 'nullable|string|max:255',
        ]);

        // Evitar duplicidade de keys no mesmo módulo
        $exists = Image::where('module_id', $request->module_id)
            ->where('key', $request->key)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Uma imagem com essa chave já existe neste módulo.');
        }

        $image = Image::create($request->all());

        $module = Module::find($request->module_id);
        if ($module) {
            Cache::forget("dynamic_image_{$module->slug}_{$image->key}");
        }

        return redirect()->route('admin.images.index')->with('success', 'Imagem enviada com sucesso!');
    }

    /**
     * Update the specified image in storage.
     */
    public function updateImage(Request $request, string $id)
    {
        $image = Image::with('module')->findOrFail($id);

        $request->validate([
            'base64_data' => 'nullable|string',
            'alt_text' => 'nullable|string|max:255',
        ]);

        if ($request->filled('base64_data')) {
            $image->base64_data = $request->base64_data;
        }

        $image->alt_text = $request->alt_text;
        $image->save();

        if ($image->module) {
            Cache::forget("dynamic_image_{$image->module->slug}_{$image->key}");
        }

        return redirect()->route('admin.images.index')->with('success', 'Imagem atualizada com sucesso!');
    }

    /**
     * Remove the specified image from storage.
     */
    public function destroyImage(string $id)
    {
        $image = Image::with('module')->findOrFail($id);
        $module = $image->module;
        $key = $image->key;

        $image->delete();

        if ($module) {
            Cache::forget("dynamic_image_{$module->slug}_{$key}");
        }

        return redirect()->route('admin.images.index')->with('success', 'Imagem excluída com sucesso!');
    }
}
