<?php $__env->startSection('content'); ?>
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-3">
                        <h3>System permission
                            
                        </h3>
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

                            <th>Permission</th>
                            <th>User can do</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->permission); ?></td>

                                <td><?php echo e($item->note); ?></td>
                                <td>
                                    <a href="<?php echo e(URL::asset('')); ?>admin/edit-permission-<?php echo e($item->id); ?>"
                                       class="btn btn-xs btn-primary editlink"><span class="glyphicon glyphicon-pencil"></span>
                                        Edit</a>
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
        $('.editlink').click(function (e) {
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