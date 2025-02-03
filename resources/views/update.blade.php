<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Add Products</title>
</head>
<body>

<div class="h-screen flex justify-center items-center">
    <form action="{{url('/updateproduct/'.$data->id) }}" method="POST" enctype="multipart/form-data" class="gap-3 flex flex-col">
        @csrf

        @method('POST')

        <!-- Product Name -->
        <label class="input input-bordered flex items-center gap-2">
            Name
            <input type="text" value="{{$data->name}}" class="grow @error('productname') is-invalid @enderror" name="productname" placeholder="Daisy" />
        </label>
        @error('productname')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror

        <!-- Product Price -->
        <label class="input input-bordered flex items-center gap-2">
            Price
            <input type="number"   value="{{$data->price}}"  class="grow @error('productprice') is-invalid @enderror" name="productprice" placeholder="500" />
        </label>
        @error('productprice')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror

        <!-- Product Color (Optional) -->
        <label class="input input-bordered flex items-center gap-2">
            <input type="text" value="{{$data->color}}" class="grow" name="productcolor" placeholder="Description" />
            <span class="badge badge-info">Optional</span>
        </label>
        @error('productcolor')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

        <!-- Image Upload -->
    <input type="file" name="imagefile" value="{{$data->image}}" class="file-input w-full max-w-xs" />
        @error('imagefile')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror

        <!-- Submit Button -->
        <button class="btn btn-primary">Update</button>
    </form>
</div>

</body>
</html>
