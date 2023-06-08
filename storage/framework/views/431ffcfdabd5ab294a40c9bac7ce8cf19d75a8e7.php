

<?php $__env->startSection('container'); ?>

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
        <h2 class="mb-3 fw-semibold"><?php echo e($comic->title); ?></h2>
            <p>By : <a href="/posts?author=<?php echo e($comic->author->username); ?>" class="text-decoration-none"><?php echo e($comic->author->name); ?></a> in <a class="text-decoration-none" href="/posts?category=<?php echo e($comic->category->slug); ?>"><?php echo e($comic->category->name); ?></a></p>
            

            

            <article class="my-3 fs-8 justify-content-center">
                <?php for($i = 0; $i < $comic->pages; $i++): ?>
                <img class="mb-1" src="https://source.unsplash.com/800x1200/" alt="<?php echo e($comic->category->name); ?>" class="img-fluid">
                <?php endfor; ?>
            </article>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\Mata Kuliah\Semester 5\Implementasi dan Evaluasi Sistem Informasi\ComicAddict\resources\views/post.blade.php ENDPATH**/ ?>