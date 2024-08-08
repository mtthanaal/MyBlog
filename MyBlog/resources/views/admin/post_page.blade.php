<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <style type="text/css">

        .post_title
        {
          font-size: 30px;
          font-weight: bold;
          text-align: center;
          padding: 30px;
          color: white;

        }
        .div_center
        {
          text-align: center;
          padding: 30px;
        }
        label
        {
          display: inline-block;
          width: 200px;
        }
        .ck-editor__editable_inline
        {
          height: 400px;
          
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
    <div class="alert alert-success" >
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

      {{session()->get('message')}}

    </div>


   
    
    @endif

        <h1 class="post_title">Add Post</h1>

        <div>

          <form action="{{url('add_post')}}" method="POST" enctype="multipart/form-data">

          @csrf

          <div class="div_center">
              <label>Post Title</label>
              <input type="text" name="title">
          </div>

          <div class="div_center">
              <label>Post Description</label>
              <textarea id="editor" name="description"></textarea>
          </div>

          <div class="div_center">
              <label>Add Image</label>
              <input type="file" name="image">
          </div>
    
          <div class="div_center">
              
              <input type="submit" class="btn btn-primary">
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
  </body>
</html>