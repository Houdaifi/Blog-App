

<?php $__env->startSection('content'); ?>
   <div class="flex justify-center pt-6">
      <div class="bg-white w-4/12 p-6 rounded-lg">
        <h1 class="text-yellow-600 text-lg text-center">Register</h1>
        <form action="<?php echo e(route('register')); ?>" method="POST" class="pt-6">
            <?php echo csrf_field(); ?>

            <?php if($errors->any()): ?>
                <div class="mb-2">
                    <ul class="text-red-500 text-sm">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>. <?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <input type="text" name="name" placeholder="Your name" class="bg-gray-200 w-full p-3 border mb-4 rounded-lg focus:outline-none focus:border-yellow-600 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name')); ?>"><br>

            <input type="email" name="email" placeholder="Email" class="bg-gray-200 w-full p-3 border mb-4 rounded-lg focus:outline-none focus:border-yellow-600 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email')); ?>"><br>

            <input type="password" name="password" placeholder="Password" class="bg-gray-200 w-full p-3 border mb-4 rounded-lg focus:outline-none focus:border-yellow-600 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><br>

            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="bg-gray-200 w-full p-3 border mb-4 rounded-lg focus:outline-none focus:border-yellow-600 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><br>
            
            <input type="text" name="username" placeholder="Username" class="bg-gray-200 w-full p-3 border mb-4 rounded-lg focus:outline-none focus:border-yellow-600 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('username')); ?>">

            <button class="w-full p-3 bg-yellow-600 text-white rounded-lg">Submit</button>
        </form>
      </div>
    
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PostyAPP\resources\views/auth/register.blade.php ENDPATH**/ ?>