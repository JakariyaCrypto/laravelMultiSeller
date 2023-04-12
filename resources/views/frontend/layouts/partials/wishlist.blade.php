<table class="table table-wishlist table-mobile">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Stock Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                        @if(\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->count() > 0)

                            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->content() as $wish)

                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="{{asset($wish->model->photo)}}" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#">{{$wish->name}}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">{{number_format($wish->price,2)}}</td>
                                    @if($wish->model->stock == 'yes')
                                    <td class="stock-col"><span class="in-stock">In stock</span></td>
                                    
                                    <td class="action-col">
                                        <a href="javascript:void(0)" onclick="document.getElementById('wish_form').submit()" class="btn btn-block btn-outline-primary-2 move_to_cart"><i class="icon-cart-plus"></i>Add to Cart</a>
                                        
                                    </td>
                                    <form action="{{route('move.cart')}}" id="wish_form" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$wish->id}}">
                                        <input type="hidden" name="rowId" value="{{$wish->rowId}}">

                                    </form>
                                    
                                    @else
                                        <td class="stock-col"><span class="out-of-stock">Out of stock</span></td>
                                        <td class="action-col">
                                            <button class="btn btn-block btn-outline-primary-2 disabled">Out of Stock</button>
                                        </td>
                                    @endif
                                    
                                    <td class="remove-col"><a class="btn-remove wish_destroy" data-row_id="{{$wish->rowId}}" style="cursor:pointer"><i class="icon-close"></i></a></td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan='4'>
                                        <div class="not-found-imoji">
                                            <h2>Nothing Found !</h2>
                                            <img class="not-found" src="{{asset('backend/assets/not-found.png')}}">
                                        </div>
                                    </td>
                                </tr>
                            
                        @endif
                        </tbody>
                    </table><!-- End .table table-wishlist -->