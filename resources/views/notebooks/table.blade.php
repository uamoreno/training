<table class="table table-striped">
        @foreach ($notebooks as $nb)
            <tr >
                <th >{{ $nb->name }}</th>
                <td>{{ $nb->notes->count() }} @if($nb->notes->count()>1) notas @else nota @endif de {{ $nb->max_notes }}</td>
                <td >
                <a href="/notebooks/{{ $nb->id }}/notes" class="btn btn-warning"><i class="fas fa-door-open" ></i></a>
                <a href="/notebooks/{{ $nb->id }}/edit" class="btn btn-warning"><i class="fas fa-pencil-alt" ></i></a>
                <button onclick="borrar({{ $nb->id }})" class="btn btn-danger" data-id="{{ $nb->id }}"><i class="fas fa-ghost" ></i></button>
                </td>
        @endforeach
</table>
