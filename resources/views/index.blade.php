@extends('layout')

@section('content')
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <h2>Territories</h2>
    <p>Here are the list of territories:</p>
    <ul id="myUL">
        @foreach($territories as $territory)
            <li>
                <span class="caret">{{ $territory['name'] }}</span>
                <ul class="nested">
                    @foreach ($territory['children'] as $child)
                        <li>
                            @if (array_key_exists('children', $child))
                                <span class="caret">{{ $child['name'] }}</span>
                                <ul class="nested">
                                    @forelse($child['children'] as $child)
                                        <li>{{ $child['name'] }}</li>
                                    @empty
                                    @endforelse
                                </ul>
                            @else
                                {{ $child['name'] }}
                            @endif
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@endsection
