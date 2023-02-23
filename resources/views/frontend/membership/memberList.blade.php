@extends('frontend.app')
@section('content')
<section class="about-support">
    <span class="shape"></span>
    <span class="shape2"></span>
    <span class="shape3"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="mb-0">Member List</h3>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end bg-transparent mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('front')}}" class="breadcrumb-item router-link-active">Members</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">member list</a>
                        </li>
                        <li class="breadcrumb-item">data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="container py-4">
    <div class="row">
        <div class="col-lg-3 mobileview">
            <div class="sidebar-menu vue-affix affix-top ">
                <div class="leftside-menu">
                    <div class="card  pb-4 me-4 rounded-10 bg-light">
                        <span class="shape"></span>
                        <span class="shape2"></span>
                        <div class="card-header">
                            <h4>Membership</h4>
                        </div>
                        <ul class="sideber-nav flex-culumn ps-3">
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="">Member List</a></li>
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="">Member Services</a></li>
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="">Non-Member Services</a></li>
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="">Membership Process</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 px-2 ">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="member-search">
                        <div class="search-body">
                            <h1>Member Search</h1>
                            <div class="searchBox">
                                <input type="text" id="search" placeholder="Company Name">
                                <span class="bi bi-search"></span>
                            </div>
                            <div class="search-menu">
                                <ul class="nav flex-row justify-content-between">
                                    <li>
                                        <a href="" class="char"><span>A</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>B</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>C</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>D</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>E</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>F</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>G</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>H</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>I</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>J</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>K</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>L</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>M</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>N</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>O</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>P</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>Q</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>R</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>S</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>T</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>U</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>V</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>W</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>X</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>Y</span></a>
                                    </li>
                                    <li>
                                        <a href="" class="char"><span>Z</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <fieldset class="data-search-body border">
                        <legend style="width: 155px;">
                            <button class="btn btn-explore" type="button" data-bs-toggle="collapse" data-bs-target="#advance-search" aria-expanded="false" aria-controls="advance-search">
                                Advance Search
                            </button>
                        </legend>
                        <div id="advance-search" class="py-2 px-5 collapse">
                            <form action="" class="row">
                                <div class="form-group pb-3">
                                    <label for="all_member"> <input type="radio" id="all_member" name="radio" checked="checked"> All</label>
                                    <label for="donor_member"> <input type="radio" id="donor_member" name="radio"> Donor</label>
                                    <label for="life_member"> <input type="radio" id="life_member" name="radio"> Life Member</label>
                                    <label for="service_member"> <input type="radio" id="service_member" name="radio"> Service Member</label>
                                    <label for="pm_member"> <input type="radio" id="pm_member" name="radio"> Parmanent Member</label>
                                    <label for="tem_member"> <input type="radio" id="temp_member" name="radio"> Temporary Member</label>
                                    <label for="honor_member"> <input type="radio" id="honor_member" name="radio"> Honorary Member</label>
                                    <label for="corporate_member"> <input type="radio" id="corporate_member" name="radio"> Corporate Member</label>
                                    <label for="diplomate_member"> <input type="radio" id="diplomate_member" name="radio"> Diplomate Member</label>
                                </div>
                                <div class="form-group col-lg-2 p-1">
                                    <label for="" class="mb-0">Service</label>
                                    <input type="text" name="service" id="" class="form-control form-control-sm shadow-none">
                                </div>
                                <div class="form-group col-lg-2 p-1">
                                    <label for="" class="mb-0">Product</label>
                                    <input type="text" name="product" id="" class="form-control form-control-sm shadow-none">
                                </div>
                                <div class="form-group col-lg-2 p-1">
                                    <label for="" class="mb-0">Location</label>
                                    <input type="text" name="location" id="" class="form-control form-control-sm shadow-none">
                                </div>
                                <div class="form-group col-lg-3 p-1">
                                    <label for="" class="mb-0">Membership ID</label>
                                    <input type="text" name="member_id" id="" class="form-control form-control-sm shadow-none">
                                </div>
                                <div class="form-group col-lg-2 p-1">
                                    <label for="" class="mb-0">Rep. Name</label>
                                    <input type="text" name="repName" id="" class="form-control form-control-sm shadow-none">
                                </div>
                                <div class="form-group col-lg-1 align-self-end p-1">
                                    <button type="button" class="btn btn-sm btn-danger">
                                    <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-lg-12">
                    <div class="card card-body shadow-sm">
                        <div class="search-list-item row ">
                            <div class="col-lg-2 align-self-center text-center">
                                <img src="" alt="Logo">
                            </div>
                            <div class="col-lg-2 text-center border-right pl-0 pr-0">
                                <h1>[AF-03-09-017]</h1>
                                <h5>Affiliate Member</h5>
                                <a href="" onclick="alert('Sorry!! profile has not uploaded yet')" class="btn-custom">[PDF Profile]</a>
                            </div>
                            <div class="col-lg-6">
                                <h4><a href="">Link3 Technologies Limited</a></h4>
                                <small>Establishment: May 2000</small>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi ad itaque porro dicta minus excepturi consectetur illo ea corporis sunt?</p>
                            </div>
                            <div class="col-lg-2 align-self-center text-center">
                                <a href="" class="btn btn-sm btn-outline-explore">Details</a>
                            </div>
                        </div>
                        <div class="search-list-item row ">
                            <div class="col-lg-2 align-self-center text-center">
                                <img src="" alt="Logo">
                            </div>
                            <div class="col-lg-2 text-center border-right pl-0 pr-0">
                                <h1>[AF-03-09-017]</h1>
                                <h5>Affiliate Member</h5>
                                <a href="" onclick="alert('Sorry!! profile has not uploaded yet')" class="btn-custom">[PDF Profile]</a>
                            </div>
                            <div class="col-lg-6">
                                <h4><a href="">Link3 Technologies Limited</a></h4>
                                <small>Establishment: May 2000</small>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi ad itaque porro dicta minus excepturi consectetur illo ea corporis sunt?</p>
                            </div>
                            <div class="col-lg-2 align-self-center text-center">
                                <a href="" class="btn btn-sm btn-outline-explore">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
