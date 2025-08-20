@extends('admin.master')
@section('admin-content')
                        <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Categories</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="index.html">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Categories</div>
                                        </li>
                                    </ul>
                                </div>

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
                                        <a class="tf-button style-1 w208" href="{{ route('category.create') }}"><i
                                                class="icon-plus"></i>Add new</a>
                                    </div>
                                    <div class="wg-table table-all-user">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Slug</th>
                                                    <th>Products</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                           @forelse ($categories as $category)
                                <tbody>
                                    <tr>
                                        <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}</td>
                                        <td class="pname">
                                            <div class="image">
                                                <img src="{{ asset("storage/blogs/$category->image") }}" alt=""
                                                    class="image">
                                            </div>
                                            <div class="name">
                                                <a href="#" class="body-title-2">{{ $category->name }}</a>
                                            </div>
                                        </td>
                                        <td>{{ $category->slug }}</td>
                                        <td><a href="#" target="_blank">2</a></td>
                                        <td>
                                            <div class="list-icon-function">
                                                <x-edit-action href="{{ route('category.edit', $category) }}" />
                                                <x-delete-action action="{{ route('category.destroy', $category) }}" />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @empty
                                <td colspan="5" class="text-center">No categories found</td>
                            @endforelse
                        </table>
                        {{ $categories->links('pagination::bootstrap-4') }}
                    </div>
                    <div class="divider"></div>
                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
