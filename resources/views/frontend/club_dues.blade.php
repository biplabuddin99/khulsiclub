@extends('frontend.app')
@section('content')
<section class="about-support">
    <span class="shape"></span>
    <span class="shape2"></span>
    <span class="shape3"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="mb-0">Total Dues</h3>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end bg-transparent mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('front')}}" class="breadcrumb-item router-link-active">Home</a>
                        </li>
                        <li class="breadcrumb-item">Total Dues</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="container py-4">
    <div class="row">
        <div class="col-lg-12 px-2 ">
            <div class="about-title" id="grad">
                <h6 class="text-uppercase p-1">Total Dues</h6>
            </div>
            <div class="table-responsive">
              <h3 class="text-center"><span class="pb-3 px-5 border-bottom-red">Founder Members List</span></h3>
              <table class="table">
                <thead>
                  <tr>
                    <th>SL.</th>
                    <th>Name of Founder Members List</th>
                    <th>FM Membership Code</th>
                    <th>2017</th>
                    <th>2018</th>
                    <th>2019</th>
                    <th>31th Dec"2020</th>
                    <th>10% Interest in Subscription</th>
                    <th>Land Development Fee Dues 10% Interest</th>
                    <th>Total Dues</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($founder_data as $m)
                    <tr>
                      <th>{{ ++$loop->index }}</th>
                      <th>{{$m->member_name}}</th>
                      <td>{{$m->membership_code}}</td>
                      <td>{{$m->y2017}}</td>
                      <td>{{$m->y2018}}</td>
                      <td>{{$m->y2019}}</td>
                      <td>{{$m->y2020}}</td>
                      <td>{{$m->subscription_interest}}</td>
                      <td>{{$m->land_interest}}</td>
                      <td> {{ ($m->y2017 + $m->y2018 + $m->y2019 + $m->y2020 + $m->subscription_interest + $m->land_interest) }}</td>
                    </tr>
                  @empty
                    <tr>
                      <th>SL.</th>
                      <th>Name of Founder Members List</th>
                      <th>FM Membership Code</th>
                      <th>2017</th>
                      <th>2018</th>
                      <th>2019</th>
                      <th>31th Dec"2020</th>
                      <th>10% Interest in Subscription</th>
                      <th>Land Development Fee Dues 10% Interest</th>
                      <th>Total Dues</th>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            
            <div class="table-responsive">
              <h3 class="text-center"><span class="pb-3 px-5 border-bottom-red">Life Members List</span></h3>
              <table class="table">
                <thead>
                  <tr>
                    <th>SL.</th>
                    <th>Name of Founder Members List</th>
                    <th>FM Membership Code</th>
                    <th>2017</th>
                    <th>2018</th>
                    <th>2019</th>
                    <th>31th Dec"2020</th>
                    <th>2021 Mar"31</th>
                    <th>10% Interest in Subscription</th>
                    <th>Land Development Fee Dues 10% Interest</th>
                    <th>Total Dues</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($life_data as $m)
                    <tr>
                      <th>{{ ++$loop->index }}</th>
                      <th>{{$m->member_name}}</th>
                      <td>{{$m->membership_code}}</td>
                      <td>{{$m->y2017}}</td>
                      <td>{{$m->y2018}}</td>
                      <td>{{$m->y2019}}</td>
                      <td>{{$m->y2020}}</td>
                      <td>{{$m->y2021}}</td>
                      <td>{{$m->subscription_interest}}</td>
                      <td>{{$m->land_interest}}</td>
                      <td> {{ ($m->y2017 + $m->y2018 + $m->y2019 + $m->y2020 + $m->subscription_interest + $m->land_interest) }}</td>
                    </tr>
                  @empty
                    <tr>
                      <th>SL.</th>
                      <th>Name of Founder Members List</th>
                      <th>FM Membership Code</th>
                      <th>2017</th>
                      <th>2018</th>
                      <th>2019</th>
                      <th>31th Dec"2020</th>
                      <th>2021 Mar"31</th>
                      <th>10% Interest in Subscription</th>
                      <th>Land Development Fee Dues 10% Interest</th>
                      <th>Total Dues</th>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>

            <div class="table-responsive">
              <h3 class="text-center"><span class="pb-3 px-5 border-bottom-red">Permanent Members List</span></h3>
              <table class="table">
                <thead>
                  <tr>
                    <th>SL.</th>
                    <th>Name of Founder Members List</th>
                    <th>FM Membership Code</th>
                    <th>2017</th>
                    <th>2018</th>
                    <th>2019</th>
                    <th>2020</th>
                    <th>2021</th>
                    <th>10% Interest in Subscription</th>
                    <th>Land Development Fee Dues With 10% Interest</th>
                    <th>Total Dues</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($perm_data as $m)
                    <tr>
                      <th>{{ ++$loop->index }}</th>
                      <th>{{$m->member_name}}</th>
                      <td>{{$m->membership_code}}</td>
                      <td>{{$m->y2017}}</td>
                      <td>{{$m->y2018}}</td>
                      <td>{{$m->y2019}}</td>
                      <td>{{$m->y2020}}</td>
                      <td>{{$m->y2021}}</td>
                      <td>{{$m->subscription_interest}}</td>
                      <td>{{$m->land_interest}}</td>
                      <td> {{ ($m->y2017 + $m->y2018 + $m->y2019 + $m->y2020 + $m->subscription_interest + $m->land_interest) }}</td>
                    </tr>
                  @empty
                  <tr>
                    <th>SL.</th>
                    <th>Name of Founder Members List</th>
                    <th>FM Membership Code</th>
                    <th>2017</th>
                    <th>2018</th>
                    <th>2019</th>
                    <th>2020</th>
                    <th>2021</th>
                    <th>10% Interest in Subscription</th>
                    <th>Land Development Fee Dues With 10% Interest</th>
                    <th>Total Dues</th>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>

            <div class="table-responsive">
              <h3 class="text-center"><span class="pb-3 px-5 border-bottom-red">Permanent Terminated Member List</span></h3>
              <table class="table">
                <thead>
                  <tr>
                    <th>SL.</th>
                    <th>Name of Founder Members List</th>
                    <th>FM Membership Code</th>
                    <th>2016</th>
                    <th>2017</th>
                    <th>2018</th>
                    <th>2019</th>
                    <th>31th Dec"2020</th>
                    <th>10% Interest in Subscription</th>
                    <th>31th Aug"2021</th>
                    <th>Land Development Fee Dues</th>
                    <th>10% Interest in Subscription & Land Fee</th>
                    <th>Total Dues</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($permter_data as $m)
                    <tr>
                      <th>{{ ++$loop->index }}</th>
                      <th>{{$m->member_name}}</th>
                      <td>{{$m->membership_code}}</td>
                      <td>{{$m->y2016}}</td>
                      <td>{{$m->y2017}}</td>
                      <td>{{$m->y2018}}</td>
                      <td>{{$m->y2019}}</td>
                      <td>{{$m->y2020}}</td>
                      <td>{{$m->subscription_interest}}</td>
                      <td>{{$m->y2021}}</td>
                      <td>{{$m->land_developmnet_fee}}</td>
                      <td>{{$m->land_interest}}</td>
                      <td> {{ ($m->y2017 + $m->y2018 + $m->y2019 + $m->y2020 + $m->subscription_interest + $m->land_interest) }}</td>
                    </tr>
                  @empty
                  <tr>
                    <th>SL.</th>
                    <th>Name of Founder Members List</th>
                    <th>FM Membership Code</th>
                    <th>2016</th>
                    <th>2017</th>
                    <th>2018</th>
                    <th>2019</th>
                    <th>31th Dec"2020</th>
                    <th>10% Interest in Subscription</th>
                    <th>31th Aug"2021</th>
                    <th>Land Development Fee Dues</th>
                    <th>10% Interest in Subscription & Land Fee</th>
                    <th>Total Dues</th>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            
        </div>
    </div>
</div>
@endsection

@push('scripts')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
  let table = new DataTable('.table', {
    responsive: true
});
</script>
@endpush