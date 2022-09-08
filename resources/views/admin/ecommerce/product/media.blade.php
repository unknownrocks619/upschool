<x-admin-layout title=" :: Product :: {{ $product->product_name }} :: Media" heading="{{ $product->product_name }} :: Media">
    <div class="col-md-12">
        <a href="{{ route('admin.commerce.product.list') }}" class="mb-2 btn btn-outline-primary">
            <x-arrow-left></x-arrow-left>
            Go back
        </a>
        <x-alert></x-alert>
        <div class="card">
            <x-form action="{{ route('admin.commerce.product.media.store',$product->id) }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="meta_title">File Upload
                                <sup class="text-danger">
                                    *
                                </sup>
                            </label>
                            <input type="file" name="media" id="media" class="form-control @error('media') border border-danger @enderror" />
                            @error('media')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </x-form>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card bg-light mt-4">
            <div class="card-body">
                <div class="row">

                    @if( $product->images )
                    @forelse ($product->images as $key=>$media)
                    <div class="col-3 border border-primary p-3 mx-1 mx-auto">
                        <img src="{{ asset($media->path) }}" alt="" class="img-fluid">
                        <form class="mt-3" action="{{ route('admin.commerce.product.media.delete',[$product->id,$key]) }}" method="post">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <x-trash></x-trash>
                                Delete Media
                            </button>
                        </form>
                    </div>
                    @empty
                    <div class="col-md-12 alert alert-info">
                        Media Not Found for selected Product
                    </div>
                    @endforelse
                    @else
                    <div class="col-md-12 alert alert-info">
                        Media Not Found for selected Product
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>