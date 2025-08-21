@extends('admin.master')
@section('admin-content')
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Edit Product</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="{{ route('product.index') }}">
                            <div class="text-tiny">Products</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Edit product</div>
                    </li>
                </ul>
            </div>
            <!-- form-add-product -->
            <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data"
                action="{{ route('product.update', $product) }}">
                @csrf
                @method('PUT')
                <div class="wg-box">

                    <fieldset class="name">
                        <div class="body-title mb-10">Product name <span class="tf-color-1">*</span>
                        </div>
                        <input class="mb-10" type="text" placeholder="Enter product name" name="name" tabindex="0"
                            value="{{ $product->name }}" aria-required="true">
                        <div class="text-tiny">Do not exceed 100 characters when entering the
                            product name.</div>
                    </fieldset>
                    <x-error-validate field="name" />

                    <fieldset class="name">
                        <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter product slug" name="slug" tabindex="0"
                            value="{{ $product->slug }}" aria-required="true">
                        <div class="text-tiny">Do not exceed 100 characters when entering the
                            product name.</div>
                    </fieldset>
                    <x-error-validate field="slug" />

                    <div class="gap22 cols">
                        <fieldset class="category">
                            <div class="body-title mb-10">Category <span class="tf-color-1">*</span>
                            </div>
                            <div class="select">
                                <select class="" name="category_id">
                                    <option>Choose category</option>
                                    @forelse($categories as $category)
                                        <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>{{ $category->name }}</option>
                                    @empty
                                        <option value="" disabled>No categories found</option>
                                    @endforelse
                                </select>
                            </div>
                            <x-error-validate field="category_id" />

                        </fieldset>
                        <fieldset class="brand">
                            <div class="body-title mb-10">Brand <span class="tf-color-1">*</span>
                            </div>
                            <div class="select">
                                <select class="" name="brand_id">
                                    <option>Choose Brand</option>
                                    @forelse ($brands as   $brand)
                                        <option value="{{ $brand->id }}" @selected($product->brand_id == $brand->id)>{{ $brand->name }}</option>
                                    @empty
                                        <option value="" disabled>No brands found</option>
                                    @endforelse

                                </select>
                            </div>
                            <x-error-validate field="brand_id" />
                        </fieldset>

                    </div>

                    <fieldset class="shortdescription">
                        <div class="body-title mb-10">Short Description <span class="tf-color-1">*</span></div>
                        <textarea class="mb-10 ht-150" name="short_description" placeholder="Short Description" tabindex="0"
                            aria-required="true" >{{ $product->short_description }}</textarea>
                        <div class="text-tiny">Do not exceed 100 characters when entering the
                            product name.</div>
                    </fieldset>
                    <x-error-validate field="short_description" />

                    <fieldset class="description">
                        <div class="body-title mb-10">Description <span class="tf-color-1">*</span>
                        </div>
                        <textarea class="mb-10" name="description" placeholder="Description" tabindex="0" aria-required="true">{{ $product->description }}</textarea>
                        <div class="text-tiny">Do not exceed 100 characters when entering the
                            product name.</div>
                    </fieldset>
                    <x-error-validate field="description" />
                </div>
                <div class="wg-box">

<fieldset>
    <div class="body-title">Upload image <span class="tf-color-1">*</span></div>
    <div class="upload-image flex-grow" style="display: flex; gap: 15px; align-items: center;">

        {{-- لو في صورة موجودة --}}
        <div id="current-image" class="item up-load" style="display: flex; justify-content: center; align-items: center;">
            @if (!empty($product->image))
                <img src="{{ asset('storage/products/' . $product->image) }}" 
                     alt="Current image" 
                     style="max-width: 100%; max-height: 150px; object-fit: contain; border-radius: 8px;">
            @else
                <span style="font-size: 14px; color: #888;">No image uploaded</span>
            @endif
        </div>

        {{-- معاينة الصورة الجديدة --}}
        <div id="new-preview" class="item up-load" style="display: none; justify-content: center; align-items: center;">
            <img src="" id="preview-img" alt="New image preview" 
                 style="max-width: 100%; max-height: 150px; object-fit: contain; border-radius: 8px;">
        </div>

        {{-- خانة رفع الصورة الجديدة --}}
        <div id="upload-file" class="item up-load">
            <label class="uploadfile" for="myFile" style="width: 100%; height: 150px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <span class="icon">
                    <i class="icon-upload-cloud"></i>
                </span>
                <span class="body-text">
                    Drop your image here or <span class="tf-color">click to browse</span>
                </span>
                <input type="file" id="myFile" name="image" accept="image/*" style="display: none;" onchange="previewNewImage(event)">
            </label>
        </div>
    </div>
    <x-error-validate field="image" />
