
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{url("/employee")}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="{{route('employee-profile')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
	                {{'Profile'}}
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTaskLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    {{ __('Task Info') }}
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseTaskLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('employee-show-new-task')}}">{{ __('New Task') }}</a>
                        <a class="nav-link" href="{{route('employee-show-complete-task')}}">{{ __('Completed Task') }}</a>
                    </nav>
                </div>
{{--                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRatingLayouts" aria-expanded="false" aria-controls="collapseLayouts">--}}
{{--                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>--}}
{{--                    {{ __('Rating Info') }}--}}
{{--                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="collapseRatingLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">--}}
{{--                    <nav class="sb-sidenav-menu-nested nav">--}}
{{--                        <a class="nav-link" href="{{route("give-rating-to-co-worker")}}">{{ __('Co-worker Rating') }}</a>--}}
{{--                    </nav>--}}
{{--                </div>--}}
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{'Employee'}}
        </div>
    </nav>
</div>
