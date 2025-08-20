@extends('admin.master')
@section('admin-content')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>category infomation</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="#">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#">
                            <div class="text-tiny">categories</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Edit-category</div>
                    </li>
                </ul>
            </div>
            <!-- new-category -->
            <div class="wg-box">
                <form class="form-new-product form-style-1" action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <fieldset class="name">
                        <div class="body-title">category Name <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="category name" name="name" tabindex="0"
                            value="{{ $category->name }}" aria-required="true">
                            <x-error-validate field="name" />
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title">category Slug <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="category Slug" name="slug" tabindex="0"
                            value="{{ $category->slug }}" aria-required="true">

                            <x-error-validate field="slug" />
                    </fieldset>
                    <fieldset>
                        <div class="body-title">Upload images <span class="tf-color-1">*</span></div>
                        <div class="upload-image flex-grow">

                            <!-- عرض الصورة الحالية لو موجودة -->
                            <div class="item" id="imgpreview" style="{{ $category->image ? '' : 'display:none' }}">
                                @if ($category->image)
                                    <img src="{{ asset('storage/blogs/' . $category->image) }}" class="effect8" alt="product image">
                                @endif
                            </div>

                            <!-- خانة رفع صورة جديدة -->
                            <div id="upload-file" class="item up-load">
                                <label class="uploadfile" for="myFile">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="body-text">
                                        Drop your images here or select <span class="tf-color">click to browse</span>
                                    </span>
                                    <input type="file" id="myFile" name="image" accept="image/*"
                                        onchange="previewImage(event)">
                                </label>
                            </div>

                        </div>
                    </fieldset>


                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit">Save</button>
                                            <x-back-action href="{{ route('category.index') }}" />

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
