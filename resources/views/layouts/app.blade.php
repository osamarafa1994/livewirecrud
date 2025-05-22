<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Livewire styles -->
    @livewireStyles

    <!-- Bootstrap CSS (use CDN or compiled version) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <!-- Add a navigation bar or other common elements here if needed -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">My App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" wire:navigate aria-current="page" href="{{ route('users.index') }}">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" wire:navigate aria-current="page" href="{{ route('blogs.index') }}">Blogs</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <div class="mt-4">
            {{ $slot }}
        </div>
    </div>

    <!-- Livewire scripts -->
    @livewireScripts
    <script>
        Livewire.on('navigate-to', url => {
            console.log(url);
            Livewire.navigate(url)
            // window.Livewire.navigate(url); // يعمل فقط مع wire:navigate (SPA)
        });
    </script>
    <!-- Bootstrap JS (use CDN or compiled version) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
