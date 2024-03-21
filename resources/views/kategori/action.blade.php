<a href="{{ url('/kategori/' . $id . '/edit') }}" class="btn btn-primary">
    Edit
  </a>
  <button id="delete" class="btn btn-danger" data-confirm-delete="true"
    onclick="
      event.preventDefault();
      if (confirm('Yakin Data Dihapus?')) {
          document.getElementById('destroy{{ $id }}').submit()
      }
      ">
    Hapus
    <form id="destroy{{ $id }}" class="d-none" action="{{ url('/kategori/' . $id) }}" method="POST">
      @csrf
      @method('delete')
    </form>
  </button>