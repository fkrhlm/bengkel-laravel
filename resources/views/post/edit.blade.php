<form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
    @csrf

    Title:
    <input type="text" name="title" value="{{ $post->title }}">
    <br>

    Content:
    <textarea name="content" id="" cols="30" rows="10">{{ $post->content }}</textarea>
    <br>

    Image:
    <img width="100" src="{{ asset('storage/'.$post->image) }}" alt="">
    <input type="file" name="image" id="">

    <button type="submit">Save</button>
<button type="submit" formaction="{{ route('posts.delete', $post) }}">Delete</button>
</form>