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
                <a href="{{ route('ingredient') }}" class="sidebar-link"><i class="bi bi-list-ul pe-2"></i>Ingredient</a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages" aria-expanded="false" aria-controls="pages">
                    <i class="bi bi-file pe-2"></i>
                    Pages
                </a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Analytic</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Example</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Later Ok</a>
                    </li>
                </ul>
                <li class="sidebar-header">
                    Setting & Other
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link"><i class="bi bi-screwdriver pe-2"></i>Test</a>
                </li>
            </li>
        </ul>
    </div>
</aside>

@section('javascript')
    <script type="module" src="{{ asset('js/sidebar.js') }}"></script>
@endsection