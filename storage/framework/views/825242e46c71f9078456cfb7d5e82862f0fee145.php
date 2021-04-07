

<?php $__env->startSection('content'); ?>
   <div class="flex justify-center py-6">
      <div class="bg-white w-6/12 p-6 rounded-lg">Create a post:
         <form class="mb-4" action="<?php echo e(route('posts')); ?>" method="POST">
         <?php echo csrf_field(); ?>

            <textarea class="w-full bg-gray-100 border-2 p-2 rounded-lg my-2 focus:outline-none focus:border-yellow-500 <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="body" id="" cols="30" rows="5" placeholder="Post anything!"></textarea><br>

            <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
               <p class="text-red-500 text-sm pb-2"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <button class="w-24 h-8 bg-yellow-600 text-white rounded-lg font-semibold">Submit</button>

         </form>

         <?php if($posts->count()): ?>

            <h2 class="font-semibold mb-3 text-lg">Latest Posts:</h2>
            <hr class="text-gray-400 w-full pb-4">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

               <div class="flex justify-between parentDiv">

                  <div class="mb-4">
                     <a class="text-yellow-600 pr-2 cursor-pointer UserLink" data="<?php echo e($post->user->id); ?>"><?php echo e($post->user->name); ?></a><span class="text-gray-500 text-xs"><?php echo e($post->created_at->diffForHumans()); ?></span>
                     <p id="body"><?php echo e($post->body); ?></p>
                     <textarea class="bg-gray-100 rounded-lg p-2 w-full focus:ring focus:ring-yellow-500 resize-x hidden newPost" name="newPost" data="<?php echo e($post->id); ?>"  cols="60" rows="3"></textarea>

                     <!-- Like and Dislike Forms -->
                     <div class="flex space-x-2 mt-1">
                        <?php if(!$post->isLiked()): ?>

                           <form action="<?php echo e(route('posts.like', $post)); ?>" method="POST">
                              <?php echo csrf_field(); ?>
                              <button type="submit"><i class="fas fa-thumbs-up mr-3 text-blue-500 cursor-pointer"></i></button>
                           </form>

                        <?php else: ?>
                        
                           <form action="<?php echo e(route('posts.dislike', $post)); ?>" method="POST">
                              <?php echo csrf_field(); ?>
                              <button type="submit"><i class="fas fa-thumbs-down text-red-500 cursor-pointer"></i></button>
                           </form>

                        <?php endif; ?>

                        <span class="bg-gray-400 text-xs rounded-lg text-white p-1"><?php echo e($post->LikedBy->count()); ?> <?php echo e(Str::plural('Reactions', $post->LikedBy->count())); ?></span>

                        <button class="bg-purple-400 text-xs rounded-lg text-white p-1 displayComment"><?php echo e($post->comments->count()); ?> <?php echo e(Str::plural('Comments', $post->LikedBy->count())); ?></button>

                        <p class="text-xs pt-1 text-gray-600">
                           <?php if($post->LikedBy->count()): ?>
                              By
                              <?php $__currentLoopData = $post->LikedBy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $likedBy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php echo e($likedBy->name); ?><?php echo e($loop->last ? '' : ','); ?>

                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
                        </p>

                     </div>

                     <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="AddedComment">
                           <div class="pl-4 py-1 mt-2 bg-gray-100 rounded-lg shadow-lg">
                              <h2 class="text-yellow-500 font-semibold text-base"><?php echo e($comment->user->name); ?></h2>   
                              <p class="text-sm"><?php echo e($comment->comment); ?></p>
                           </div>
                        </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                     <textarea name="" rows="1" class="bg-gray-100 rounded-lg p-2 mt-2 w-full resize-y focus:ring focus:ring-purple-400 hidden newComment <?php $__errorArgs = [ 'comment' ];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" data="<?php echo e($post->id); ?>"></textarea>
                  </div>


                  <!-- The 3 actions buttons : Add Comment, Edit Post, Delete Post -->
                  <div class="flex">

                     <div>
                        <button class="text-purple-500 rounded-lg p-1 font-semibold shadow-lg commentPost focus:outline-none"><i class="far fa-comments"></i></button>
                     </div>
                     <?php if($post->user_id == auth()->user()->id ): ?>
                        <div>
                           <button class="text-yellow-500 rounded-lg p-1 font-semibold shadow-lg editPost focus:outline-none"><i class="far fa-edit"></i></button>
                        </div>
                        
                        <div>
                           <form action="<?php echo e(url('posts',$post)); ?>" method="POST">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field('delete'); ?>
                              <button class="text-red-500 rounded-lg p-1 font-semibold shadow-lg focus:outline-none"><i class="fas fa-trash"></i></button>
                           </form>
                        </div>
                     <?php endif; ?>
                  </div>

               </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php echo e($posts->links()); ?>

            
         <?php else: ?>
            <p class="text-red-500"> No posts yet</p>
         <?php endif; ?>
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

      const currentUser = '<?php echo e(auth()->user()->name); ?>';

      $.ajaxSetup({
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
      });

      $(".editPost").click(function(){
         const thisPost = $(this).parent().parent().parent();
         thisPost.find("#body").toggle();
         thisPost.find(".newPost").text(thisPost.find("#body").text()).toggle();
         $(this).parent().find(".savePost").show();
      });

      $(".newPost").keyup(function(e){
         const thisPost = $(this);
         const newPost = $.trim(thisPost.val());
         const postId = thisPost.attr('data');
         if(e.key == "Enter"){
            $.ajax({
               url:"<?php echo e(url('posts/edit')); ?>",
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
            url:"<?php echo e(url('posts/userPosts')); ?>",
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

      $(".commentPost").click(function(){
         $(this).parent().parent().parent().find('.newComment').toggle();
      });

      $(".newComment").keyup(function(e){
         const commentArea = $(this);
         var comment = $.trim(commentArea.val());
         var postId = commentArea.attr('data');
         if(e.key == "Enter"){
            $.ajax({
               url: "<?php echo e(url('posts/comment')); ?>",
               method:'POST',
               data:{comment:comment, post_id:postId},
               success:function(response){
                  $('.newComment').hide();
                  commentArea.parent().find($('.AddedComment')).append('<div class="pl-4 py-1 mt-2 bg-gray-100 rounded-lg shadow-lg"><h2 class="text-yellow-500 font-semibold text-base">'+currentUser+'</h2><p class="text-sm">'+comment+'</p></div>');
               }
            });
         }
      });

      $(".displayComment").click(function(){
         $(this).parent().parent().parent().find('.CommentsField').toggle();
      });
      
   });
  
  </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PostyAPP\resources\views/posts/index.blade.php ENDPATH**/ ?>