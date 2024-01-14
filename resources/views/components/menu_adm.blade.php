<ul>
    <li>
        <a class="d-flex align-items-start">
            <div>
                <figure  class="avatar mr-3">
                    <img src="{{ url('assets/media/image/user/women_avatar1.jpg') }}">
                </figure>
            </div>
            <div>
                <h4 class="mb-0 font-weight-bold">Página Inicial</h4>
            </div>
        </a>
        <ul>
            <li>
                <a class="active" href="{{ route('env_adm') }}">Dashboard</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="d-flex align-items-start">
            <div>
                <figure  class="avatar mr-3">
                    <img src="{{ url('assets/media/image/user/fornecedor.png') }}">
                </figure>
            </div>
            <div>
                <h4 class="mb-0 font-weight-bold">Clientes</h4>
            </div>
        </a>
        <ul>
            <li>
                <a href="{{ route('clientes.index') }}">Lista de Clientes</a>
            </li>
            <li>
                <a href="{{ route('clientes.create') }}">Novo Cliente</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="d-flex align-items-start">
            <div>
                <figure  class="avatar mr-3">
                    <img src="{{ url('assets/media/image/user/fornecedor.png') }}">
                </figure>
            </div>
            <div>
                <h4 class="mb-0 font-weight-bold">Lojas</h4>
            </div>
        </a>
        <ul>
            <li>
                <a href="{{ route('empresas.index') }}">Lista de Lojas</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="d-flex align-items-start">
            <div>
                <figure  class="avatar mr-3">
                    <img src="{{ url('assets/media/image/user/usuarios.png') }}">
                </figure>
            </div>
            <div>
                <h4 class="mb-0 font-weight-bold">Perfil</h4>
            </div>
        </a>
        <ul>
            <li>
                <a href="{{ route('profile_view') }}">Alterar Informações</a>
            </li>
            <li>
                <a href="{{ route('password_view') }}">Alterar Senha</a>
            </li>
        </ul>
    </li>
</ul>
