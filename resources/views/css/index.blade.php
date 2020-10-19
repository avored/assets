
@foreach ($styles as $style)
    <link href="{{ route('admin.styles', $style->key()) }}" rel="stylesheet">
@endforeach
