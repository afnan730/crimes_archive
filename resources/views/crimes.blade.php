<div>
    {{ $category }}

</div>
<div>
    {{-- @php
        $translation = json_decode('"' . $category->crimes->translation . '"');

    @endphp --}}
    {{-- {{ $category->crimes[0]->translation }} --}}
    @foreach ($category->crimes as $crime)
        <p>{{ $crime->image }}</p>
        <p>{{ $crime->text }}</p>
        <p>{{ $crime->translation }}</p>
    @endforeach

</div>
