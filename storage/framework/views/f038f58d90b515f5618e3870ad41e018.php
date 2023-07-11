<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Page</title>
    
</head>
<body>
    <div class="container">
        <h1>Video Page</h1>

        <?php if(isset($videoData['results']) && count($videoData['results']) > 0): ?>
            <h2>Videos</h2>
            <?php $__currentLoopData = $videoData['results']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($video['site'] === 'YouTube'): ?>
                    <div class="video-container">
                        <h3><?php echo e($video['name']); ?></h3>
                        <iframe src="https://www.youtube.com/embed/<?php echo e($video['key']); ?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p>No videos found.</p>
        <?php endif; ?>
    </div>
</body>
<style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        h2 {
            margin-top: 30px;
        }

        p {
            margin-top: 10px;
        }

        div.video-container {
            margin-bottom: 30px;
        }

        h3 {
            margin-bottom: 10px;
        }

        iframe {
            width: 100%;
            height: 315px;
            border: none;
        }
    </style>
</html>
<?php /**PATH C:\Users\user\PHP-Project\resources\views/video-page.blade.php ENDPATH**/ ?>