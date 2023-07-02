<h1>Details {{ $topic->subject }}</h1>

<ul>
    <li>Subject: {{ $topic->subject }}</li>
    <li>Status: {{ $topic->status }}</li>
    <li>Description: {{ $topic->body }}</li>
</ul>

<form action="{{ route('forum.destroy', $topic->id )}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">delete</button>
</form>