<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <link rel="stylesheet" href="app.css">
    <!-- <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">  -->
    <!-- This code uses the asset helper function to generate the URL for the app.css file located in the resources/css directory. This way, 
    you can include the CSS file directly without needing to compile and publish it to the public directory.
    Make sure you have the app.css file in the correct location (resources/css/app.css) for this code to work correctly. -->
    <title>Register</title>
</head>
<body>
    <main>
    <?php if($errors->any()): ?>
    <!-- The $errors variable is available by default in Laravel, and the any() method checks if there are any error messages stored in it -->
    <div class="alert alert-danger">  
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- This is a foreach loop that iterates over each error message stored in the $errors variable. The all() method retrieves all the error messages as an array. -->
            <?php echo e($error); ?><br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
       <?php endif; ?>
       <section class="photo-section">
    <div class="blurry-background"></div>
     <form class="regForm" action="<?php echo e(route('register')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <h1>Sign Up</h1>
            <div> 
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="<?php echo e(old('username')); ?>">
                <!-- In Laravel, when a form is submitted and validation fails, the form is usually
                 displayed back to the user with the previously entered values.
                  The old() function is used to retrieve the old input values from the previous request. -->
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
    <label for="age">Age:</label>
    <input type="number" name="age" id="age" value="<?php echo e(old('age')); ?>">
</div>

          
            <button type="submit">Register</button>
            <div>
        <p>Have an account? <a href="<?php echo e(route('login')); ?>">Login</a></p>
    </div>
        </form>
    
    </main>
</body>
</html><?php /**PATH C:\Users\user\PHP-Project\resources\views/register.blade.php ENDPATH**/ ?>