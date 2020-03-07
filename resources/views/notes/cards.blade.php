@foreach ($notes as $note)
<div class="col">
    <div class="card border-warning mb-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $note->title }}</h5>
            <p class="card-text">{{ $note->description }}</p>
            @if($note->has_duedate===1)
            <p class="card-text">Vence: {{ $note->duedate }}</p>

            @endif
            <a href="/notebooks/{{ $note->notebook->id }}/notes/{{ $note->id }}/edit" class="btn btn-warning"><i class="fas fa-pencil-alt" ></i>&nbsp;Editar</a>
            <button onclick="borrar({{ $note->id }})" class="btn btn-danger" data-id="{{ $note->id }}"><i class="fas fa-ghost" ></i>&nbsp;Borrar</button>
        </div>
    </div>
</div>
@endforeach
