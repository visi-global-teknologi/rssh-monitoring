<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('translation.Menu')</li>
                @include('skote.menu.dashboard')
                @include('skote.menu.client')
                @include('skote.menu.device')
                @include('skote.menu.cron-log')
                @include('skote.menu.rssh-log')
                @include('skote.menu.ping-server')
                @include('skote.menu.rssh-connection')
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
