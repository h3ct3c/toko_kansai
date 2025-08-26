<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History - Toko Kansai</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-7xl" x-data="orders">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Order History</h1>
            <p class="text-gray-600 mt-2">View your recent purchases and order status</p>
        </div>

        <!-- Orders List -->
        <div class="space-y-6">
            <!-- Order Card -->
            <template x-for="order in orders" :key="order.id">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <!-- Order Summary -->
                    <div class="p-6 cursor-pointer hover:bg-gray-50 transition-colors" 
                         @click="openOrder === order.id ? openOrder = null : openOrder = order.id">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                            <div class="mb-4 md:mb-0">
                                <div class="flex items-center space-x-4">
                                    <span class="text-sm font-medium text-gray-900" x-text="'Order #' + order.id"></span>
                                    <span class="px-3 py-1 rounded-full text-xs font-medium" 
                                          :class="{
                                            'bg-sky-400 text-white': order.status === 'Delivered',
                                            'bg-red-400 text-white': order.status === 'Processing',
                                            'bg-blue-100 text-blue-800': order.status === 'Shipped'
                                          }"
                                          x-text="order.status"></span>
                                </div>
                                <p class="text-sm text-gray-500 mt-1" x-text="'Order Date: ' + order.date"></p>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-semibold text-gray-900" x-text="'Rp' + order.total"></p>
                                <p class="text-sm text-gray-500" x-text="order.items.length + ' items'"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Order Details -->
                    <div class="border-t border-gray-100" x-show="openOrder === order.id" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95">
                        <div class="p-6 space-y-6">
                            <!-- Order Items -->
                            <div class="space-y-4">
                                <h3 class="text-sm font-medium text-gray-900">Items Purchased</h3>
                                <div class="space-y-4">
                                    <template x-for="item in order.items" :key="item.id">
                                        <div class="flex items-center space-x-4">
                                            <img :src="item.image" :alt="`${item.name}`" 
                                                 class="w-16 h-16 object-cover rounded-md border border-gray-200">
                                            <div class="flex-1">
                                                <p class="text-sm font-medium text-gray-900" x-text="item.name"></p>
                                                <p class="text-sm text-gray-500" x-text="'Quantity: ' + item.quantity"></p>
                                            </div>
                                            <p class="text-sm font-medium text-gray-900" x-text="'$' + item.price"></p>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <!-- Order Summary -->
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div class="space-y-2">
                                        <p class="font-medium text-gray-900">Shipping Address</p>
                                        <p x-text="order.shipping.address"></p>
                                        <p x-text="order.shipping.city + ', ' + order.shipping.state"></p>
                                        <p x-text="order.shipping.country"></p>
                                    </div>
                                    <div class="space-y-2">
                                        <p class="font-medium text-gray-900">Payment Method</p>
                                        <p x-text="order.payment.method"></p>
                                        <p x-text="'Card: ​**** ​**** ​**** ' + order.payment.last4"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order Actions -->
                        <div class="border-t border-gray-100 px-6 py-4 bg-gray-50">
                            <div class="flex justify-end space-x-4">
                                <button class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
                                    View Invoice
                                </button>
                                <button class="px-4 py-2 bg-blue-600 rounded-md text-sm font-medium text-white hover:bg-blue-700">
                                    Reorder
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('orders', () => ({
                openOrder: null,
                orders: [
                    {
                        id: '#1234',
                        date: 'Agust 20, 2025',
                        status: 'Delivered',
                        total: 463.000,
                        items: [
                            { id: 1, name: 'Kansai Glimmer', price: 369.000, quantity: 1, image: '/img/KANSAI GLIMMER.png' },
                            { id: 2, name: 'Kansai Ftalit Duo', price: 94.000, quantity: 1, image: '/img/KANSAI FTALIT DUO.png' }
                        ],
                        shipping: {
                            address: '123 Main Street',
                            city: 'cikanyut',
                            state: 'knjt',
                            country: 'Indonesia'
                        },
                        payment: {
                            method: 'Visa',
                            last4: '1234'
                        }
                    },
                    {
                        id: '#5678',
                        date: 'Agust 25, 2025',
                        status: 'Processing',
                        total: 188.000,
                        items: [
                            { id: 3, name: 'Kansai Ftalit Duo', price: 94.000, quantity: 1, image: '/img/KANSAI FTALIT DUO.png' },
                            { id: 4, name: 'Kansai Ftalit Duo', price: 94.000, quantity: 1, image: '/img/KANSAI FTALIT DUO.png' }
                        ],
                        shipping: {
                            address: '456 Elm Street',
                            city: 'cihideng',
                            state: 'hideng',
                            country: 'Indonesia'
                        },
                        payment: {
                            method: 'MasterCard',
                            last4: '5678'
                        }
                    }
                ]
            }))
        })
    </script>
</body>
</html>