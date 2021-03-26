@extends('layouts.app')

@section('content')
   <div class="flex justify-center pt-6">
      <div class="bg-white w-6/12 p-6 rounded-lg">Create a post:
         <form class="mb-4" action="{{route('posts')}}" method="POST">
         @csrf

            <textarea class="w-full bg-gray-100 border-2 p-2 rounded-lg my-2 focus:outline-none focus:border-yellow-500 @error('body') border-red-500 @enderror" name="body" id="" cols="30" rows="5" placeholder="Post anything!"></textarea><br>

            @error('body')
               <p class="text-red-500 text-sm pb-2">{{$message}}</p>
            @enderror

            <button class="w-24 h-8 bg-yellow-600 text-white rounded-lg font-semibold">Submit</button>

         </form>

         @if ($posts->count())

            <h2 class="font-semibold mb-3 text-lg">Latest Posts:</h2>
            <hr class="text-gray-400 w-full pb-4">
            @foreach ($posts as $post)

               <div class="flex justify-between parentDiv">

                  <div class="mb-4">
                     <a class="text-yellow-600 pr-2 cursor-pointer UserLink" data="{{ $post->user->id }}">{{ $post->user->name }}</a><span class="text-gray-500 text-xs">{{ $post->created_at->diffForHumans() }}</span>
                     <p id="body">{{ $post->body }}</p>
                     <textarea class="bg-gray-100 rounded-lg p-2 w-full focus:ring focus:ring-yellow-500 resize-x hidden newPost" name="newPost" data="{{ $post->id }}"  cols="60" rows="3"></textarea>

                     <!-- Like and Dislike Forms -->
                     <div class="flex space-x-2 mt-1">
                        @if (!$post->isLiked())

                           <form action="{{ route('posts.like', $post)}}" method="POST">
                              @csrf
                              <button type="submit"><i class="fas fa-thumbs-up mr-3 text-blue-500 cursor-pointer"></i></button>
                           </form>

                        @else
                        
                           <form action="{{ route('posts.dislike', $post)}}" method="POST">
                              @csrf
                              <button type="submit"><i class="fas fa-thumbs-down text-red-500 cursor-pointer"></i></button>
                           </form>

                        @endif

                        <span class="bg-gray-400 text-xs rounded-lg text-white p-1">{{ $post->LikedBy->count() }} {{ Str::plural('Reactions', $post->LikedBy->count()) }}</span>

                        <p class="text-xs pt-1 text-gray-600">
                           @if ($post->LikedBy->count())
                              By
                              @foreach ($post->LikedBy as $likedBy)
                                 {{$likedBy->name}}{{ $loop->last ? '' : ',' }}
                              @endforeach
                           @endif
                        </p>

                     </div>
                     
                  </div>

                  @if ($post->user_id == auth()->user()->id )
                     <div class="flex">

                        <div>
                           <button class="text-yellow-500 rounded-lg p-1 font-semibold shadow-lg editPost focus:outline-none"><i class="far fa-edit"></i></button>
                        </div>
                        
                        <div>
                           <form action="{{ url('posts',$post) }}" method="POST">
                              @csrf
                              @method('delete')
                              <button class="text-red-500 rounded-lg p-1 font-semibold shadow-lg focus:outline-none"><i class="fas fa-trash"></i></button>
                           </form>
                        </div>
                        
                     </div>
                  @endif

               </div>
            @endforeach

            {{$posts->links()}}
            
         @else
            <p class="text-red-500"> No posts yet</p>
         @endif
      </div>

   </div>
  
   <!--My Modal --> 
   <div id="postModal" class="fixed inset-0 hidden">
      <div class="bg-gray-500 opacity-80 absolute inset-0"></div>
      <div class="w-1/2 h-auto my-16 mx-auto rounded bg-yellow-500 relative">
         <div class="w-full h-auto flex justify-between bg-white p-2">
            <div>
               <h2 class="font-semibold text-lg PostOwner">Posts</h2>              
            </div>
            <div>
               <button class="focus:outline-none" id="closePostModal"><i class="far fa-times-circle"></i></button>
            </div>
         </div>
         <div class="w-full h-auto max-h-105 p-2 mt-2 ModalBody overflow-y-scroll"></div>
      </div>
   </div>

  <script>

   $(document).ready(function(){

      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

      $(".editPost").click(function(){
         $(this).parent().parent().parent().find("#body").toggle();
         $(this).parent().parent().parent().find(".newPost").toggle();
         $(this).parent().find(".savePost").show();
      });

      $(".newPost").keyup(function(e){
         const thisPost = $(this);
         const newPost = $.trim(thisPost.val());
         const postId = thisPost.attr('data');
         if(e.key == "Enter"){
            $.ajax({
               url:"{{ url('posts/edit') }}",
               type:"POST",  
               data:{postId:postId, newPost:newPost},
               success:function(data){
                  thisPost.hide();
                  thisPost.parent().find('#body').html(newPost);
                  thisPost.parent().find('#body').show();
               }
            });
         }
      });

      $(".UserLink").click(function(){
         const userID = $(this).attr('data');
         $.ajax({
            url:"{{ url('posts/userPosts') }}",
            data:{userID:userID},
            dataType:'json',
            success:function(data){
               var mydiv = [];
               $.each(data.posts, function(index, value){
                  div = '<div class="bg-black p-3 mb-2 rounded-lg"><p class="text-justify text-white">'+value.body+'</p></div>';
                  mydiv.push(div);
               });
               $(".ModalBody").html(mydiv);
               $(".PostOwner").html(data.name + ' Posts');
               $("#postModal").fadeIn();
            }
         });
      });

      $("#closePostModal").click(function(){
         $("#postModal").fadeOut();
      });

   });
  
  </script>

@endsection