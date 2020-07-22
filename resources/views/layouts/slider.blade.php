<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            
            <li class="sidebar-toggler-wrapper" style="margin-bottom: 10px;">
                <div class="sidebar-toggler"></div>
            </li>

            @if($sliderAction == "home")
            <li class="active open">
            @else
            <li>
            @endif
                <a href="{{ asset('/home') }}" class="active">
                    <i class="icon-briefcase"></i>
                    <span class="title">Home</span>
                    <span class="selected"></span>
                </a>
            </li>

            @if($sliderAction == "parliament")
            <li class="active open">
            @else
            <li>
            @endif
                <a href="{{ asset('/parliament') }}" class="active">
                    <i class="icon-briefcase"></i>
                    <span class="title">Parliament</span>
                    <span class="selected"></span>
                </a>
            </li>

            @if($sliderAction == "downloads")
            <li class="active open">
            @else
            <li>
            @endif
                <a href="{{ asset('/downloads') }}" class="active">
                    <i class="icon-briefcase"></i>
                    <span class="title">Downloads</span>
                    <span class="selected"></span>
                </a>
            </li>

            @if($sliderAction == "onlineporum")
            <li class="active open">
            @else
            <li>
            @endif
                <a href="{{ asset('/onlineporum') }}" class="active">
                    <i class="icon-briefcase"></i>
                    <span class="title">Online Porum</span>
                    <span class="selected"></span>
                </a>
            </li>

            @if($sliderAction == "votes")
            <li class="active open">
            @else
            <li>
            @endif
                <a href="{{ asset('/votes') }}" class="active">
                    <i class="icon-briefcase"></i>
                    <span class="title">Votes</span>
                    <span class="selected"></span>
                </a>
            </li>

            @if($sliderAction == "standingorder")
            <li class="active open">
            @else
            <li>
            @endif
                <a href="{{ asset('/standingOrder') }}" class="active">
                    <i class="icon-briefcase"></i>
                    <span class="title">Standing Order</span>
                    <span class="selected"></span>
                </a>
            </li>

            @if($sliderAction == "constitution")
            <li class="active open">
            @else
            <li>
            @endif
                <a href="{{ asset('/constitution') }}" class="active">
                    <i class="icon-briefcase"></i>
                    <span class="title">Constitution</span>
                    <span class="selected"></span>
                </a>
            </li>

            @if($sliderAction == "stateopening")
            <li class="active open">
            @else
            <li>
            @endif
                <a href="{{ asset('/stateOpening') }}" class="active">
                    <i class="icon-briefcase"></i>
                    <span class="title">State Opening</span>
                    <span class="selected"></span>
                </a>
            </li>

            @if($sliderAction == "budget")
            <li class="active open">
            @else
            <li>
            @endif
                <a href="{{ asset('/budgetInformation') }}" class="active">
                    <i class="icon-briefcase"></i>
                    <span class="title">Budget</span>
                    <span class="selected"></span>
                </a>
            </li>

            @if($sliderAction == "videostreaming")
            <li class="active open">
            @else
            <li>
            @endif
                <a href="{{ asset('/videoStreaming') }}" class="active">
                    <i class="icon-briefcase"></i>
                    <span class="title">Video Streaming</span>
                    <span class="selected"></span>
                </a>
            </li>
        </ul>
    </div>
</div>

<script>
    
</script>