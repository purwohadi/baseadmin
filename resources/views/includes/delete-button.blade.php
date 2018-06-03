<a href="#" class="mx-3 text-danger"  onclick="confirmDelete({{$id}})" @if(isset($style))style="{{$style}}"@endif>
    Delete<i class="fa fa-trash"></i>
</a>

<form action="{{$route}}" method="POST" id="delete-form-{{ $id }}">
    @method('DELETE')
    @csrf
    <input type="hidden" value="{{ $id }}" name="id">
</form>
