@if($common['top_banners'])
<div class="top">
    <div class="top_banners">
        <div id="carousel-top-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            @if(count($common['top_banners'])>1)
            <ol class="carousel-indicators">
                @foreach($common['top_banners'] as $k=>$top_banner)
                <li data-target="#carousel-top-generic" data-slide-to="{{$k}}" {{$k==0?'class="active"':''}}></li>
                @endforeach
            </ol>
            @endif
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @foreach($common['top_banners'] as $k=>$top_banner)
                <div class="item {{$k==0?'active':''}}">
                    <img src="{{$top_banner['image']}}" alt="{{$top_banner['title']}}" class="margin-auto">
                </div>
                @endforeach
            </div>
            <!-- Controls -->
            @if(count($common['top_banners'])>1)
            <a class="left carousel-control" style="background: none;" href="#carousel-top-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" style="background: none;" href="#carousel-top-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            @endif
        </div>
    </div>
</div>
@endif