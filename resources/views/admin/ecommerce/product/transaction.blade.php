<x-admin-layout title=" :: Product :: {{ $product->product_name }} :: Transactions" heading="{{ $product->product_name }} :: Transactions">
    <div class="col-md-12">
        <a href="{{ route('admin.commerce.product.list') }}" class="mb-2 btn btn-outline-primary">
            <x-arrow-left></x-arrow-left>
            Go back
        </a>
        <x-alert></x-alert>
        <div class="card">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover table-bordred">
                        <thead>
                            <tr>
                                <td>S.No</td>
                                <td>Particulars</td>
                                <td>Debit</td>
                                <td>Credit</td>
                                <td>Remarks</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th colspan="5" class="text-center"> Transactions Not Found</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>