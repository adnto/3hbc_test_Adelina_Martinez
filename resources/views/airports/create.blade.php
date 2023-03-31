@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Airport</h1>
        <airports-form></airports-form>
    </div>
@endsection

@push('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@next"></script>
@endpush
