@extends('baseUser')
@section('title', 'BobLocation')

@section('content')
   <div class="bg-light p-2 mb-5 text-center">
        <div class="container">
            <h1>Agence BobLocation</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis excepturi eum a. Cumque,
                vel accusamus ullam libero modi autem? Cum aut quam maxime provident laudantium aspernatur
                nulla facere, rerum nemo.Deleniti delectus iste expedita perspiciatis suscipit voluptatem
                ad a aspernatur voluptatibus necessitatibus consectetur ipsum tenetur incidunt assumenda, 
                eaque doloremque facere distinctio corrupti, consequatur itaque. Minima obcaecati odit fuga
                 mollitia voluptate.</p>
        </div>
   </div>

   <div class="container">
        <h2>Last properties</h2>
        <div class="row">
            @foreach ($properties as $property)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                @include('property.card')
            </div>
            @endforeach
        </div>
   </div>

@endsection