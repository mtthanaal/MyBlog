<!DOCTYPE html>
<html>

<head>
  @include('admin.css')

  <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

  <!-- CSS for the page -->
  <link rel="stylesheet" href="\css\post_page.css">

</head>

<body>

  @include('admin.header')

  <div class="d-flex align-items-stretch">

    <!-- Sidebar Navigation -->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end -->

    <div class="page-content">

      @if (session()->has('message'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{ session()->get('message') }}
      </div>
      @endif

      <h1 class="post_title">New Post</h1>

      <div class="editor">
        <form action="{{ url('add_post') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <input class="title" type="text" name="title" placeholder="Type your title..........">

          <textarea class="description" id="editor" name="description"
            placeholder="Describe everything about this post here....................✍️"></textarea>

          <div class="file-input">
            <label>Add Image</label>
            <input type="file" name="image">
          </div>

          <div class="buttons">
            <button type="submit" class="btn post">Post</button>
          </div>
        </form>
      </div>

    </div>

    @include('admin.footer')

    <!-- Java Scripts -->
    <script src="\js\post_page.js"></script>

  </div>
</body>

</html>
