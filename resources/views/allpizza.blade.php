
<x-app-layout>
    <div class="mx-auto">

    <h1 class="text-center text-5xl my-8">Sve pice</h1>
    
    <div class="flex justify-center flex-wrap">
        
        @foreach ($pizzas as $pizza)
        <div class="basis-1/8 md:basis-1/4 flex flex-col items-center" >
    
            <a href="{{route("one", $pizza->id)}}">
                <img src="{{$pizza->image}}" alt="">
                <h2 class="text-xl">
                    {{$pizza->name}}
                </h2>
                
            </a>
            <form action="{{route("orders.store")}}" method="post">
             @csrf
                
             <label for="qty">Quantity:</label>
             <input type="text" name="qty" value="1" class="w-8">
             <input type="hidden" name="pizza_id" value="{{ $pizza->id }}">
             <!--py-2 px-4 border rounded-lg border-gray-300 bg-white text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring focus:border-blue-500-->
             <button type="submit" class="bg-slate-300 font-semibold focus:ring focus:border-blue-500">Add to card</button>
         </form>
        </div>
            
        
            
        @endforeach
    </div>

    </div>
</x-app-layout>

