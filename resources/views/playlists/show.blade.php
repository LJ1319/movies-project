@extends('layouts.main')

@section('content')
    <div class="flex justify-center mx-auto px-4 pt-16">
        <div class="w-4/12 bg-gray-800 p-6 rounded-lg">
            <div class="mb-4">
                 <x-playlist :playlist="$playlist"></x-playlist>
            </div>
        </div>
    </div>
@endsection
