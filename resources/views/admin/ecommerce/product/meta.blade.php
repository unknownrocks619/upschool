<x-admin-layout title=" :: Product :: {{ $product->product_name }}" heading="{{ $product->product_name }} Meta Information">
    <div class="col-md-12">
        <a href="{{ route('admin.commerce.product.list') }}" class="btn btn-outline-primary">
            <x-arrow-left></x-arrow-left>
            Go back
        </a>
        <x-alert></x-alert>
        <div class="card">
            <x-form action="{{ route('admin.commerce.product.meta.store',$product->id) }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="meta_title">Meta Title
                                <sup class="text-danger">
                                    *
                                </sup>
                            </label>
                            <input type="text" value="{{ old('meta_title',isset($product->meta->meta_title) ? $product->meta->meta_title : null) }}" name="meta_title" id="meta_title" class="form-control @error('meta_title') border border-danger @enderror" />
                            @error("meta_title")
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="meta_description">Meta Description
                                <sup class="text-danger">*</sup>
                            </label>
                            <textarea name="meta_description" id="meta_description" cols="30" rows="10" class="form-control @error('meta_description') border border-danger @enderror">{{ old('meta_description', isset($product->meta->meta_description) ? $product->meta->meta_description : null) }}</textarea>
                            @error("meta_description")
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4 ">
                        <div class="col-md-6">
                            <label for="meta_keyword">Meta Keyword
                                <sup class="text-danger">*</sup>
                            </label>
                            <input type="text" name="meta_keyword" id="meta_keyword" value="{{ old('meta_keyword',isset($product->meta->meta_keyword) ? $product->meta->meta_keyword : null ) }}" class="form-control @error('meta_keyword') border border-danger @enderror" />
                            <small class="text-info">Please use comma (,) seperated value for multiple keyword</small>
                            @error("meta_keyword")
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="featured_image">
                                        Featured Image
                                    </label>
                                    <input type="file" class="form-control" name="meta_image" id="meta_image">
                                </div>

                                @if(isset($product->meta->meta_image) )
                                <div class="col-md-12 mx-auto">
                                    <img src="{{ asset($product->meta->meta_image->path) }}" class="img-fluid w-25" />
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </x-form>
        </div>
    </div>
</x-admin-layout>