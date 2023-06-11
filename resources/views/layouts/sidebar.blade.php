<aside id="sidebar">
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="#">Recipe App</a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Tools & Component
            </li>
            <li class="sidebar-item">
                <a href="/dashboard" class="sidebar-link"><i class="bi bi-speedometer pe-2"></i>Dashboard</a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages" aria-expanded="false" aria-controls="pages">
                    <i class="bi bi-tag pe-2"></i>
                    Ingredient
                </a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{ route('ingredient') }}" class="sidebar-link"><i class="bi bi-arrow-right-circle pe-2 small-icon"></i>Ingredient List</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('ingredientType') }}" class="sidebar-link"><i class="bi bi-folder pe-2 small-icon"></i>Ingredient Type</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('measurement') }}" class="sidebar-link"><i class="bi bi-rulers pe-2 small-icon"></i>Measurement</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-header">
                Other Utilities
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link"><i class="bi bi-screwdriver pe-2"></i>Test</a>
            </li>
            <li class="sidebar-header">
                User Setting
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#dropSideUser" aria-expanded="false" aria-controls="dropSideUser">
                    <img src="/image/OIG.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
                    SuperAdmin
                </a>
                <ul id="dropSideUser" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link"><i class="bi bi-gear pe-2 small-icon"></i>Settings</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link"><i class="bi bi-person pe-2 small-icon"></i>Profile</a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#"><i class="bi bi-arrow-right pe-2 small-icon"></i>Sign out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>

@section('javascript')
    <script type="module" src="{{ asset('js/sidebar.js') }}"></script>
@endsection