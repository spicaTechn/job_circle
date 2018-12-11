@extends('front.layout.master')

@section('content')
@if(!empty($faqs))
<div class="default-page">
    <div class="container">
        <h2>Frequently Asked Question</h2>
        <div id="accordion">
            <?php 
                $page_details = $faqs->page_details; 
                $i            = 1;
            ?>
            @foreach($page_details as $page_detail)
            <?php $unserialize_value = unserialize($page_detail->meta_value); ?>
            <div class="card" style="min-height: 278px;">
                <div class="card-header" id="heading{{ $i }}">
                    <h5 class="mb-0">
                    <button class="btn btn-link {{ ($i == 1) ? '' : 'collapsed' }}" data-toggle="collapse" data-target="#collapse{{ $i }}" aria-expanded="true" aria-controls="collapse{{ $i }}">
                    {{ $unserialize_value['title'] }}
                    <!-- <i class="icon-arrow-down"></i> -->
                    </button>
                    </h5>
                </div>
                <div id="collapse{{ $i }}" class="collapse {{ ($i == 1) ? 'show' : '' }}" aria-labelledby="heading{{ $i }}" data-parent="#accordion">
                    <div class="card-body">
                        {{ $unserialize_value['description'] }}
                    </div>
                </div>
            </div>
            <?php $i++; ?>
            @endforeach
        </div>
    </div>
</div>
@else
<div class="about-overview" style="height: 467px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="overview-detail">
                    <h3 style="line-height: 1100%">No FAQ's Found</span></h3>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endif
@endsection