<!DOCTYPE html>
<html>
  <head>
    <base href="/public">
    @include('admin.css')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>


    <!-- CSS for the page -->
    <link rel="stylesheet" href="/css/edit_page.css">

  </head>

  <body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->

      <div class="page-content">
        @if (session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
          </div>
        @endif

        <h1 class="post_title">Edit Post</h1>

        <div class="editor">
          <form action="{{ url('update_post', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input 
              class="title" 
              type="text" 
              name="title" 
              value="{{ $post->title }}" 
              placeholder="Title"
            >

            <textarea 
              class="description" 
              id="editor" 
              name="description" 
              placeholder="Describe everything about this post here"
            >{{ $post->description }}</textarea>

            <div class="file-input">
              <label>Old Image</label>
              <div>
                <img src="/postimage/{{ $post->image }}" width="100" height="100" alt="Old Image">
              </div>

              <label>Update Old Image</label>
              <input type="file" name="image">
            </div>

            <div class="buttons">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>

      @include('admin.footer')

      <!-- Java Scripts -->
    <script src="\js\edit_page.js"></script>
    </div>
  </body>
</html>
