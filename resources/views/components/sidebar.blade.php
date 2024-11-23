<nav class="sidebar p-3 login" style="background-color: #1B1B1B">
    <div class="text-center mb-4">
        <img src="{{ asset('assets/logo.png') }}" alt="Logo do Sistema" class="img-fluid" style="max-width: 800px;">
    </div>
    
    <ul class="nav flex-column py-5 ">
        <li class="nav-item">
            <a class="nav-link text-light {{ request()->routeIs('budget.index') ? 'active' : '' }}" href="{{ route('budget.index') }}">Orçamentos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light {{ request()->routeIs('client.index') ? 'active' : '' }}" href="{{ route('client.index') }}">Clientes</a>
        </li>        
    </ul>
</nav>
