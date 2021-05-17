<option>-- Select Model --</option>
<?php if(!empty($model)): ?>
  <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\05-10 Autopati\autopati\app/Modules/Cars\Resources/views/cars/partial/select-model-ajax.blade.php ENDPATH**/ ?>