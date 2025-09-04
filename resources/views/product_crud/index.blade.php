@extends('layouts.dashboard')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Product List</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body>

@section('content')

<div class="container mx-auto px-10">
    <div class="grid grid-cols-8 gap-4 mb-4 p-5">
        <div class="col-span-4 mt-2">
            <h1 class="text-3xl font-bold">
                
            </h1>
        </div>
        <div class="col-span-4">
            <div class="flex justify-end">
                <a href="{{ route('product_crud.create') }}"
                class="inline-block px-6 py-2.5 bg-blue-900 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                id="add-product-btn">Add Product</a>
            </div>
        </div>
    </div>
    <div class="bg-white p-5 rounded shadow-lg">
        <!-- Notifikasi menggunakan flash session data -->
        @if (session('success'))
            <div class="p-3 rounded bg-green-500 text-green-100 mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-800 font-semibold">
                <thead class="text-xs text-gray-300 uppercase bg-gray-50 dark:bg-blue-900 dark:text-gray-300">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Color
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stock
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse ($products as $product)
                    <tr class="bg-white border dark:bg-white dark:border-gray-300 border-gray-200">
                        <td class="px-6 py-4">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->category }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->color }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->stock }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->price}}
                        </td>
                        <td class="px-8 py-4">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ route('product_crud.destroy', $product) }}" method="POST">

                                @csrf
                                @method('DELETE')
                                <a href="{{ route('product_crud.show', $product) }}" id="{{ $product->id }}-edit-btn"
                                class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">View</a>

                                <a href="{{ route('product_crud.edit', $product) }}" id="{{ $product->id }}-edit-btn"
                                class="inline-block px-6 py-2.5 bg-gray-800 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-gray-600 hover:shadow-lg focus:bg-gray-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">Edit</a>

                                <button type="submit"
                                        class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                                        id="{{ $product->id }}-delete-btn">Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td class="text-center text-sm text-gray-900 px-6 py-4 whitespace-nowrap" colspan="6">
                            Data Empty
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>

    <div class="mt-3">
        {{ $products->links() }}
    </div>
</div>
</div>  
</div>

@endsection

</body>

</html>
