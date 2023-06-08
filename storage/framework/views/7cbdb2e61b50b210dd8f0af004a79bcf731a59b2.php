

<?php $__env->startSection('container'); ?>
<div class="container">
    <div class="row my-3">
        <div class="col-md-8">
        <h2 class="mb-3 fw-semibold"><?php echo e($comic->title); ?></h2>
        <a href="/dashboard/comics" class="btn btn-success"><span data-feather="arrow-left"></span> Back To My Comics</a>
        <a href="/dashboard/comics/<?php echo e($comic->slug); ?>/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
        <form action="/dashboard/comics/<?php echo e($comic->slug); ?>" method="post" class="d-inline">
            <?php echo method_field('delete'); ?>
            <?php echo csrf_field(); ?>
            <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><span data-feather="trash-2"></span>Delete</button>
        </form> 

        

            <article class="my-3 fs-5">
                <?php for($i = 0; $i < $comic->pages; $i++): ?>
                <img src="https://source.unsplash.com/600x1200/?<?php echo e($comic->category->name); ?>" alt="<?php echo e($comic->category->name); ?>" class="img-fluid">
                <?php endfor; ?>
            </article>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\Mata Kuliah\Semester 5\Implementasi dan Evaluasi Sistem Informasi\ComicAddict\resources\views/dashboard/comics/show.blade.php ENDPATH**/ ?>