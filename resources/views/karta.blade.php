<h2>your cart</h2>

@foreach ($carts as $cart)
<p>
    @if($cart->user_id == auth()->user()->id)   
    user{{$cart->user_id}}
    pica{{$cart->pizza_id}}
    @endif 
</p>
    
@endforeach