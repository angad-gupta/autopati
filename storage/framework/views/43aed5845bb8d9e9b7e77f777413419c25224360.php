<?php $__env->startSection('title'); ?>Vehicle List | Autopati <?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>

<style>
    @import  url("https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700");


.main-wrapper {
  font-size: 8vmin;
  background-color: #ffffff;
  display: flex;
  align-items: center;
  justify-content: center;
}

.signboard-wrapper {
  width: 75vmin;
  height: 55vmin;
  margin: 20px;
  position: relative;
  flex-shrink: 0;
  transform-origin: center 2.5vmin;
  animation: 1000ms init forwards, 1000ms init-sign-move ease-out 1000ms, 3000ms sign-move 2000ms infinite;
}
.signboard-wrapper .signboard {
  color: #ffffff;
  font-family: "Open Sans", sans-serif;
  font-weight: bold;
  background-color: #ff5625;
  width: 100%;
  height: 35vmin;
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  bottom: 0;
  border-radius: 4vmin;
  text-shadow: 0 -0.015em #be2b00;
  box-shadow: 0 2vmin 4vmin 1vmin rgba(107, 107, 107, 0.8);
}
.signboard-wrapper .string {
  width: 30vmin;
  height: 30vmin;
  border: solid 0.9vmin #893d00;
  border-bottom: none;
  border-right: none;
  position: absolute;
  left: 50%;
  transform-origin: top left;
  transform: rotate(45deg);
}
.signboard-wrapper .pin {
  width: 5vmin;
  height: 5vmin;
  position: absolute;
  border-radius: 50%;
}
.signboard-wrapper .pin.pin1 {
  background-color: #9f9f9f;
  top: 0;
  left: calc(50% - 2.5vmin);
}
.signboard-wrapper .pin.pin2, .signboard-wrapper .pin.pin3 {
  background-color: #d83000;
  top: 21.5vmin;
}
.signboard-wrapper .pin.pin2 {
  left: 13vmin;
}
.signboard-wrapper .pin.pin3 {
  right: 13vmin;
}

@keyframes  init {
  0% {
    transform: scale(0);
  }
  40% {
    transform: scale(1.1);
  }
  60% {
    transform: scale(0.9);
  }
  80% {
    transform: scale(1.05);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes  init-sign-move {
  100% {
    transform: rotate(3deg);
  }
}
@keyframes  sign-move {
  0% {
    transform: rotate(3deg);
  }
  50% {
    transform: rotate(-3deg);
  }
  100% {
    transform: rotate(3deg);
  }
}
</style>

<section class="ecm-features ecm-new pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="ecm-features__title d-flex align-items-center justify-content-between">
                    <h1>Search For :<span> <?php echo e($title); ?></span></h1>
                    <h1><span style="color: #e53012"><?php echo e(count($vehicles)); ?> </span> Found !</h1>
                  
                </div>
            </div>
        </div>

        <?php if($vehicles->isNotEmpty()): ?>
        <div class="row mt-3 mb-3">
            <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
                <div class="services_item">
                    <img src="<?php echo e(($vehicle->car_image) ? asset($vehicle->file_full_path).'/'.$vehicle->car_image : asset('admin/default.png')); ?>" alt="">
                    <div class="services_item_desc">
                        <h6><a href="<?php echo e(route('car.detail',$vehicle->id)); ?>"><?php echo e(optional($vehicle->BrandInfo)->brand_name); ?> <?php echo e(optional($vehicle->ModelInfo)->model_name); ?></a></h6>
                        <p class="mb-0">Starting Rs. <?php echo e(number_to_words($vehicle->starting_price)); ?></p>
                        <div class="d-flex justify-content-end">
                            <a href="<?php echo e(route('car.detail',$vehicle->id)); ?>" class="btn btn-outline-warning">View Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php else: ?>
        <div class="container" style="margin: 20px 20px;">
            <h1 class="text-center">Opps!</h1>
            
            <div class="main-wrapper">
                <div class="signboard-wrapper">
                  <div class="signboard text-center">No Vehicle <br>Found !</div>
                  <div class="string"></div>
                  <div class="pin pin1"></div>
                  <div class="pin pin2"></div>
                  <div class="pin pin3"></div>
                </div>
              </div>
            
            

        </div>
        <?php endif; ?>
       

        <span >
            <?php if($vehicles->total() != 0): ?>
                <?php echo e($vehicles->links()); ?>

            <?php endif; ?>
        </span>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('home::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\05-10 Autopati\autopati\app/Modules/Home\Resources/views/home/list.blade.php ENDPATH**/ ?>