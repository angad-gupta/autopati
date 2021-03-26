<div class="main-title pt-2 pb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="breadcrumbs list-unstyled d-flex">
                    <li><a href="">Home</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li><a href="">Cars</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>{{optional($car->BrandInfo)->brand_name }} {{ optional($car->ModelInfo)->model_name }} {{ optional($car->VariantInfo)->variant_name }}</li>

                </ul>
            </div>
        </div>
    </div>
</div>