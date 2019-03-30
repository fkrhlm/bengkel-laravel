<ul>
    @foreach ($posts as $post)
        <li>
            <a href="{{ route('posts.edit', $post) }}"> 
                {{ $post->title }} <br> 
            </a>
            {{ $post->content }} <br>
            <img width="100" src="{{ asset('storage/'.$post->image) }}" alt="">
        </li>
    @endforeach
</ul>

<a href="{{ route('posts.create') }}">Add post</a> 
