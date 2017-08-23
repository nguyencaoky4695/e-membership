<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Resize Image Uploading Demo</h1>
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo e($message); ?></strong>
            </div>
            <div class="row">

                <div class="col-md-4">
                    <strong>Image uploaded:</strong>
                    <br/>
                    <img src="<?php echo e(URL::asset('')); ?>images/resize/<?php echo e(Session::get('imageName')); ?>" />
                </div>
            </div>
        <?php endif; ?>


        <form class="form-horizontal" action="<?php echo e(URL::asset('')); ?>admin/resize-image" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="row">
            <div class="col-md-4">
                <br/>
                <input type="text" name="permission" class="form-control"/>
            </div>
            <div class="col-md-12">
                <br/>
                <input type="file" name="link" class="form-control"/>
            </div>
            <div class="col-md-12">
                <br/>
                <button type="submit" class="btn btn-success">Upload Image</button>
            </div>
        </div>
        </form>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>