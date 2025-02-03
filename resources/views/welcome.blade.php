<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>FaceBook</title>
</head>
<body>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
          <a href="{{ route('addproductsfild') }}"> <button class="bg-green-500 hover:bg-green-700   text-white font-bold p-3 my-5 rounded-3xl">Add Product +</button></a> 
          <h2 class="text-2xl font-bold tracking-tight text-gray-900">Customers also purchased</h2>
             <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                @foreach ($product as $pro)

                 <div class="group relative">
                  <div class="relative">
                <img src="{{ asset('storage/'. $pro->image) }}" alt="Front of men&#039;s Basic Tee in black." class="aspect-square w-full  rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80">
            
                <form action="{{ url('/delete/'.$pro->id)}}" method="POST" class="absolute top-4 right-3 z-10">
                  @csrf
                  @method('DELETE')
                <button> <img src="{{ asset('Frame.png') }}" class=" z-10 cursor-pointer" alt=""></button>
                </form>
                
                <form action="{{ url('/update/'.$pro->id)}}" method="POST" class="absolute top-4 left-3 z-10">
                  @csrf
                  @method('POST')
                <button> <img src="{{ asset('Vector.png') }}" class=" z-10 cursor-pointer" alt=""></button>
                </form>
                
              </div>
                <div class="mt-4 flex justify-between">
                  <div>
                    <h3 class="text-sm text-gray-700">
                      <a href="{{url('/viewiteme/'.$pro->id)}}">
                        <span aria-hidden="true" class="absolute inset-0"></span>
                      {{$pro->name}}
                      </a>
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">{{$pro->color}}</p>
                  </div>
                  <p class="text-sm font-medium text-gray-900">${{$pro->price}}</p>
                </div>
              </div>
      @endforeach
                    
       


            <!-- More products... -->
          </div>
        </div>
      </div>
    
</body>
</html>