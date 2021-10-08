@extends('layouts.admin')

@section('content')
<translations-page
    :language="{{json_encode($language)}}"
>
</translations-page>
@endsection
