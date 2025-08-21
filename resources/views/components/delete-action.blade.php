<form action="{{ $action }}" method="post" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="item text-danger delete p-0 m-0 border-0 bg-transparent" 
        onclick="return confirm('Are you sure you want to delete this brand?');">
        <i class="icon-trash-2"></i>
    </button>
</form>