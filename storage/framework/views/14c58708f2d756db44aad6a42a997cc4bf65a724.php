<footer class="section-padding">
    <div class="container">
        <div class="row">
            <?php $setting = app('\App\Modules\Setting\Repositories\SettingRepository'); ?>
            <?php
                $footer = $setting->getdata();
            ?>
            <div class="col-sm-6 col-md-3">
                <h5><?php echo e($footer->company_name); ?></h5>
                <ul class="list-unstyled">
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
            <div class="col-sm-6 col-md-3">
                <h5>Useful Links</h5>
                <ul class="list-unstyled f-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Disclaimer</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <div class="col-sm-6 col-md-3">
                <h5>Customer Links</h5>
                <ul class="list-unstyled f-links">
                    <li><a href="#">Latest Cars</a></li>
                    <li><a href="#">Featured Cars</a></li>
                    <li><a href="#">Top 10 Reviews</a></li>
                </ul>
            </div>

            <div class="col-sm-6 col-md-3">
                <h5>Popular Cars By Make</h5>
                <ul class="list-unstyled f-links">
                    <li><a href="#">Audi</a></li>
                    <li><a href="#">BMW</a></li>
                    <li><a href="#">Ford</a></li>
                    <li><a href="#">Honda</a></li>
                </ul>
            </div>
        </div>
    </div>
    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-angle-up"></i></a>
</footer>

<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p>©<?php echo e($footer->company_copyright); ?> <a href="/"><?php echo e($footer->company_name); ?></a>. Developed by <a href="https://www.bidhee.com/" target="__blank">Bidhee Pvt. Ltd.</a></p>
            </div>
        </div>
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
<script src="home/js/owl.carousel.min.js"></script>
<script src="home/js/imagezoom.js"></script>
<script src="home/js/jquery.magnific-popup.min.js"></script>
<script src="home/js/jquery.star-rating-svg.min.js"></script>
<script src="home/js/custom.js"></script>

<?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/resources/views/includes/footer.blade.php ENDPATH**/ ?>