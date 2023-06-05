<div class="sidebar" id="side_nav">
    <div class="header-box d-flex justify-content-between">
        <h1 class="fs-4">
            <span class="bg-white text-dark rounded shadow px-2 me-2">RA</span>
            <span class="text-white">Recipe</span>
        </h1>
        <button class="btn d-md-none d-block close-btn py-1 py-0"><i class="fa-solid fa-bars"></i></button>
    </div>
    <ul>
        <li class=""><a href="/dashboard"><i class="fa-solid fa-house"></i>Dashboard</a></li>
        <li class=""><a href="{{ route('ingredient') }}"><i class="fa-solid fa-list-ul"></i>Ingredient</a></li>
        {{-- <li class="">
            <a href="#" class="dropdown-toggle d-flex justify-content-between" data-toggle="collapse" aria-expanded="false">
                <span><i class="fa-solid fa-list-ul"></i>Ingredient</span>
                <span><i class="fa-solid fa-angle-down"></i></span>
            </a>
            <ul class="collapse">
                <li><a href="/driver">Table View</a></li>
                <li><a href="/drivercard">Card View</a></li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="d-flex justify-content-between">
                <span><i class="fa-solid fa-calendar"></i>Schedule</span>
                <span class="bg-dark rounded-pill text-white py-0 px-2">2</span>
            </a>
        </li> --}}
    </ul>
    <hr class="h-color mx-2">
    <ul>
        <li class=""><a href="#"><i class="fa-solid fa-gear"></i>Setting</a></li>
        <li class=""><a href="/test"><i class="fa-solid fa-list-ul"></i></i>test</a></li>
    </ul>
</div>

@section('javascript')
    <script type="module" src="{{ asset('js/sidebar.js') }}"></script>
@endsection