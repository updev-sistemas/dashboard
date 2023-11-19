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
                <h4 class="mb-0 font-weight-bold">Empresas</h4>
            </div>
        </a>
        <ul>
            <li>
                <a href="{{ route('empresas.index') }}">Lista de empresas atendidas</a>
            </li>
            <li>
                <a href="{{ route('empresas.create') }}">Nova Empresa</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="d-flex align-items-start">
            <div>
                <figure  class="avatar mr-3">
                    <img src="{{ url('assets/media/image/user/descontos.png') }}">
                </figure>
            </div>
            <div>
                <h4 class="mb-0 font-weight-bold">Finanças</h4>
            </div>
        </a>
        <ul>
            <li>
                <a href="#">Contas á pagar</a>
            </li>
            <li>
                <a href="#">Contas á receber</a>
            </li>
            <li>
                <a href="#">Caixas Abertos</a>
            </li>
            <li>
                <a href="#">Minhas vendas</a>
            </li>
            <li>
                <a href="#">Vendedores</a>
            </li>
        </ul>
    </li>
</ul>
