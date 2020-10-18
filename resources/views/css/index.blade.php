{{-- <link href="/admin/css/app.css" rel="stylesheet"> --}}
@foreach ($styles as $key => $style)
<link href="{{ route('admin.styles', $key) }}" rel="stylesheet">
    {{-- <script src="{{ route('admin.styles', $key) }}"></script> --}}
@endforeach
