

<?php $__env->startSection('container'); ?>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Comic Categories</h1>
  </div>
  
  <?php if(session()->has('success')): ?>
      <div class="alert alert-success col-lg-6" role="alert">
        <?php echo e(session('success')); ?>

      </div>
  <?php endif; ?>

  <div class="table-responsive col-lg-6">
    <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create Category!</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Category Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($loop->iteration); ?></td>
          <td><?php echo e($category->name); ?></td>
          <td>
            <a href="/dashboard/categories/<?php echo e($category->id); ?>/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/categories/<?php echo e($category->id); ?>" method="post" class="d-inline">
              <?php echo method_field('DELETE'); ?>
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
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\Mata Kuliah\Semester 5\Implementasi dan Evaluasi Sistem Informasi\ComicAddict\resources\views/dashboard/categories/index.blade.php ENDPATH**/ ?>