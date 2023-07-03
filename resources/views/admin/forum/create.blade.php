<h1>
    @if (!isset($topic)) 
        New Topic
    @else
        Edit Topic {{ $topic->id }}

    @endif
</h1>

@if ($errors->any)
@foreach ($errors->all() as $error)
    {{ $error}} <br>
@endforeach
    
@endif

@if (!isset($topic))
    <form action="{{ route('forum.store') }}" method="POST">
@else
    <form action="{{ route('forum.update', $topic->id) }}" method="POST">
    @method('PUT')   
@endif

@csrf

<input name="subject" type="text" placeholder="Subject" value="{{ $topic->subject ?? '' }}"> 

<textarea name="body" id="" cols="30" rows="10" placeholder="Description">{{ $topic->body ?? '' }}</textarea>
<button type="submit"> Send </button>

</form>