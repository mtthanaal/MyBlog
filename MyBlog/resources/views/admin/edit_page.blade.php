<!DOCTYPE html>
<html>
  <head>
    <base href="/public">
    @include('admin.css')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <style type="text/css">
      body {
        background: white !important;
      }

      .post_title {
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        padding: 30px;
        color: white;
      }

      .div_center {
        text-align: center;
        padding: 30px;
      }

      label {
        display: inline-block;
        width: 200px;
      }

      .ck-editor__editable_inline {
        height: 400px;
      }

      .editor {
        margin: auto;
        width: 80%;
        max-width: 800px;
        border: 1px solid #e2e8f0;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background: #ffffff;
      }

      .title, .description {
        width: 100%;
        border: 1px solid #e2e8f0;
        border-radius: 4px;
        padding: 10px;
        margin-bottom: 20px;
      }

      .description {
        height: 200px;
      }

      .file-input {
        margin-bottom: 20px;
        text-align: center;
      }

      .file-input input[type="file"] {
        border: 1px solid #e2e8f0;
        border-radius: 4px;
        padding: 10px;
        background: #f7fafc;
      }

      .buttons {
        display: flex;
        justify-content: center;
        margin-top: 20px;
      }

      .btn {
        padding: 10px 20px;
        font-weight: 600;
        cursor: pointer;
        border-radius: 4px;
      }

      .btn-primary {
        border: 1px solid #4c51bf;
        color: #e2e8f0;
        background: #4c51bf;
      }

      .btn-secondary {
        border: 1px solid #e2e8f0;
        color: #4a5568;
        background: #ffffff;
      }
    </style>
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

        <h1 class="post_title">Update Post</h1>

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

      <script>
        ClassicEditor
          .create(document.querySelector('#editor'))
          .catch(error => {
            console.error(error);
          });
      </script>
    </div>
  </body>
</html>
