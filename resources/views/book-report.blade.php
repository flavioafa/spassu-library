<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="card text-center mb-3">
        <div class="card-header text-bg-secondary">
            {{$title}} - {{$edition}}ª Edição
        </div>
        <div class="card-body">
            <h5 class="card-title">R$ {{ formatCurrencyToBr($price) }}</h5>
            <ul class="list-group">
                <li class="list-group-item active" aria-current="true">Autores</li>
                @forelse($authors as $author)
                    <li class="list-group-item text-start">{{ $author }}</li>
                @empty
                    <li class="list-group-item text-start">Nenhum Autor</li>
                @endforelse
            </ul>
            <ul class="list-group">
                <li class="list-group-item active" aria-current="true">Assuntos</li>
                @forelse($subjects as $subject)
                    <li class="list-group-item text-start">{{ $subject }}</li>
                @empty
                    <li class="list-group-item text-start">Nenhum Assunto</li>
                @endforelse
            </ul>
        </div>
        <div class="card-footer text-body-secondary text-end">
            {{$publisher}} ({{ $publication_year }})
        </div>
    </div>
</div>
</body>
</html>
