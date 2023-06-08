

<?php $__env->startSection('container'); ?>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Comics</h1>
  </div>
  
  <?php if(session()->has('success')): ?>
      <div class="alert alert-success col-lg-10" role="alert">
        <?php echo e(session('success')); ?>

      </div>
  <?php endif; ?>

  <div class="table-responsive col-lg-10">
    <a href="/dashboard/comics/create" class="btn btn-primary mb-3">Create Comic!</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $comics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($loop->iteration); ?></td>
          <td><?php echo e($comic->title); ?></td>
          <td><?php echo e($comic->category->name); ?></td>
          <td>
            <a href="/dashboard/comics/<?php echo e($comic->slug); ?>" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="/dashboard/comics/<?php echo e($comic->slug); ?>/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/comics/<?php echo e($comic->slug); ?>" method="post" class="d-inline">
              <?php echo method_field('delete'); ?>
              <?php echo csrf_field(); ?>
              <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus?')"><span data-feather="trash-2"></span></button>
            </form> 
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\Mata Kuliah\Semester 5\Implementasi dan Evaluasi Sistem Informasi\ComicAddict\resources\views/dashboard/comics/index.blade.php ENDPATH**/ ?>