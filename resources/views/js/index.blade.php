@foreach ($scripts as $key => $script)
    <script src="{{ route('admin.script', $key) }}"></script>
@endforeach
