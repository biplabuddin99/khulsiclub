@extends('frontend.memDashboard.memberApp')
@section('memberContent')
        
<section class="py-0">
    <div class="row">
        <div class="col-12 member-service">
            <div class="card shadow-sm ">
                <div class="card-header mem-password">
                    <h5>Member Due View</h5>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h5>CHITTAGONG KHULSHI CLUB LIMITED</h5>
                        <h6>Individual Member Transactions</h6>
                        <h6>For the year ending December 31st , 2014</h6>
                    </div>
                    <table class="table table-resposive table-bordered my-4">
                        <tr>
                            <th>NAME</th>
                            <td>Mashfiq Ahmed Rushad</td>
                            <th>STATUS</th>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <th>CONTACT</th>
                            <td>8801974434343</td>
                            <th>MEMBERSHIP DATE</th>
                            <td>24/12/2013</td>
                        </tr>
                        <tr>
                            <th>EMAIL</th>
                            <td>mashfiqa.rushad@gmail.com</td>
                            <th>MEMBERSHIP TYPE</th>
                            <td>Permanent Member</td>
                        </tr>
                        <tr>
                            <th>ADDRESS</th>
                            <td>100, Strand Road, Majhirghat, Chittagong.</td>
                            <th>MEMBERSHIP ID</th>
                            <td>PM0001</td>
                        </tr>
                    </table>
                    <table class="table table-resposive table-bordered my-4">
                        <tr class="bg-danger text-white">
                            <th>MONTH</th>
                            <th>DATE</th>
                            <th>DESCRIPTION</th>
                            <th>AMOUNT</th>
                            <th>PAID</th>
                            <th>TOTAL DUE</th>
                        </tr>
                        <tr>
                            <td>January</td>
                            <td>01/01/2014</td>
                            <td>Balance B/D</td>
                            <td>0.00</td>
                            <td>0.00</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>01/01/2014</td>
                            <td>L.D</td>
                            <td>200.00</td>
                            <td>0.00</td>
                            <td>200.00</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>01/01/2014</td>
                            <td>Subscription</td>
                            <td>500.00</td>
                            <td>0.00</td>
                            <td>500.00</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection