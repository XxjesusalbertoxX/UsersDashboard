    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark"
         id="sidebar"
         style="width: 280px; min-height: 100vh; transition: margin-left 0.3s; position: fixed; z-index: 5; margin-left: 0;">
         <div>

             <button id="sidebarToggleBtn"
             onclick="toggleSidebar()"
             style="position: absolute; top: 10px; right: 16px; z-index: 10; transition: left 0.3s, right 0.3s;"
             class="btn btn-primary" >
             ☰
            </button>
            <div>
                <a href="{{route('dashboard')}}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                    <span class="fs-4">Tourneyhub</span>
                </a>
            </div>
        </div>
            <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link" aria-current="page">
                    <svg class="bi me-2" width="16" height="16"></use></svg>
                    {{ __('Inicio') }}
                </a>
            </li>
            
            <li>
                <a href="#" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                    {{ __('Torneos') }}
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                    {{ __('Equipos') }}
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                    {{ __('Jugadores') }}
                </a>
            </li>
            <li>
                <a href="{{route('users')}}" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                    {{ __('Usuarios') }}
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
               id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>mdo</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
    </div>
    
    <script>

    // JavaScript to handle  toggle
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function () {
            document.querySelectorAll('.nav-link').forEach(nav => nav.classList.remove('active'));
            this.classList.add('active');
        });
    });

    let visible = true;
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const btn = document.getElementById('sidebarToggleBtn');
        if (visible) {
            sidebar.style.marginLeft = '-280px'; 
            btn.style.position = 'fixed';
            btn.style.left = '10px';
            btn.style.right = '';
            btn.style.top = '10px';
            btn.style.zIndex = 20;
        } else {
            sidebar.style.marginLeft = '0'; 
            btn.style.position = 'absolute';
            btn.style.left = '';
            btn.style.right = '16px';
            btn.style.top = '10px';
            btn.style.zIndex = 10;
        }
        visible = !visible;
    }
    </script>

