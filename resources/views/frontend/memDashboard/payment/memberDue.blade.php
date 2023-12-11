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
                    <div class="text-center" style="margin-bottom: 3rem;">
                        <h5><b>CHITTAGONG KHULSHI CLUB LIMITED</b></h5>
                        <h6><b>Individual Member Transactions</b></h6>
                        <h6><b>For the year ending December 31st , 2014</b></h6>
                    </div>
                    <div class="table-responsive" style="margin-bottom: 3rem;">

                        <table class="table align-middle table-bordered">
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
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle table-bordered">
                            <tbody>
                                <tr class="bg-danger text-center text-white">
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
                                    <td class="text-end">0.00</td>
                                    <td class="text-end">0.00</td>
                                    <td class="text-end">0.00</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>01/01/2014</td>
                                    <td>L.D</td>
                                    <td class="text-end">200.00</td>
                                    <td class="text-end">0.00</td>
                                    <td class="text-end">200.00</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>01/01/2014</td>
                                    <td>Subscription</td>
                                    <td class="text-end">500.00</td>
                                    <td class="text-end">0.00</td>
                                    <td class="text-end">500.00</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end">TOTAL</td>
                                    <td class="text-end">700.00</td>
                                    <td class="text-end">00.00</td>
                                    <td class="text-end">700.00</td>
                                </tr>
                                <tr>
                                    <td>February</td>
                                    <td>01/01/2014</td>
                                    <td>Balance B/D</td>
                                    <td class="text-end">0.00</td>
                                    <td class="text-end">0.00</td>
                                    <td class="text-end">0.00</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>01/01/2014</td>
                                    <td>L.D</td>
                                    <td class="text-end">200.00</td>
                                    <td class="text-end">0.00</td>
                                    <td class="text-end">200.00</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>01/01/2014</td>
                                    <td>Subscription</td>
                                    <td class="text-end">500.00</td>
                                    <td class="text-end">0.00</td>
                                    <td class="text-end">500.00</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end">TOTAL</td>
                                    <td class="text-end">700.00</td>
                                    <td class="text-end">00.00</td>
                                    <td class="text-end">700.00</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end">NET TOTAL</td>
                                    <td class="text-end">13,200.00</td>
                                    <td class="text-end">1,000.00</td>
                                    <td class="text-end">12,200.00</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>01/01/2014</td>
                                    <td>Late Fine 10%</td>
                                    <td class="text-end"></td>
                                    <td class="text-end"></td>
                                    <td class="text-end">12,220.00</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>01/01/2014</td>
                                    <td>Balance C/D</td>
                                    <td class="text-end"></td>
                                    <td class="text-end"></td>
                                    <td class="text-end">13,420.00</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection