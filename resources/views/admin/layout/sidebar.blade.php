                <div class="section-menu-left">
                    <div class="box-logo">
                        <a href="index.html" id="site-logo-inner">
                            <img class="" 
                                src="{{ asset('admin-assets') }}/images/logo/taher.png" >
                        </a>
                        <div class="button-show-hide">
                            <i class="icon-menu-left"></i>
                        </div>
                    </div>
                    <div class="center">
                        <div class="center-item">
                            <br>
                            <br>
                            <div class="center-heading">Main Home</div>
                            <ul class="menu-list">
                                <x-menu-item href="{{ route('front.home') }}" icon="icon-home" name="Home" />
                                <x-menu-item href="{{ route('admin.dashboard') }}" icon="icon-grid" name="Dashboard" />
                            </ul>
                        </div>

                        <div class="center-item">
                            <ul class="menu-list">
                                {{-- product menu --}}
                                <x-menu-item-children href1="{{ route('product.create') }}" href2="{{ route('product.index') }}" icon="icon-shopping-cart"
                                    name="Products" subname1="Add Product" subname2="Products" />
                                {{-- brand menu --}}
                                <x-menu-item-children href1="{{ route('brand.create') }}"
                                    href2="{{ route('brand.index') }}" icon="icon-layers"
                                    name="Brand" subname1="New Brand" subname2="Brands" />
                                {{-- Categoty menu --}}
                                <x-menu-item-children href1="{{ route('category.create') }}" href2="{{ route('category.index') }}" icon="icon-layers" name="Category"
                                    subname1="New Category" subname2="Categories" />
                                {{-- order menu --}}
                                <x-menu-item-children href1="#" href2="#" icon="icon-file-plus" name="Order"
                                    subname1="Orders" subname2="Order tracking" />


                                <x-menu-item href="#" icon="icon-image" name="Slider" />

                                <x-menu-item href="#" icon="icon-grid" name="Coupns" />

                                <x-menu-item href="#" icon="icon-user" name="User" />
                                <x-menu-item href="#" icon="icon-settings" name="Settings" />
                                <x-logout-component />
                            </ul>
                        </div>
                    </div>
                </div>
