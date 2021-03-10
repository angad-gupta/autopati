@extends('admin::layout')
@section('title')Spec Configuration @stop
@section('breadcrum')Spec Configuration @stop


@section('content') 


<div class="card card-body bg-pink-400" style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png);">
    <div class="media">
        <div class="mr-3 align-self-center">
            <i class="icon-wave icon-2x"></i>
        </div>

        <div class="media-body text-center">
            <h5 class="media-title font-weight-semibold">List of Spec Managemnt</h5>
            <span class="opacity-75">Did you want to add Spec ? If yes, <a href="{{route('spec.create')}}" target="_blank" class="text-light">Click Me !</a></span>
        </div>
    </div>
</div>

<div class="card-group-control card-group-control-right" id="accordion-control-right">

<div class="row"> 
	 @if($spec->total() != 0) 
        @foreach($spec as $key => $value)

        @inject('configuration', '\App\Modules\Configuration\Repositories\ConfigurationRepository')
        @php
         $totalConfig = $configuration->countBySpecId($value->id);
        @endphp
        
        <div class="col-lg-4">
			<div class="card @if($totalConfig > 0) border-top-success @endif " style="margin-bottom: 10px;">
				<div class="card-header bg-alpha-grey" style="padding-top: 10px;padding-bottom: 10px;">
					<h6 class="card-title">
						<a data-toggle="collapse" class="text-default collapsed" href="#accordion-control-right-{{$key+1}}" aria-expanded="false">@if($totalConfig > 0) <span class="badge badge-mark border-success-600 mr-2"></span> @endif #{{$key+1}} {{ $value->spec_title }} - <b>{{$value->automobile}} </b></a>
					</h6>
				</div>

				<div id="accordion-control-right-{{$key+1}}" class="collapse" data-parent="#accordion-control-right" style="">
					<div class="card-body">

						@if($totalConfig > 0)

							<div class="media align-items-center align-items-md-start flex-column flex-md-row">
								<a href="{{route('configuration.view',['spec_id'=>$value->id])}}" class="text-teal mr-md-3 align-self-md-center mb-3 mb-md-0">
									<i class="icon-eye text-success-400 border-success-400 border-3 rounded-round p-2"></i>
								</a>

								<div class="media-body text-center text-md-left">
									<h6 class="media-title font-weight-semibold">Want to Add More Spec Data ?</h6>
									You have {{$totalConfig}} Feature/s in <b>{{ $value->spec_title }}</b> Specification.
								</div>

								<a href="{{route('configuration.create',['spec_id'=>$value->id])}}" class="btn bg-teal-400 align-self-md-center ml-md-3 mt-3 mt-md-0"><i class="icon-cogs mr-2"></i> Configure</a>
							</div>

						@else

							<div class="media align-items-center align-items-md-start flex-column flex-md-row">
								<a href="#" class="text-teal mr-md-3 align-self-md-center mb-3 mb-md-0">
									<i class="icon-question7 text-warning-400 border-warning-400 border-3 rounded-round p-2"></i>
								</a>

								<div class="media-body text-center text-md-left">
									<h6 class="media-title font-weight-semibold">Can't find what you're looking for?</h6>
									You haven't Added Configuration Under <b>{{ $value->spec_title }}</b> Specification. Please Configure.
								</div>

								<a href="{{route('configuration.create',['spec_id'=>$value->id])}}" class="btn bg-warning-400 align-self-md-center ml-md-3 mt-3 mt-md-0"><i class="icon-cogs mr-2"></i> Configure</a>
							</div>
						
						@endif
						
					</div>
				</div>
			</div>
		</div>
		@endforeach
	@endif

</div>
</div>




@endsection