</fieldset>





<fieldset>
    <div class="body-title mb-10">Upload Gallery Images</div>
    <div class="upload-image mb-16" style="display: flex; gap: 15px; flex-wrap: wrap;">

        {{-- لو في صور جاليري قديمة --}}
        @if ($product->images)
            @php
                $gallery = explode(',', $product->images);
            @endphp
            <div style="display:flex; gap:10px; flex-wrap:wrap; align-items:flex-start;">
                @foreach ($gallery as $img)
                    <img src="{{ asset('storage/products/' . $img) }}"
                         alt="gallery image"
                         style="width:120px; height:120px; object-fit:cover; border-radius:8px; border:1px solid #ddd;">
                @endforeach
            </div>
        @else
            <div class="item up-load" style="width: 150px; height: 150px; display:flex; justify-content:center; align-items:center;">
                <span style="color: #888;">No gallery images uploaded</span>
            </div>
        @endif

        {{-- خانة رفع الصور الجديدة --}}
        <div id="galUpload" class="item up-load" style="width: 150px; height: 150px;">
            <label class="uploadfile" for="gFile" style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center; cursor:pointer;">
                <span class="icon">
                    <i class="icon-upload-cloud"></i>
                </span>
                <span class="text-tiny">
                    Drop your images here or <span class="tf-color">click to browse</span>
                </span>
                <input type="file" id="gFile" name="images[]" accept="image/*" multiple style="display:none;">
            </label>
        </div>
    </div>
    <x-error-validate field="images.*" />
</fieldset>


                    <div class="cols gap22">
                        <fieldset class="name">
                            <div class="body-title mb-10">Regular Price <span class="tf-color-1">*</span></div>
                            <input class="mb-10" type="text" placeholder="Enter regular price" name="price" value="{{ $product->price }}"
                                tabindex="0" value="" aria-required="true">
                            <x-error-validate field="price" />
                        </fieldset>

                        <fieldset class="name">
                            <div class="body-title mb-10">Sale Price <span class="tf-color-1">*</span></div>
                            <input class="mb-10" type="text" placeholder="Enter sale price" name="discount_price"
                                tabindex="0" aria-required="true" value="{{ $product->discount_price }}">
                            <x-error-validate field="discount_price" />
                        </fieldset>
                    </div>


                    <div class="cols gap22">
                        <fieldset class="name">
                            <div class="body-title mb-10">SKU <span class="tf-color-1">*</span>
                            </div>
                            <input class="mb-10" type="text" placeholder="Enter SKU" name="SKU" tabindex="0"
                                value="{{ $product->SKU }}" aria-required="true">
                            <x-error-validate field="SKU" />
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span>
                            </div>
                            <input class="mb-10" type="text" placeholder="Enter quantity" name="quantity"
                                tabindex="0" value="{{ $product->quantity }}" aria-required="true">
                            <x-error-validate field="quantity" />
                        </fieldset>
                    </div>

                    <div class="cols gap22">
                        <fieldset class="name">
                            <div class="body-title mb-10">Stock</div>
                            <div class="select mb-10">
                                <select class="" name="stock_status">
                                    <option value="" selected disabled>-- Select Stock Status --</option>
                                    <option value="instock" @selected($product->stock_status == 'instock')>In Stock</option>
                                    <option value="outofstock" @selected($product->stock_status == 'outofstock')>Out of Stock</option>
                                </select>
                            </div>
                            <x-error-validate field="stock_status" />
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title mb-10">Featured</div>
                            <div class="select mb-10">
                                <select class="" name="is_featured">
                                    <option value="" selected disabled>-- Select Featured --</option>
                                    <option value="0" @selected($product->is_featured == 0)>No</option>
                                    <option value="1" @selected($product->is_featured == 1)>Yes</option>
                                </select>
                            </div>
                            <x-error-validate field="is_featured" />
                        </fieldset>
                    </div>
                    <div class="cols gap10">
                        <button class="tf-button w-full" type="submit">Update product</button>
                    </div>
                </div>
            </form>
            <!-- /form-add-product -->
        </div>
        <!-- /main-content-wrap -->
    </div>
@endsection
