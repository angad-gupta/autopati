
<section class="rtt-subscribe" style="background-image: url('home/img/banner-two.png');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="text-white">
                    <h3>Keep updated & Get Unlimited Offers</h3>
                    <p class="mb-0">
                        Subscribe to Autopati
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="rtt-subscribe--form justify-content-end">
                    <form action="<?php echo e(route('subscription')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input class="form-control" type="email" name="email" value="" placeholder="Your email address here" required>
                        <input type="number" name="status" value="1" hidden/>
                        <button class="btn btn-info" type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="section-padding">
    <div class="container">
        <div class="row">
            <?php $setting = app('\App\Modules\Setting\Repositories\SettingRepository'); ?>
            <?php
                $footer = $setting->getdata();
            ?>
            <div class="col-sm-6 col-md-3">
                <h5><?php echo e($footer->company_name); ?></h5>
                <ul class="list-info">
                    <li> <i class="fa fa-map-marker"></i>
                        <?php echo e($footer->address1); ?>

                    </li>
                    <li><i class="fa fa-phone"></i>
                        <?php echo e($footer->contact_no1); ?>

                    </li>
                    <li><i class="fa fa-envelope"></i>
                        <?php echo e($footer->company_email); ?>

                    </li>
                </ul>
                <div class="ap-social mt-4 d-flex">
                    <a class="fb" href="<?php echo e($footer->facebook_link); ?>" target="__blank"><i class="fa fa-facebook"></i></a>
                    <a class="twit" href="<?php echo e($footer->twitter_link); ?>" target="__blank"><i class="fa fa-twitter"></i></a>
                    <a class="youtube" href="<?php echo e($footer->youtube_link); ?>" target="__blank"><i class="fa fa-youtube"></i></a>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 mt-3 mt-md-0">
                <h5>Useful Links</h5>
                <?php $pages = app('\App\Modules\Page\Repositories\PageRepository'); ?>
                <?php
                    $active_pages = $pages->findActivePage($limit=50);
                ?>


                <ul class="list-unstyled f-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="<?php echo e(route('news.all')); ?>">Blog</a></li>
                    <?php $__currentLoopData = $active_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $active_page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('page',$active_page->slug)); ?>"><?php echo e($active_page->title); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <div class="col-sm-6 col-md-3 mt-3 mt-sm- 3 mt-md-0">
                <h5>Customer Links</h5>
                <ul class="list-unstyled f-links">
                    <li><a href="<?php echo e(route('list.latest-car')); ?>">Latest Cars</a></li>
                    <li><a href="<?php echo e(route('list.popular-car')); ?>">Popular Cars</a></li>
                    
                </ul>
            </div>

            <div class="col-sm-6 col-md-3 mt-3 mt-sm- 3 mt-md-0">
                <h5>Popular Cars By Make</h5>
                <?php $popular_brand = app('\App\Modules\Cars\Repositories\CarRepository'); ?>
                <?php
                    $popular_brands = $popular_brand->findPopularBrand($limit=5);

                ?>

                <ul class="list-unstyled f-links">
                    <?php $__currentLoopData = $popular_brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popular_brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('list.brand.vehicles',$popular_brand->brand_id)); ?>"><?php echo e($popular_brand->BrandInfo->brand_name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
            </div>
        </div>
    </div>

    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-angle-up"></i></a>
</footer>

<div class="footer-bottom">
    <div class="container">
        <p class="m-0 text-center">
            <small>© <?php echo e($footer->company_copyright); ?> <a href="/"><?php echo e($footer->company_name); ?></a>. Developed by <a href="https://www.bidhee.com/" target="__blank">Bidhee Pvt. Ltd.</a></small>
        </p>
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
<script src="<?php echo e(asset('home/js/owl.carousel.min.js?v=1.1')); ?>"></script>
<script src="<?php echo e(asset('home/js/imagezoom.js')); ?>"></script>
<script src="<?php echo e(asset('home/js/jquery.magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset('home/js/jquery.star-rating-svg.min.js')); ?>"></script>
<script src="<?php echo e(asset('home/js/custom.js')); ?>"></script>

<?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Home/Resources/views/includes/footer.blade.php ENDPATH**/ ?>