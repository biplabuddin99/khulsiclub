@extends('frontend.memDashboard.memberApp')
@section('memberContent')
        
<section class="py-0">
    <div class="row">
        <div class="col-12 member-service">
            <div class="card shadow-sm ">
                <div class="card-header mem-password">
                    <h5>Payment Invoice</h5>
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-info text-white no_print" onclick="downloadPDF('money-receipt')">Download</button>
                </div>
                <div class="card-body table-responsive" id="money-receipt">
                    <div class="d-flex justify-content-between">
                        <div>
                            <img src="{{asset('uploads/settings/header_logo/'.$setting?->header_logo)}}" width="250px" height="auto" alt="" style="padding-bottom: 10px;">
                        </div>
                        <div style="margin-right: 8px;">
                            <p style="margin: 0; font-size:21px; font-weight:bold;"><b>CHITTAGONG KHULSHI CLUB LIMITED</b></p>
                            <p style="border-bottom: 2px solid; margin: 0; font-size: 10.5px;">Holding No - 1471/2184/1, Concord Amusement. Foy'slake, Khulshi, Chattogram, Bangladesh</p>
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: 10px; margin-bottom: 10px;">
                        <button style="border: 1px solid; padding: 5px; font-size: 18px; font-weight:bolder; background-color: transparent;">MONEY RECEIPT</button>
                    </div>
                    <div class="" style="font-size: 13px;">
                        <table style="width: 100%;">
                            <tr style="text-align: center;">
                                <td style="padding: 3px; width: 5%; text-align:left;">SL</td>
                                <td style=" border-bottom: 1px dashed; width: 25%;"><b>{{str_pad($data->id,6,'0',STR_PAD_LEFT)}}</b></td>
                                <td></td>
                                <td style="padding: 3px; width: 5%;">Date: </td>
                                <td style=" border-bottom: 1px dashed; width: 25%;"><b>{{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y')}}</b></td>
                            </tr>
                        </table>

                        <table style="width: 100%; margin-top: 2rem;">
                            <tr>
                                <td style="padding-top: 10px; width: 15%;">Invoice:</td>
                                <td style=" border-bottom: 1px dashed;text-transform: uppercase;"><b>INV-{{ \Carbon\Carbon::parse($data->created_at)->format('Y')}}-{{$data->id}}</b></td>
                                <td style="padding-top: 10px; width: 15%; text-align: center;">Transaction ID: </td>
                                <td style=" border-bottom: 1px dashed;text-transform: uppercase;"><b>{{$data->txnid}}</b></td>
                            </tr>
                        </table>
                        <table style="width: 100%;">
                            <tr>
                                <td style="padding-top: 10px; width: 25%;">Received with thanks from:</td>
                                <td style=" border-bottom: 1px dashed;"><b>{{$data->member?->full_name}}</b></td>
                            </tr>
                        </table>

                        <table style="width: 100%;">
                            <tr>
                                <td style="padding-top: 10px; width: 4%;">TK:</td>
                                <td style=" border-bottom: 1px dashed;"><b>{{$data->amount}}</b></td>
                                <td style="padding-top: 10px; width: 12%; text-align: center;">In Words:</td>
                                <td style=" border-bottom: 1px dashed;text-transform: uppercase;"><b>{{getBangladeshCurrency($data->amount)}}</b></td>
                            </tr>
                        </table>
                        <table style="width: 100%;">
                            <tr>
                                <td style="padding-top: 10px; width: 17%;">Payment Method:</td>
                                <td style=" border-bottom: 1px dashed;text-transform: uppercase;"><b>{{$data->method}}</b></td>
                                <td style="padding-top: 10px; width: 17%; text-align: center;">Payment Type:</td>
                                <td style=" border-bottom: 1px dashed;text-transform: uppercase;"><b>Online</b></td>
                            </tr>
                        </table>
                        <table style="width: 100%;">
                            <tr>
                                <td style="padding-top: 10px; width: 15%;">Payment For:</td>
                                <td style=" border-bottom: 1px dashed;"><b>{{$data->member?->full_name}}</b></td>
                            </tr>
                        </table>
                        <div style="margin-top: 1rem;">
                            <span><b>Disclaimer:-</b><em> This is a system-generated electronic receipt, hence no physical signature is required for the purpose of authentication. </em></span>
                        </div>
                        <div style="text-align: center; margin-top: 10px; margin-bottom: 20rem;">
                            <span><b>Please reserve the money receipt copy</b></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js" defer></script>
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script>
    function downloadPDF(divName) {
        var element = document.getElementById(divName);

        html2pdf(element, {
            margin: 10,
            filename: 'money-receipt.pdf',
            image: { type: 'jpeg', quality: 1 },
            html2canvas: { scale: 2, useCORS: true },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        });
    }
</script>
@endpush
