

<?php $__env->startSection('container'); ?>

<h1 class="mb-3 text-center"><?php echo e($title); ?></h1>

<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="/posts">
      <?php if(request('category')): ?>
        <input type="hidden" name="category" value="<?php echo e(request('category')); ?>">
      <?php endif; ?>

      <?php if(request('author')): ?>
        <input type="hidden" name="category" value="<?php echo e(request('author')); ?>">
      <?php endif; ?>

      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.." name="search" value="<?php echo e(request('search')); ?>">
        <button class="btn btn-danger" type="submit">Search</button>
      </div>
    </form>
  </div> 
</div>

<?php if($comics->count()): ?>
<div class="card mb-3 text-center">
    <a href="/posts/<?php echo e($comics[0]->slug); ?>">
      <?php if($comics[0]->image): ?>
      <img src="<?php echo e(asset('storage/' . $comics[0]->image)); ?>" alt="<?php echo e($comics[0]->category->name); ?>" class="img-fluid">
      <?php else: ?>
      <img src="https://source.unsplash.com/1200x400/?<?php echo e($comics[0]->category->name); ?>" alt="<?php echo e($comics[0]->category->name); ?>" class="img-fluid">    
      <?php endif; ?>
    </a>
    <div class="card-body">
      <h3 class="card-title"><a class="text-decoration-none text-dark" href="/posts/<?php echo e($comics[0]->slug); ?>"><?php echo e($comics[0]->title); ?></a></h3>
        <p>
        <small class="text-muted">
        By : <a href="/posts?author=<?php echo e($comics[0]->author->username); ?>" class="text-decoration-none"><?php echo e($comics[0]->author->name); ?></a> in <a class="text-decoration-none" href="/posts?category=<?php echo e($comics[0]->category->slug); ?>"> <?php echo e($comics[0]->category->name); ?> </a> <?php echo e($comics[0]->created_at->diffForHumans()); ?>

        </small>
        </p>
        <p><?php echo e($comics[0]->excerpt); ?></p>
        <a class="text-decoration-none btn btn-primary" href="/posts/<?php echo e($comics[0]->slug); ?>">Baca Komik!</a>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php $__currentLoopData = $comics->skip(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="position-absolute bg-dark px-3 py-2 text-white" style="--bs-bg-opacity: .8"><a class="text-decoration-none text-white" href="/posts?category=<?php echo e($comic->category->slug); ?>"><?php echo e($comic->category->name); ?></a></div>
                
                  <?php if($comic->image): ?>
                  <img src="<?php echo e(asset('storage/' . $comic->image)); ?>" alt="<?php echo e($comic->category->name); ?>" class="img-fluid">
                  <?php else: ?>
                  <img src="https://source.unsplash.com/300x400/?<?php echo e($comic->category->name); ?>" alt="<?php echo e($comic->category->name); ?>" class="img-fluid">    
                  <?php endif; ?>
                
                <div class="card-body">
                  <a href="/posts/<?php echo e($comic->slug); ?>" class="text-decoration-none text-dark"><h5 class="card-title"><?php echo e($comic->title); ?></h5></a>
                  <p>
                    <small class="text-muted">
                    By : <a href="/posts?author=<?php echo e($comic->author->username); ?>" class="text-decoration-none"><?php echo e($comic->author->name); ?></a> <?php echo e($comic->created_at->diffForHumans()); ?>

                    </small>
                    </p>
                  <p class="card-text"><?php echo e($comic->excerpt); ?></p>
                  <a href="/posts/<?php echo e($comic->slug); ?>" class="btn btn-primary">Baca Komik!</a>
                </div>
              </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php else: ?>
    <p class="text-center fs-4">No Comic Found!</p>
<?php endif; ?>

  <div class="d-flex justify-content-center mt-5 mb-5">
    <?php echo e($comics->links()); ?>

  </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\Mata Kuliah\Semester 5\Implementasi dan Evaluasi Sistem Informasi\ComicAddict\resources\views/posts.blade.php ENDPATH**/ ?>