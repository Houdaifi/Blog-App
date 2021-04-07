<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Document</title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

</head>
<body class="bg-gray-100">
    <nav class="shadow-md flex justify-between p-2 bg-white">
        <ul class="flex">
            <li class="p-3"><a href="<?php echo e(route('home')); ?>">Home</a> </li>
            <li class="p-3"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a> </li>
            <li class="p-3"><a href="<?php echo e(route('posts')); ?>">Posts</a> </li>
        </ul>
        <ul class="flex">
            <?php if(auth()->guard()->check()): ?>
                <li class="p-3 font-semibold"> <a href="<?php echo e(route('dashboard')); ?>"> <?php echo e(auth()->user()->username); ?> </a></li>
                <li class="p-3">
                    <form action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="bg-blue-500 rounded-md text-white font-semibold w-24 h-8">Logout</button>
                    </form>
                </li>
            <?php endif; ?>
            <?php if(auth()->guard()->guest()): ?>
                <li class="p-3"><a href="<?php echo e(route('login')); ?>">Login</a> </li>
                <li class="p-3"><a href="<?php echo e(route('register')); ?>">Register</a> </li>
            <?php endif; ?>
        </ul>
    </nav>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <?php echo $__env->yieldContent('content'); ?>
    
</body>
</html><?php /**PATH C:\laragon\www\PostyAPP\resources\views/layouts/app.blade.php ENDPATH**/ ?>