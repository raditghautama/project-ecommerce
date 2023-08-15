@extends('layouts.sidebar')

@section('content')
<!-- content -->
<div class="heading-dashboard rounded-3 ">
        Dashboard

</div>
  <main class="mt-4">
    <div class="container">
      <div class="insights">
        <div class="sales">
          <span class="bx bx-data" style="color: #fff"></span>
          <div class="middle">
            <div class="left">
              <h3>Total Product</h3>
              <h1>{{ number_format($total_products) }}</h1>
            </div>
            <div class="progres">
              <svg>
                <circle cx="38" cy="38" r="36"></circle>
              </svg>
              <div class="number">
                <p>25%</p>
              </div>
            </div>
          </div>
          <small class="text-mute">Last 24 hours</small>
        </div>
        <!-- EXPENSES -->
        <div class="expenses">
          <span class="us bx bxs-group"></span>
          <div class="middle">
            <div class="left">
              <h3>Total Customer</h3>
              <h1>{{ number_format($total_customers) }}</h1>
            </div>
            <div class="progres">
              <svg>
                <circle cx="38" cy="38" r="36"></circle>
              </svg>
              <div class="number">
                <p>62%</p>
              </div>
            </div>
          </div>
          <small class="text-mute">Last 24 hours</small>
        </div>
        <!-- INCOME -->
        <div class="income">
          <span class="bx bx-dollar" style="color: #fff"></span>
          <div class="middle">
            <div class="left">
              <h3>Total Income</h3>
              <h1>{{ number_format($total_income) }}</h1>
            </div>
            <div class="progres">
              <svg>
                <circle cx="38" cy="38" r="36"></circle>
              </svg>
              <div class="number">
                <p>41%</p>
              </div>
            </div>
          </div>
          <small class="text-mute">Last 24 hours</small>
        </div>
        <!-- END OF SALES -->
                
      </div>
    </div>
  </main>

  <!-- CHART -->
  <div class="chart container d-flex gap-4">

    <div class=" col-md-8 mt-5">
      <div class="card border-light">
        <div class="card-body ">
          <div class="d-flex justify-content-between mt-3 mb-2">
            <div class="text">
              <h5>Revenue Updates</h5>
          <span class="text-secondary">Overview of Profit</span>
        </div>
          <div class="button">
            <div class="dropdown-center">
              <button class="btn btn-light border border-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Month
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">April 2023</a></li>
                <li><a class="dropdown-item" href="#">May 2023</a></li>
                <li><a class="dropdown-item" href="#">June 2023</a></li>
              </ul>
            </div>
          </div>

          </div>
          <canvas id="chart" class="h-100"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-4 mt-5">
      <div class="card border-light">
        <div class="card-body">
          <h5 class="mt-3">Yearly Breakup</h5>
          <div class="d-flex mt-4">
            <div class="text">
              <h3 class="fw-semibold">$36,358</h3>
              <i class='treding bx bx-trending-up'></i><span class="fs-7 ms-2"><span class="fw-semibold">+10%</span> last year</span>
            </div>
            <div class="w-50 h-50 ms-5">
              <canvas id="myChart" ></canvas>
            </div>

          </div>
        </div>
      </div>

      <div class="card border-light mt-2">
        <div class="card-body">
          <div class="d-flex">
            <div class="image">
              <img src="assets/img/u1.jpg" class="rounded-2 w-75" alt="">
            </div>
            <div class="text-img ms-0">
              <h5>Super awesome, Vue coming soon!</h5>
              <span class="text-secondary fs-6">22 March, 2022</span>
            </div>
          </div>
          <div class="d-flex">

            <div class=" ms-2 mt-3">
              <img src="{{url('assets/img/u1.jpg')}}" class="img-1 rounded-circle" alt="">
              <img src="{{url('assets/img/u2.jpg')}}" class="img-2 rounded-circle" alt="">
              <img src="{{url('assets/img/u3.jpg')}}" class="img-2 rounded-circle" alt="">
              <img src="{{url('assets/img/u4.jpg')}}" class="img-2 rounded-circle" alt="">
            </div>
            <div class="ms-3 mt-3">
              <i class='message bx bx-message-alt-detail rounded-2'></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- END CHART -->
@endsection
