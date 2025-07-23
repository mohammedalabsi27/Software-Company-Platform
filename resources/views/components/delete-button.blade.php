<form action="{{ $href }}" method="post" id="deleteForm-{{ $record->id }}" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $record->id }})">
      <i class="fe fe-trash-2 fa-2x"></i>
    </button>
  </form>