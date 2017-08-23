<?php $__env->startSection('content'); ?>
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <a href="<?php echo e(URL::asset('')); ?>admin/create-new-menu" class="btn btn-sm btn-success"><span
                        class="glyphicon glyphicon-ok"></span> New menu</a>
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-3">
                        <h3>Menu management
                            
                        </h3>
                    </div>
                    <div class="col-md-6">
                        <span>Language: </span>
                        <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(URL::asset('')); ?>admin/<?php echo e($lang->id); ?>-menu-management"
                               class="btn btn-xs btn-info"><?php echo e($lang->language); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <p><?php echo e($message); ?></p>
                    </div>
                <?php endif; ?>
                <div class="col-md-12">
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr>

                            <th>Menu</th>
                            <th>Slug</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->menu_name); ?></td>
                                <td><?php echo e($item->slug); ?></td>
                                <td><?php echo e($item->created_at); ?></td>
                                <td><?php echo e($item->update_at); ?></td>
                                <td>
                                    <a href="<?php echo e(URL::asset('')); ?>admin/edit-menu-<?php echo e($item->id); ?>"
                                       class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span>
                                        Edit</a>
                                    <a href="<?php echo e(URL::asset('')); ?>admin/delete-menu-<?php echo e($item->id); ?>"
                                       class="btn btn-xs btn-danger deletelink"><span
                                                class="glyphicon glyphicon-trash"></span> Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $('.deletelink').click(function (e) {
            var a_href = $(this).attr('href'); /* Lấy giá trị của thuộc tính href */
            e.preventDefault(); /* Không thực hiện action mặc định */
            $.ajax({ /* Gửi request lên server */
                url: a_href, /* Nội dung trong Delete.cshtml cụ thể là deleteModal div được server trả về */
                type: 'GET',
                contentType: 'application/json; charset=utf-8',
                success: function (data) { /* Sau khi nhận được giá */
                    $('.body-content').prepend(data); /* body-content div (định nghĩa trong _Layout.cshtml) sẽ thêm deleteModal div vào dưới cùng */
                    $('#deleteModal').modal('show'); /* Hiển thị deleteModal div dưới kiểu modal */
                }
            });
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>