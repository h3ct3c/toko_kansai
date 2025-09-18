<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Create New Product - Tutorial CRUD Laravel 12 @ qadrlabs.com</title>
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body>
  <div class="container mx-auto mt-10 mb-10 px-10 justify-items-center">
    <!-- Header -->
    <div class="grid-center grid-cols-8 gap-4 p-5">
      <div class="col-span-4 mt-2">
        <h1 class="text-3xl text-blue-900 font-bold">CREATE NEW PRODUCT</h1>
      </div>
      <div class="col-span-4"></div>
    </div>

    <!-- Form -->
    <div class="bg-white dark:bg-white w-145 p-5 rounded-lg shadow-lg">
      <form action="{{ route('product_crud.store') }}" method="POST">
        @csrf

        <!-- Name -->
        <div class="mb-5">
          <label for="name" class="font-semibold">Name</label>
          <input type="text" 
                name="name" 
                value="{{ old('name') }}" 
                required
                class="form-control block w-135 px-3 py-1.5 text-base font-normal text-gray-700 
                        bg-white border border-gray-400 rounded-lg transition ease-in-out
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none mt-4" />
          @error('name')
            <div class="bg-red-400 p-2 shadow-sm rounded mt-2">{{ $message }}</div>
          @enderror
        </div>

        <!-- Category -->
        <div class="mb-5">
          <label for="category" class="font-semibold">Category</label>
          <input type="text" 
                name="category" 
                value="{{ old('category') }}" 
                required
                class="form-control block w-135 px-3 py-1.5 text-base font-normal text-gray-700 
                        bg-white border border-gray-400 rounded-lg transition ease-in-out
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none mt-4" />
          @error('category')
            <div class="bg-red-400 p-2 shadow-sm rounded mt-2">{{ $message }}</div>
          @enderror
        </div>

        <!-- Color -->
        <div class="mb-5">
          <label for="color" class="font-semibold">Color</label>
          <input type="text" 
                name="color" 
                value="{{ old('color') }}" 
                required
                class="form-control block w-135 px-3 py-1.5 text-base font-normal text-gray-700 
                        bg-white border border-gray-400 rounded-lg transition ease-in-out
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none mt-4" />
          @error('color')
            <div class="bg-red-400 p-2 shadow-sm rounded mt-2">{{ $message }}</div>
          @enderror
        </div>

        <!-- Price -->
        <div class="mb-5">
          <label for="price" class="font-semibold">Price</label>
          <input type="text" 
                name="price" 
                value="{{ old('price') }}" 
                required
                class="form-control block w-135 px-3 py-1.5 text-base font-normal text-gray-700 
                        bg-white border border-gray-400 rounded-lg transition ease-in-out
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none mt-4" />
          @error('price')
            <div class="bg-red-400 p-2 shadow-sm rounded mt-2">{{ $message }}</div>
          @enderror
        </div>

        <!-- Stock -->
        <div class="mb-5">
          <label for="stock" class="font-semibold">Stock</label>
          <input type="text" 
                name="stock" 
                value="{{ old('stock') }}" 
                required
                class="form-control block w-135 px-3 py-1.5 text-base font-normal text-gray-700 
                        bg-white border border-gray-400 rounded-lg transition ease-in-out
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none mt-4" />
          @error('stock')
            <div class="bg-red-400 p-2 shadow-sm rounded mt-2">{{ $message }}</div>
          @enderror
        </div>

        <!-- Buttons -->
        <div class="mt-3 flex gap-3">
          <button type="submit"
                  class="px-6 py-2.5 bg-blue-900 text-white font-medium text-xs uppercase rounded-full shadow-md 
                        hover:bg-blue-800 hover:shadow-lg focus:bg-blue-800 focus:shadow-lg 
                        focus:outline-none active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
            Save
          </button>
          <a href="{{ route('product_crud.index') }}"
            class="px-6 py-2.5 bg-gray-200 text-gray-700 font-medium text-xs uppercase rounded-full shadow-md 
                    hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg 
                    focus:outline-none active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
            Back
          </a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>
