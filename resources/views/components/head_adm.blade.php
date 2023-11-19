<a  class="list-group-item p-l-r-0">{{ auth()->user()->enterprise->cnpj ?? "CNPJ" }}</a>
<a  class="list-group-item p-l-r-0 d-flex">{{ auth()->user()->enterprise->razao_social ?? "RAZAO SOCIAL" }}</a>
<a  class="list-group-item p-l-r-0 d-flex">{{ auth()->user()->enterprise->email ?? "EMAIL" }}</a>
