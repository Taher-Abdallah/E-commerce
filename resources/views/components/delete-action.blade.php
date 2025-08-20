
                                                <form action="{{ $action }}" method="post"
                                                    class="d-inline" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="item text-danger delete" onclick="return confirm('Are you sure you want to delete this brand?');">
                                                         <i class="icon-trash-2"></i></button>
                                                </form>