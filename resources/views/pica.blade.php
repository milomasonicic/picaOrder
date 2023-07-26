
<x-app-layout>
<h2>One pica</h2>

{{$pizza ->name}}

<form action="{{route("addPica")}}" method="post">

    @csrf

    <input type="number" name="pizza_id" value="{{$pizza->id}}">
    <button>Add to cart</button>
</form>

</x-app-layout>