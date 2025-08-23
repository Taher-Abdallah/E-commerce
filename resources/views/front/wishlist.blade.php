@extends('front.master')
    @section('content')
      <main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Wishlist</h2>

      <div class="shopping-cart">
        <div class="cart-table__wrapper">
          <table class="cart-table">
            <thead>
              <tr>
                <th>Product</th>
                <th></th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @forelse ($wishlistItems as $item) 
              <tr>
                <td>
                  <div class="shopping-cart__product-item">
                    <img loading="lazy" src="{{ asset('storage/products/' . optional($item->model)->image) }}" width="120" height="120" alt="" />
                  </div>
                </td>
                <td>
                  <div class="shopping-cart__product-item__detail">
                    <h4>{{ $item->name }}</h4>
                    <ul class="shopping-cart__product-item__options">
                      <li>Color: Yellow</li>
                      <li>Size: L</li>
                    </ul>
                  </div>
                </td>
                <td>
                  <span class="shopping-cart__product-price">${{ $item->price }}</span>
                </td>
                <td>
                  <div class="qty-control position-relative">
                    <input type="number" name="quantity" value="1" min="1" class="qty-control__number text-center" disabled>

                  </div><!-- .qty-control -->
                </td>
                <td>
                  <span class="shopping-cart__subtotal">${{ $item->subTotal() }}</span>
                </td>
                <td>
                    <form action="{{ route('front.wishlist.move.to.cart', $item->rowId) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                    </form>
                    <form action="{{ route('front.wishlist.remove', $item->rowId) }}" method="POST" id="remove-item">
                      @csrf
                        @method('DELETE')
                  <a href="javascript:void(0)" class="remove-cart" onclick="event.preventDefault(); document.getElementById('remove-item').submit();">
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                      <path d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                    </svg>
                  </a>
                </form>
                </td>
              </tr>
                @empty
                    <td colspan="6" class="text-center">No wishlist items found</td>
                @endforelse

            </tbody>
          </table>
          <div class="cart-table-footer">
            <form action="{{ route('front.wishlist.remove.all') }}" method="POST" class="position-relative bg-body">
              @csrf
              @method('DELETE')
            <button class="btn btn-light">CLEAR CART</button>
            </form>
          </div>
        </div>

    </section>
  </main>
    @endsection 