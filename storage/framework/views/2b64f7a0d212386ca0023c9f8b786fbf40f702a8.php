<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Edit menu
                            
                        </h3>
                    </div>
                </div>
                <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p><?php echo e($message); ?></p>
                    </div>
                <?php endif; ?>
                <div class="col-md-12">

                    <ul class="nav nav-tabs language_tab">
                        <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a data-toggle="tab" href="#home<?php echo e($lang->id); ?>"><?php echo e($lang->language); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <form id="demo-form2" data-parsley-validate action="<?php echo e(URL::asset('')); ?>admin/edit-menu-<?php echo e($id); ?>"
                          method="post" class="form-horizontal form-label-left">
                        <div class="tab-content">
                            <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div id="home<?php echo e($i->language_id); ?>" class="tab-pane fade">

                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <h2></h2>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu
                                            name <span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="menu_name" name="menu_name<?php echo e($i->language_id); ?>" required="required"
                                             value="<?php echo e($i->menu_name); ?>"      class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>


                                </div>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>




                <div class="clearfix"></div>
            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>