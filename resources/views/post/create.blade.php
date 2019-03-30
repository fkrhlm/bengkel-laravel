<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data"> 
    @csrf
    Title:
    <input type="text" name="title">
    <br>

    Content:
    <textarea name="content" id="" cols="30" rows="10"></textarea>
    <br>
    
    Image:
    <input type="file" name="image">
    <br>
    <button type="submit">Save</button>
</form>
