<div class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital">Blog Posts</h1>
        <p class="services_text">Visit Sri Lanka Here</p>
        <div class="services_section_2">
            <div class="row">
                @foreach ($post as $post)
                <div class="col-md-4" style="padding: 30px;">
                    <div class="image-container" style="position: relative; height: 200px; width: 350px; margin-bottom: 20px; overflow: hidden;">
                        <img src="/postimage/{{$post->image}}" class="services_img" style="height: 100%; width: 100%; object-fit: cover;">
                        <h4 class="post-title" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.7); background-color: rgba(0, 0, 0, 0.5); padding: 10px 20px; border-radius: 5px; transition: opacity 0.3s ease;">
                            {{$post->title}}
                        </h4>
                    </div>
                    <p class="btn_main">Post by <b>{{$post->name}}</b></p>
                    <div class="btn_main"><a href="{{url('post_details', $post->id)}}">Read More</a></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    .image-container:hover .post-title {
        opacity: 0;
    }
</style>
