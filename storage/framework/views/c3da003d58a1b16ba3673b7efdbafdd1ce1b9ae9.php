

<?php $__env->startSection('container'); ?>

<h1 class="mb-5">Comic Category : <?php echo e($category); ?></h1>
<?php $__currentLoopData = $comics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <article class="mb-5 border-bottom pb-4">
        <h2><a class="text-decoration-none" href="/posts/<?php echo e($comic->slug); ?>"><?php echo e($comic->title); ?></a></h2>
        <p><?php echo e($comic->excerpt); ?></p>
    </article>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\Mata Kuliah\Semester 5\Implementasi dan Evaluasi Sistem Informasi\ComicAddict\resources\views/category.blade.php ENDPATH**/ ?>