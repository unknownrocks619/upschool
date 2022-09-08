<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ecommerce\CreateBookProductRequest;
use App\Http\Requests\Admin\Ecommerce\DestroyProductMediaRequest;
use App\Http\Requests\Admin\Ecommerce\StoreBookProductRequest;
use App\Http\Requests\Admin\Ecommerce\StoreProductMediaRequest;
use App\Http\Requests\Admin\Ecommerce\StoreProductMetaRequest;
use App\Http\Requests\Admin\Ecommerce\UpdateProductRequest;
use App\Models\Product;
use App\Models\UserBookUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Upload\Media\Traits\FileUpload;

class ProductController extends Controller
{
    //
    use FileUpload;
    protected $uploadPath = "website/product";
    public function index()
    {
        $products = Product::with(["author"])->latest()->get();
        return view('admin.ecommerce.product.index', compact("products"));
    }

    public function edit(Product $product)
    {
        return view("admin.ecommerce.product.edit", compact("product"));
    }

    public function createBookProduct(CreateBookProductRequest $request, UserBookUpload $book)
    {
        return view('admin.ecommerce.book-create', compact("book"));
    }

    public function storeBookProduct(StoreBookProductRequest $request, UserBookUpload $book)
    {
        $product = new Product;
        $product->product_name = $request->product_name;
        $product->author_id = $book->user_id;
        $product->slug = Str::slug($request->product_name, "-");
        $product->short_description = $request->short_description;
        $product->full_description = $request->full_description;
        $product->type = $request->product_type;
        $product->price = $request->product_price;
        $product->project_id = $book->project_id;
        $product->total_price = $request->product_price + $request->tax;
        $this->set_access("file");
        $this->set_upload_path($this->uploadPath);
        $images = $this->upload("featured_image");
        $product->featured_image = $images;
        $product->sku = Str::random(6);

        try {
            DB::transaction(function () use ($product, $book, $request) {
                $product->save();
                $book->status = "approved";
                $book->updated_by = (auth()->check()) ? false : auth()->id();
                $book->save();

                $product->categories()->sync($request->categories);
            });
        } catch (\Throwable $th) {
            dd($th->getMessage());
            session()->flash('error', "Unable to convert book. Error: " . $th->getMessage());
            return back()->withInput();
        }

        session()->flash("success", "Book Converted to Product.");
        return redirect()->route('admin.commerce.product.list');
    }

    public function updateProduct(UpdateProductRequest $request, Product $product)
    {
        $product->product_name = $request->product_name;
        $product->slug = Str::slug($request->product_name, "-");
        $product->short_description = $request->short_description;
        $product->full_description = $request->full_description;
        $product->type = $request->product_type;
        $product->price = $request->product_price;
        $product->total_price = $request->product_price + $request->tax;
        if ($request->hasFile("featured_image")) {
            $this->set_access("file");
            $this->set_upload_path($this->uploadPath);
            $images = $this->upload("featured_image");
            $product->featured_image = $images;
        }
        try {
            DB::transaction(function () use ($product, $request) {
                $product->save();
                $product->categories()->sync($request->categories);
            });
        } catch (\Throwable $th) {
            session()->flash('error', "Unable to upadate product. Error: " . $th->getMessage());
            return back()->withInput();
        }

        session()->flash("success", "Product Information updated.");
        return back();
        // return redirect()->route('admin.commerce.product.list');
    }

    public function createProductMeta(Product $product)
    {
        return view('admin.ecommerce.product.meta', compact('product'));
    }

    public function storeProductMeta(StoreProductMetaRequest $request, Product $product)
    {
        $meta = [
            "meta_title" => $request->meta_title,
            "meta_keyword" => $request->meta_keyword,
            "meta_description" => $request->meta_description
        ];
        $meta["meta_image"] = isset($product->meta->meta_image) ? $product->meta->meta_image : [];
        if ($request->hasFile("meta_image")) {
            $this->set_access("file");
            $this->set_upload_path($this->uploadPath . "/meta");
            $meta["meta_image"] = $this->upload("meta_image");
        }
        $product->meta = $meta;
        try {
            $product->save();
        } catch (\Throwable $th) {
            //throw $th;

            session()->flash('error', "Unable to update meta information.");
            return back();
        }

        session()->flash("success", "Product Meta information updated.");
        return back();
    }

    public function createProductMedia(Product $product)
    {
        return view("admin.ecommerce.product.media", compact("product"));
    }

    public function storeProductMedia(StoreProductMediaRequest $request, Product $product)
    {
        $images = $product->images;
        // dd($images);
        $this->set_access("file");
        $this->set_upload_path($this->uploadPath);
        $images[] = $this->upload("media");
        // dd($images);
        $product->images = $images;
        try {
            $product->save();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("error", "Unable to upload file. Error: " . $th->getMessage());
            return back();
        }

        session()->flash("success", "Media uploaded.");
        return back();
    }

    public function destroyProductMedia(DestroyProductMediaRequest $request, Product $product, $index)
    {
        $images = (array) $product->images;
        if (isset($images[$index])) {
            unset($images[$index]);
        }

        $product->images = $images;

        try {
            $product->save();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("error", "Unable to remove media.");
            return back();
        }

        session()->flash("success", "Media removed.");
        return back();
    }

    public function productTransaction(Product $product)
    {
        return view('admin.ecommerce.product.transaction', compact('product'));
    }
}
