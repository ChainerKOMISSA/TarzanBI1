<div class="card-body">
    <div class="container px-4 mx-auto">
        <div class="p-6 m-20 bg-white rounded shadow">
            {!! $chart->container() !!}
        </div>
    </div>
</div>
<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}

