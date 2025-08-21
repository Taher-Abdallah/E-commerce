@extends('admin.master')
@section('admin-content')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>All Products</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap10">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">All Products</div>
                    </li>
                </ul>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="Search here..." class="" name="name"
                                    tabindex="2" value="" aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <a class="tf-button style-1 w208" href="{{ route('product.create') }}"><i class="icon-plus"></i>Add
                        new</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Sale Price</th>
                                <th>SKU</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Featured</th>
                                <th>Stock</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @forelse ($products as $product)
                            <tbody>
                                <tr>
                                    <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>
                                    <td class="pname">
                                        <div class="image">
                                            <img src="{{ asset("storage/products/$product->image") }}" alt=""
                                                class="image">
                                        </div>
                                        <div class="name">
                                            <a href="#" class="body-title-2">{{ $product->name }}</a>
                                            <div class="text-tiny mt-3">{{ $product->name }}</div>
                                        </div>
                                    </td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->discount_price? "$product->discount_price" : 'N/A' }}</td>
                                    <td>{{ $product->SKU }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td>{{ $product->is_featured ? 'Yes' : 'No' }}</td>
                                    <td>{{ $product->stock_status }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        <div class="list-icon-function">
                                            <a href="{{ route('product.show', $product) }}" >
                                                <div class="item eye">
                                                    <i class="icon-eye"></i>
                                                </div>
                                            </a>

                                            <x-edit-action href="{{ route('product.edit', $product) }}" />
                                            <x-delete-action action="{{ route('product.destroy', $product) }}" />
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        @empty
                            <td colspan="11" class="text-center">No Products found</td>
                            @endforelse
                        </table>
                </div>
                {{ $products->links('pagination::bootstrap-4') }}

                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">


                </div>
            </div>
        </div>
    </div>
@endsection
