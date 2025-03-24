<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('events.create') }}" method="post">
                @csrf
                <input type="text" name="title" placeholder="Title">
                <input type="text" name="description" placeholder="Description">
                <input type="date" name="start_date" placeholder="Start Date">
                <input type="date" name="end_date" placeholder="End Date">
                <input type="submit" value="Create">
            </form>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Events: {{ $user }}</h1>
                    @foreach ($events as $event)
                        <h3>{{ $event->title }}</h3>
                        <p>{{ $event->description }}</p>
                        <p>{{ $event->start_date }}</p>
                        <p>{{ $event->end_date }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
