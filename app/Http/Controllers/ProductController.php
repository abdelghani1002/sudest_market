<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $category)
    {
        $category_id = $category->id;
        return view('seller.store.products.create', compact('category_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $user = auth()->user();
        $data = $request->validated();
        // store primary photo
        $primary_photo = $request->file('primary_photo');
        $filename = uniqid('product_1_') . '.' . $primary_photo->getClientOriginalExtension();
        $primary_photo->storeAs('public/products', $filename);
        $data['primary_photo_src'] = 'storage/products/' . $filename;
        // store product
        $product = $user->store->products()->create($data);
        // store additional photos
        if ($request->hasFile('photos')) {
            // using Photo model
            $photos = [];
            foreach ($request->file('photos') as $photo) {
                $filename = uniqid("product") . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs('public/products', $filename);
                $photos[] = [
                    'src' => 'storage/products/' . $filename,
                    'alt' => $data['name'] . ' photo',
                ];
            }
            $product->photos()->createMany($photos);
        }
        return redirect()->route('seller.mystore.categories.show', $data["category_id"])->with('success', 'Product has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $total_sales = 0;
        foreach($product->orders as $order){
            $total_sales += $order->pivot->units;
        }
        $product->total_sales = $total_sales;
        return view('product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('seller.store.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        // update primary photo
        if ($request->hasFile('primary_photo')) {
            // delete old primary photo
            $old_primary_photo = $product->primary_photo_src;
            if ($old_primary_photo) {
                $old_primary_photo = str_replace('storage', 'public', $old_primary_photo);
                Storage::delete($old_primary_photo);
            }
            $primary_photo = $request->file('primary_photo');
            $filename = uniqid('product') . '.' . $primary_photo->getClientOriginalExtension();
            $primary_photo->storeAs('public/products', $filename);
            $data['primary_photo_src'] = 'storage/products/' . $filename;
        }
        // update product
        $product->update($data);
        // update additional photos
        if ($request->hasFile('photos')) {
            // using Photo model
            $photos = [];
            foreach ($request->file('photos') as $photo) {
                $filename = uniqid("product") . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs('public/products', $filename);
                $photos[] = [
                    'src' => 'storage/products/' . $filename,
                    'alt' => $data['name'] . ' photo',
                ];
            }
            $product->photos()->createMany($photos);
        }
        return redirect()->route('seller.mystore.categories.show', $data["category_id"])->with('success', 'Product has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // delete primary photo
        $primary_photo = $product->primary_photo_src;
        if ($primary_photo) {
            $primary_photo = str_replace('storage', 'public', $primary_photo);
            Storage::delete($primary_photo);
        }
        // delete additional photos
        $photos = $product->photos;
        foreach ($photos as $photo) {
            $photo_src = $photo->src;
            if ($photo_src) {
                $photo_src = str_replace('storage', 'public', $photo_src);
                Storage::delete($photo_src);
            }
        }
        $product->delete();
        return redirect()->route('seller.mystore.categories.show', $product->category_id)->with('success', 'Product has been deleted successfully.');
    }
}
