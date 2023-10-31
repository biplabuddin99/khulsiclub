@extends('frontend.app')
@section('pageTitle',trans('Home'))
@section('pageSubTitle',trans('List'))

@section('content')
<section class="facilities-main benefit-of-member px-5 d-none d-sm-block pt-3">
      <div class="facilities ">
        <!-- Gallery end -->
        <!-- member reg. start -->
        <div class="justify-content-center bg-light member-section shadow">
          <div class="p-lg-5 p-md-4 rounded shadow">
            <div class="row member-inner">
              <div class="col-12">
                <p class="animate-title">Benefits of Members</p>
              </div>
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-sm-6 col-md-3">
                    <ul class="navbar-nav benefit">
                    @forelse ($benefit as $b)
                      <li role="button" class="nav-item" onmouseover="show_details({{$b->id}})">
                        <i class="bi bi-caret-right-fill"></i> <span>{{$b->benefit}}</span>
                      </li>
                    @empty
                      <li class="nav-item">
                          <i class="bi bi-caret-right-fill"></i> <span>Advocacy for Software & ITES</span>
                      </li>
                    @endforelse
                    </ul>
                  </div>
                  
                  <div class="col-sm-6 col-md-9">
                    @forelse ($benefit as $i=>$b)
                    <span class="description des{{$b->id}} @if($i!=0) hidden @endif ">
                      <i class="bi bi-file-earmark-font-fill"></i> <span>{{$b->description}}</span>
                    </span>
                  @empty
                    <p class="nav-item">
                        <i class="bi bi-caret-right-fill"></i> <span>Advocacy for Software & ITES</span>
                    </p>
                  @endforelse
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <!-- member reg. end -->
      </div>
</section>
<section class="facilities-main px-2 d-sm-none">
    <div class="facilities ">
      <!-- Gallery end -->
      <!-- member reg. start -->
      <div class="justify-content-center bg-light member-section shadow">
        <div class="p-lg-5 p-md-4 rounded shadow">
          <div class="row p-1 member-inner">
            <div class="col-sm-6 col-md-12 col-lg-12 col-xl-12 text-center bg-transparent">
              <p class="animate-title" style="font-size: 20px;">Benefits of Members</p>
            </div>
            <div class="col-sm-6 col-md-12 col-lg-12 col-xl-12 text-center">
              <div class="row">
                <div class="col-sm-6 col-md-3">
                  <ul class="navbar-nav benefit" style="padding-left: 8px !important; !important; padding-bottom: 0 !important; background-color: transparent !important;">
                  @forelse ($benefit as $b)
                    <li role="button" class="nav-item" onmouseover="show_details({{$b->id}})">
                      <i class="bi bi-caret-right-fill"></i> <span>{{$b->benefit}}</span>
                    </li>
                  @empty
                    <li class="nav-item">
                        <i class="bi bi-caret-right-fill"></i> <span>Advocacy for Software & ITES</span>
                    </li>
                  @endforelse
                  </ul>
                </div>
                
                <div class="col-sm-6 col-md-9">
                  @forelse ($benefit as $i=>$b)
                  <span class="description des{{$b->id}} @if($i!=0) hidden @endif ">
                    <i class="bi bi-file-earmark-font-fill"></i> <span>{{$b->description}}</span>
                  </span>
                @empty
                  <p class="nav-item">
                      <i class="bi bi-caret-right-fill"></i> <span>Advocacy for Software & ITES</span>
                  </p>
                @endforelse
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
</section>
  @endsection
@push('scripts')
<script>
  function show_details(e){
    $('.description').hide();
    $('.des'+e).show();
  }
</script>
<script>
  ScrollReveal({ 
    reset: true ,
    distance: '60px',
    duration: 800,
    delay: 200
  });
  ScrollReveal().reveal('.apply-text', { delay: 200,  origin: 'right' });
  ScrollReveal().reveal('.news-event-text, .animate-title', { delay: 200,  origin: 'left' });
  ScrollReveal().reveal('.benefit li', { delay: 200,  origin: 'left', interval: 30 });
</script>
@endpush