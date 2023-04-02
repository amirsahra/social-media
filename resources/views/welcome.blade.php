<form method="post" action="{{route('uploadImage')}}" enctype="multipart/form-data">
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <div>
        <label for="file">Choose file to upload</label>
        <input type="file" id="file" name="imageInput" multiple/>
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>

<img src="{{asset("storage/images/posts/image (1).jpg")}}" alt="image" >

<br><hr>
<video width="320" height="240" controls>
    <source src="{{URL::asset("storage/videos/posts/video1.mp4")}}" type="video/mp4">
    Your browser does not support the video tag.
</video>
