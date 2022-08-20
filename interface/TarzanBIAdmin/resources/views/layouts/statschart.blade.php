<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Graphe des statistiques par mois</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <div class="chart">
                <div class="container px-4 mx-auto">
                        {!! $chart->container() !!}
                </div>
            </div>
        </div>
    </div>
</div>
