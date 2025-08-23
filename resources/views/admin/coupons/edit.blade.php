@extends('admin.master')
    @section('admin-content')
                            <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Coupon infomation</h3>
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
                                            <a href="{{ route('coupon.index') }}">
                                                <div class="text-tiny">Coupons</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Edit Coupon</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="wg-box">
                                    <form class="form-new-product form-style-1" method="POST" action="{{ route('coupon.update', $coupon) }}">
                                        @csrf
                                        @method('PUT')
                                        <fieldset class="name">
                                            <div class="body-title">Coupon Code <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Coupon Code" name="code" 
                                            value="{{ $coupon->code }}" tabindex="0"  aria-required="true" >
                                        </fieldset>
                                        <x-error-validate field="code" />
                                        <fieldset class="category">
                                            <div class="body-title">Coupon Type</div>
                                            <div class="select flex-grow">
                                                <select class="" name="type">
                                                    <option  selected disabled >Select</option>
                                                    <option value="fixed" @selected($coupon->type == 'fixed')>Fixed</option>
                                                    <option value="percentage" @selected($coupon->type == 'percentage')>Percent</option>
                                                </select>
                                            </div>
                                        </fieldset>
                                        <x-error-validate field="type" />
                                        <fieldset class="name">
                                            <div class="body-title">Value <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Coupon Value" name="value"
                                                tabindex="0"  aria-required="true" value="{{ $coupon->value }}">
                                        </fieldset>
                                        <x-error-validate field="value" />
                                        <fieldset class="name">
                                            <div class="body-title">Cart Value <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Cart Value"
                                                name="cart_value" tabindex="0"  aria-required="true" value="{{ $coupon->cart_value }}"
                                                >
                                        </fieldset>
                                        <x-error-validate field="cart_value" />
                                        <fieldset class="name">
                                            <div class="body-title">Expiry Date <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="date" placeholder="Expiry Date"
                                                name="expiry_date" tabindex="0"  aria-required="true" value="{{ $coupon->expiry_date }}"
                                                >
                                        </fieldset>
                                        <x-error-validate field="expiry_date" />

                                        <div class="bot">
                                            <div></div>
                                            <button class="tf-button w208" type="submit">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
    @endsection