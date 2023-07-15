<h1>
    @if (!isset($topic)) 
        New Topic
    @else
        Edit Topic {{ $topic->id }}

    @endif
</h1>
<x-alert/>
@if (!isset($topic))
    <form action="{{ route('forum.store') }}" method="POST">
@else
    <form action="{{ route('forum.update', $topic->id) }}" method="POST">
    @method('PUT')   
@endif

@csrf

<input name="subject" id="" type="text" placeholder="Subject" value="{{ $topic->subject ?? '' }}"> 

<textarea name="body" id="" cols="30" rows="10" placeholder="Description">{{ $topic->body ?? '' }}</textarea>
<button type="submit"> Send </button>

</form>