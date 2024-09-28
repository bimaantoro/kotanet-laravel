<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\HasImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use HasImage;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();

        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('products', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            Product::create($validated);
        });

        return redirect(route('admin.product.index'))->with('toast_success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {

        DB::transaction(function () use ($request, $product) {
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')) {
                Storage::disk('local')->delete('public/products/' . basename($product->thumbnail));
                $thumbnailPath = $request->file('thumbnail')->store('products', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $product->update($validated);
        });

        return redirect(route('admin.product.index'))->with('toast_success', 'Produk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        DB::transaction(function () use ($product) {
            $product->delete();
            Storage::disk('local')->delete('public/products/' . basename($product->thumbnail));
        });

        return back()->with('toast_success', 'Produk berhasil dihapus');
    }
}
