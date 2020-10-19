@foreach ($scripts as $script)
    <script src="{{ route('admin.script', $script->key()) }}"></script>
@endforeach
