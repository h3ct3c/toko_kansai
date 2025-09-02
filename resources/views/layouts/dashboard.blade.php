@include('layout.adminhead')
    </div> 
</nav>

<div class="flex">
<div class="flex">
    <!-- Sidebar -->
    @include('layout.adminside')


    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <div class="mt-0"></div>

        <!-- Table -->
        <main class="p-6">
         @yield('content')
        </main>


        <div class="mb-64"></div>

</body>
</html>