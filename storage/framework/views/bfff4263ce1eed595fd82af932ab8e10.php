<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <link rel="stylesheet" href="app.css">
    <title>Login</title>
</head>
<body>
    <main>
        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($error); ?><br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
        <section class="photo-section">
    <div class="blurry-background"></div>
        <form class="regForm" action="<?php echo e(route('login')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <h1 class="welcome">Welcome</h1>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <button type="submit">Login</button>
        </form>
    </main>
</body>
</html>
<?php /**PATH C:\Users\user\PHP-Project\resources\views/login.blade.php ENDPATH**/ ?>