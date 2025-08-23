@extends('admin.master')
@section('admin-content')
                        <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Coupons</h3>
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
                                            <div class="text-tiny">Coupons</div>
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
                                        <a class="tf-button style-1 w208" href="{{ route('coupon.create') }}"><i
                                                class="icon-plus"></i>Add new</a>
                                    </div>
                                    <div class="wg-table table-all-user">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Code</th>
                                                        <th>Type</th>
                                                        <th>Value</th>
                                                        <th>Cart Value</th>
                                                        <th>Expiry Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($coupons as $coupon)
                                                    <tr>
                                                        <td>{{ ($coupons->currentPage() - 1) * $coupons->perPage() + $loop->iteration }}</td>
                                                        <td>{{ $coupon->code }}</td>
                                                        <td>{{ $coupon->type == 'fixed' ? 'Fixed' : 'Percent' }}</td>
                                                        <td>{{ $coupon->value }}</td>
                                                        <td>{{ $coupon->cart_value }}</td>
                                                        <td>{{ $coupon->expiry_date  }}</td>
                                                        <td>
                                                            <div class="list-icon-function">
                                                                <x-edit-action href="{{ route('coupon.edit', $coupon) }}" />

                                                                <x-delete-action  action="{{ route('coupon.destroy', $coupon) }}" name="Coupon"/>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="7" class="text-center">No Coupons Found</td>
                                                    </tr>
                                                    @endforelse

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                                        {{ $coupons->links('pagination::bootstrap-4') }}

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endsection