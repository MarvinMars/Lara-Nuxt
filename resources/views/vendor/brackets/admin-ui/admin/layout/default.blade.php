@extends('brackets/admin-ui::admin.layout.master')

@section('header')
    @include('brackets/admin-ui::admin.partials.header')
@endsection

@section('content')

    <div class="app-body">

        @if(View::exists('admin.layout.sidebar'))
            @include('admin.layout.sidebar')
        @endif

        <main class="main">

            <div class="container-fluid" id="app" :class="{'loading': loading}">
                <div class="modals">
                    <v-dialog>
                    </v-dialog>
                </div>
                <div>
                    <notifications position="bottom right" :duration="2000">
                    </notifications>
                </div>

                @yield('body')
            </div>
        </main>
    </div>

    <footer class="app-footer">
        <div class="container-fluid">
            <div class="container-xl">
            <span class="pull-right">
                Powered by <a href="https://.digital" target="_blank">.</a>
            </span>
            </div>
        </div>
    </footer>
@endsection

@section('bottom-scripts')
    @parent
@endsection
