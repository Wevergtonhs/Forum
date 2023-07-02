<h1>INDEX FORUM</h1>


<a href="{{ route('forum.create') }}">New Topic </a>

<table>
    <thead>
        <th>Subject</th>
        <th>Status</th>
        <th>Description</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($forums as $forum)
            <tr>
                <td>{{ $forum->subject }}</td>
                <td>{{ $forum->status }}</td>
                <td>{{ $forum->body }}</td>
                <td>
                    <a href="{{ route('forum.show', $forum->id )}}">see more</a>
                    <a href="{{ route('forum.edit', $forum->id )}}">edit</a>

                    <form action="{{ route('forum.destroy', $forum->id )}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">delete</button>
                    </form>
                    
                </td>
            </tr>
        @endforeach

    </tbody>
</table>