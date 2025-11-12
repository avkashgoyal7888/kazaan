<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708184/kazan/favicons/laepautcwo6zr4mrweeh.png">
    <link rel="apple-touch-icon" sizes="60x60"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708157/kazan/favicons/pzqttccpxtk0nwhrtn5u.png">
    <link rel="apple-touch-icon" sizes="72x72"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708139/kazan/favicons/tjwrgqc6xfjsy4rdgk2l.png">
    <link rel="apple-touch-icon" sizes="76x76"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708122/kazan/favicons/txv1uxqopn4uqlzfodam.png">
    <link rel="apple-touch-icon" sizes="114x114"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708103/kazan/favicons/t3fbk2tt1yuoadr7bw9t.png">
    <link rel="apple-touch-icon" sizes="120x120"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708080/kazan/favicons/wewaapqko1aqqwpkgcnq.png">
    <link rel="apple-touch-icon" sizes="144x144"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708058/kazan/favicons/igu1bzvlrwav6t3ljjqv.png">
    <link rel="apple-touch-icon" sizes="152x152"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708022/kazan/favicons/xcs2zm4wii7u5gf9zh8w.png">
    <link rel="apple-touch-icon" sizes="180x180"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748707991/kazan/favicons/xovcoyygfaplruizxwn0.png">
    <link rel="icon" type="image/png" sizes="144x144"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708465/kazan/favicons/d7rsbzadwpoiesvvb1kj.png">
    <link rel="icon" type="image/png" sizes="96x96"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708492/kazan/favicons/v7goga3pyssas34xkqm4.png">
    <link rel="icon" type="image/png" sizes="72x72"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708520/kazan/favicons/nlubuculkb7uxblc3ijb.png">
    <link rel="icon" type="image/png" sizes="48x48"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708547/kazan/favicons/doe0gorls2kfdhuilvrl.png">
    <link rel="icon" type="image/png" sizes="36x36"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708545/kazan/favicons/ub29uu3raxv4v8vneudu.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708397/kazan/favicons/x99pu1lgc8hcdpvqtqlq.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708314/kazan/favicons/x38a3cutfg4te1cczj3k.png">
    <link rel="icon" type="image/png" sizes="96x96"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708316/kazan/favicons/mmfenujy0ygvazdk1m4y.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708313/kazan/favicons/jbmsdiqtjlnbrmmaxwia.png">
    <link rel="manifest"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708184/kazan/favicons/laepautcwo6zr4mrweeh.png">
    <style>
        body {
            transition: background-color 0.3s, color 0.3s;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Dark mode base styles */
        .dark-mode {
            background-color: #212529;
            color: #f8f9fa;
        }

        /* FIXED: Dark mode navbar styling */
        .dark-mode .navbar {
            background-color: #343a40 !important;
            border-bottom: 1px solid #495057;
        }

        .dark-mode .navbar-brand {
            color: #f8f9fa !important;
        }

        .dark-mode .card,
        .dark-mode .table,
        .dark-mode .offcanvas,
        .dark-mode .small,
        .dark-mode footer label small {
            background-color: #343a40;
            color: #f8f9fa;
        }

        /* FIXED: Higher z-index for dropdown menus */
        .dropdown-menu {
            z-index: 1050 !important;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
        }

        .dark-mode .dropdown-menu {
            background-color: #343a40 !important;
            color: #f8f9fa;
            border: 1px solid #495057;
        }

        .dropdown-item {
            color: #212529;
        }

        .dark-mode .dropdown-item {
            color: #f8f9fa;
        }

        .dark-mode .table-hover tbody tr:hover {
            background-color: #495057;
        }

        .dark-mode .table-hover tbody tr:hover td {
            color: #f8f9fa;
        }

        .dropdown-item:hover {
            background-color: #e9ecef;
            color: #212529;
        }

        .dark-mode .dropdown-item:hover {
            background-color: #495057;
            color: #ffffff;
        }

        .dark-mode .modal-content {
            background-color: #343a40;
            color: #f8f9fa;
        }

        /* FIXED: Form controls - ensure all inputs are interactive */
        .form-control,
        .form-select,
        input,
        textarea,
        select,
        button {
            pointer-events: auto !important;
            -webkit-user-select: auto !important;
            -moz-user-select: auto !important;
            -ms-user-select: auto !important;
            user-select: auto !important;
            position: relative;
            z-index: 10;
        }

        /* FIXED: Form floating labels - only labels should be non-interactive */
        .form-floating>label {
            pointer-events: none;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            padding: 1rem 0.75rem;
            border: 1px solid transparent;
            transform-origin: 0 0;
            transition: opacity 0.1s ease-in-out, transform 0.1s ease-in-out;
            z-index: 5;
        }

        .form-floating {
            position: relative;
        }

        .form-floating>.form-control {
            height: calc(3.5rem + 2px);
            line-height: 1.25;
            padding: 1rem 0.75rem;
            position: relative;
            z-index: 10;
        }

        .form-floating>.form-control:focus~label,
        .form-floating>.form-control:not(:placeholder-shown)~label {
            opacity: 0.65;
            transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
        }

        /* Dark mode form styles */
        .dark-mode .form-control,
        .dark-mode .form-select,
        .dark-mode input,
        .dark-mode textarea,
        .dark-mode select {
            background-color: #495057 !important;
            border-color: #6c757d !important;
            color: #f8f9fa !important;
        }

        .dark-mode .form-control:focus,
        .dark-mode .form-select:focus,
        .dark-mode input:focus,
        .dark-mode textarea:focus {
            background-color: #495057 !important;
            border-color: #86b7fe !important;
            color: #f8f9fa !important;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25) !important;
        }

        .dark-mode .form-floating>label {
            color: #adb5bd;
        }

        .dark-mode .form-floating>.form-control:focus~label,
        .dark-mode .form-floating>.form-control:not(:placeholder-shown)~label {
            color: #86b7fe;
        }

        .dark-mode .form-control::placeholder,
        .dark-mode input::placeholder,
        .dark-mode textarea::placeholder {
            color: #6c757d;
        }

        /* Sidebar styles */
        .sidebar-item {
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 5px;
            cursor: pointer;
        }

        .sidebar-item a {
            color: #212529;
            text-decoration: none;
        }

        .sidebar-item a:hover {
            color: #0d6efd;
            text-decoration: none;
        }

        .dark-mode .sidebar-item a {
            color: #f8f9fa;
        }

        .dark-mode .sidebar-item a:hover {
            color: #0d6efd;
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .footer {
            margin-top: auto;
            padding: 10px;
            text-align: center;
        }

        /* Offcanvas animations */
        .offcanvas-start {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .offcanvas-start.show {
            transform: translateX(0);
        }

        .offcanvas-backdrop {
            transition: opacity 0.3s ease;
        }

        .offcanvas-backdrop.show {
            opacity: 0.5;
        }

        /* FIXED: Content area z-index - lower than dropdown */
        .container-fluid,
        .row,
        .col-lg-10,
        .col-md-9,
        .content,
        main {
            position: relative;
            z-index: 1;
        }

        /* FIXED: Dropdown toggle button higher z-index */
        .dropdown-toggle {
            z-index: 1051 !important;
        }

        /* FIXED: Ensure no pseudo-elements block interactions */
        *::before,
        *::after {
            pointer-events: none;
        }

        /* Demo form styles */
        .demo-form {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            border: 1px solid #ddd;
            border-radius: 10px;
            position: relative;
            z-index: 1;
        }

        .dark-mode .demo-form {
            border-color: #495057;
        }

        /* FIXED: Navbar z-index to ensure dropdown appears above content */
        .navbar {
            z-index: 1040;
            position: relative;
        }

        /* Livewire Modal Dark Mode Support */
        .dark-mode .livewire-modal {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .dark-mode .livewire-modal .modal-content {
            background-color: #343a40;
            color: #f8f9fa;
        }

        .dark-mode .livewire-modal .card {
            background-color: #495057;
            border-color: #6c757d;
        }

        .dark-mode .livewire-modal .card-header {
            background-color: #0d6efd !important;
            border-color: #6c757d;
        }

        .dark-mode .livewire-modal .bg-light {
            background-color: #495057 !important;
        }
    </style>
    @livewireStyles
    @stack('css')
    @yield('css')
</head>

<body>
    @include('admin.layouts.include.header')

    <!-- Main Content -->
    <main class="col-lg-10 col-md-9 px-md-4 content">
        {{ $slot }}
    </main>
    </div>
    </div>

    @include('admin.layouts.include.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Dark mode functionality
        function applyDarkMode() {
            const lightIcon = document.getElementById("lightIcon");
            const darkIcon = document.getElementById("darkIcon");

            if (localStorage.getItem("darkMode") === "enabled") {
                document.body.classList.add("dark-mode");
                if (lightIcon && darkIcon) {
                    lightIcon.classList.add("d-none");
                    darkIcon.classList.remove("d-none");
                }
            } else {
                document.body.classList.remove("dark-mode");
                if (lightIcon && darkIcon) {
                    lightIcon.classList.remove("d-none");
                    darkIcon.classList.add("d-none");
                }
            }
        }

        // Initialize dark mode
        document.addEventListener("DOMContentLoaded", function() {
            applyDarkMode();

            // Dark mode toggle
            const modeToggle = document.getElementById("modeToggle");
            if (modeToggle) {
                modeToggle.addEventListener("click", function(e) {
                    e.preventDefault();
                    document.body.classList.toggle("dark-mode");

                    const isDark = document.body.classList.contains("dark-mode");
                    localStorage.setItem("darkMode", isDark ? "enabled" : "disabled");

                    applyDarkMode();
                });
            }
        });
        document.addEventListener('livewire:navigated', function() {
            applyDarkMode();
        });
    </script>
    @livewireScripts
    @stack('js')
    @yield('js')
    <script>
        Livewire.on('modalOpened', () => {
            document.body.classList.add('modal-open');
            document.body.style.overflow = 'hidden';
        });

        Livewire.on('modalClosed', () => {
            document.body.classList.remove('modal-open');
            document.body.style.overflow = '';
        });
    </script>

</body>

</html>
