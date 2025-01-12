@extends('template.main')
@section('title', 'Dashboard')

@section('header-menu')

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

        <li class="nav-item">
        <a class="nav-link collapsed" href="/users">
            <i class="bi bi-grid"></i>
            <span>Users</span>
        </a>
        </li><!-- End Dashboard Nav -->

    </ul>

  </aside><!-- End Sidebar-->
@endsection

@section('content')

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">Statistik</h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", async () => {

                      const response = await fetch('/api/get-monthly-counts', {
                          method: 'GET',
                      });

                      var monthlyData;

                      if (response.ok) {
                          monthlyData = await response.json();
                          console.log(monthlyData[0]);
                      } else {
                          const errorResponse = await response.text();
                          console.error('Failed to add Kunjungan:', errorResponse);
                      }
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Kunjungan',
                          data: [monthlyData[0].kunjungan, monthlyData[1].kunjungan, monthlyData[2].kunjungan, monthlyData[3].kunjungan, monthlyData[4].kunjungan],
                        }, {
                          name: 'Klik Layanan',
                          data: [monthlyData[0].layananKlik, monthlyData[1].layananKlik, monthlyData[2].layananKlik, monthlyData[3].layananKlik, monthlyData[4].layananKlik]
                        }, {
                          name: 'Klik Data',
                          data: [monthlyData[0].dataKlik, monthlyData[1].dataKlik, monthlyData[2].dataKlik, monthlyData[3].dataKlik, monthlyData[4].dataKlik]
                        }, {
                          name: 'Klik Bantuan',
                          data: [monthlyData[0].bantuaKlik, monthlyData[1].bantuaKlik, monthlyData[2].bantuaKlik, monthlyData[3].bantuaKlik, monthlyData[4].bantuaKlik]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d', '#C9A9CC'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: [monthlyData[0].month, monthlyData[1].month, monthlyData[2].month, monthlyData[3].month, monthlyData[4].month],
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

          @php
            use Carbon\Carbon;
            $todayCount = App\Models\Kunjungan::whereDate('created_at', Carbon::today())->count();
            $thisWeekCount = App\Models\Kunjungan::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
            $thisMonthCount = App\Models\Kunjungan::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();
            $thisYearCount = App\Models\Kunjungan::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->count();
            $kunjunganCount = App\Models\Kunjungan::count();
            $layananKlikCount = App\Models\KlikLayanan::count();
            $dataKlikCount = App\Models\KlikData::count();
            $bantuanKlikCount = App\Models\KlikBantuan::count();
            $feedbackCount = App\Models\Feedback::count();
            $dumasCount = App\Models\Dumas::count();
          @endphp

            <!-- Visitors Card -->
            <div class="col-xxl-3 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Kunjungan <span>| Harian</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$todayCount}}</h6>
                      <span class="text-success small pt-1 fw-bold">Pengunjung</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Visitors Card -->
            <div class="col-xxl-3 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Kunjungan <span>| Mingguan</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$thisWeekCount}}</h6>
                      <span class="text-success small pt-1 fw-bold">Pengunjung</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Visitors Card -->
            <div class="col-xxl-3 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Kunjungan <span>| Bulanan</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$thisMonthCount}}</h6>
                      <span class="text-success small pt-1 fw-bold">Pengunjung</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Visitors Card -->
            <div class="col-xxl-3 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Kunjungan <span>| Tahunan</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$thisYearCount}}</h6>
                      <span class="text-success small pt-1 fw-bold">Pengunjung</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Visitors Card -->
            <div class="col-xxl-3 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Kunjungan <span>| Total Kunjungan</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$kunjunganCount}}</h6>
                      <span class="text-success small pt-1 fw-bold">Pengunjung</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Visitors Card -->
            <div class="col-xxl-3 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Klik <span>| Layanan</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$layananKlikCount}}</h6>
                      <span class="text-success small pt-1 fw-bold">Klik</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Visitors Card -->
            <div class="col-xxl-3 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Klik <span>| Data</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$dataKlikCount}}</h6>
                      <span class="text-success small pt-1 fw-bold">Klik</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Visitors Card -->
            <div class="col-xxl-3 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Klik <span>| Bantuan</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$bantuanKlikCount}}</h6>
                      <span class="text-success small pt-1 fw-bold">Klik</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Visitors Card -->
            <div class="col-xxl-3 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Laporan <span>| Feedback</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$feedbackCount}}</h6>
                      <span class="text-success small pt-1 fw-bold">Feedback</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Visitors Card -->
            <div class="col-xxl-3 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Laporan <span>| Aduan</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$dumasCount}}</h6>
                      <span class="text-success small pt-1 fw-bold">Aduan</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

@endsection
