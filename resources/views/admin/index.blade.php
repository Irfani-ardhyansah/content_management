@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="section-body">
      <div class="row">

        @if(auth()->user()->role == '0')
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card card-statistic-2">
            <div class="card-chart">
              <canvas id="sales-chart" height="80"></canvas>
            </div>
            <div class="card-icon shadow-primary bg-primary">
              <i class="fas fa-shopping-bag"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah Author</h4>
              </div>
              <div class="card-body">
                {{$jumlah_user}}
              </div>
            </div>
          </div>
        </div>
        @endif

        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card card-statistic-2">
            <div class="card-stats">
              <canvas id="balance-chart" height="50"></canvas>
              <div class="card-stats-items">
                <div class="card-stats-item">
                  <div class="card-stats-item-count">{{$jumlah_draft}}</div>
                  <div class="card-stats-item-label">Draft</div>
                </div>
                <div class="card-stats-item">
                  <div class="card-stats-item-count">{{$jumlah_published}}</div>
                  <div class="card-stats-item-label">Published</div>
                </div>
              </div>
            </div>
            <div class="card-icon shadow-primary bg-primary">
              <i class="fas fa-archive"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Artikel</h4>
              </div>
              <div class="card-body">
                {{$jumlah_article}}
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card card-statistic-2">
            <div class="card-chart">
              <canvas id="balance-chart" height="80"></canvas>
            </div>
            <div class="card-icon shadow-primary bg-primary">
              <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Comment</h4>
              </div>
              <div class="card-body">
                {{$jumlah_comment}}
              </div>
            </div>
          </div>
        </div>

      </div>
      </div>
    </section>
@endsection