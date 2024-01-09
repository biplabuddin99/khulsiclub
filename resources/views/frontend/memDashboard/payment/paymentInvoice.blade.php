@extends('frontend.memDashboard.memberApp')
@section('memberContent')
        
<section class="py-0">
    <div class="row">
        <div class="col-12 member-service">
            <div class="card shadow-sm ">
                <div class="card-header mem-password">
                    <h5>Payment Invoice</h5>
                </div>
                <div class="card-body table-responsive">
                    <div class="text-center">
                        <button class="btn btn-info text-white">Download</button>
                    </div>
                    <style>

                        .tbl_border{
                        border: 1px solid;
                        border-collapse: collapse;
                        }
                    </style>
                    <div class="logo" style="border-bottom: 2px dashed;">
                        <img src="{{asset('uploads/settings/header_logo/'.$setting?->header_logo)}}" width="400px" height="auto" alt="" style="padding-bottom: 10px;">
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="ref"><p>Ref: General/Invoice/GE-16-06-793/13049</p></div>
                        <div class="qr-code">Invoice no 34857398573957857</div>
                    </div>
                    <div class="">
                        <p>January, 01 2024</p>
                        <span>Invoice to</span><br>
                        <span>Chittagong Khulshi Club Limited</span><br>
                        <span>Foy'slake, Khulshi, Chattogram, Bangladesh</span>
                        <p style="margin-top: 1rem;">Attn: <b>Md. Rafique Uddin Babul, Chairman &#38; Managing Director</b></p>
                    </div>
                    <div class="text-center" style="margin-bottom: 1.6rem;">
                        <button style="border: 1px solid rgb(163, 161, 161); border-radius: 8%; background-color: transparent; padding: 5px 10px 5px 10px; font-size: 20px;">Invoice</button>
                    </div>
                    <div class="">
                        <table style="width: 100%;">
                            <tr class="tbl_border" style="text-align: center;">
                                <td class="tbl_border" style="padding: 3px;">SL NO</td>
                                <td class="tbl_border" style="padding: 3px;">Description</td>
                                <td class="tbl_border" style="padding: 3px;">Amount</td>
                            </tr class="tbl_border">
                            <tr class="tbl_border" style="text-align: center;">
                                <td class="tbl_border" style="padding: 3px;">01</td>
                                <td class="tbl_border" style="padding: 3px;">Annual Subscription Fee- 2023</td>
                                <td class="tbl_border" style="padding: 3px;">10,000.00</td>
                            </tr>
                            <tr class="tbl_border" style="text-align: center;">
                                <th colspan="2" class="tbl_border" style="text-align: right; padding: 3px;">Total=</th>
                                <th class="tbl_border" style="padding: 3px;">10,000.00</th>
                            </tr>
                        </table>
                        <div style="margin-top: 1rem;">
                            <p>Inword: <b>Ten Thousand Only</b></p>
                            <p style="text-align: justify;">Please make payment in favor of "BASIS" by Cash Deposit or Pay Order or Cheque directly to
                                Prime Bank Limited, Kawran Bazar branch (Account No- "2113317014064") please take 2 (two)
                                copies of invoice to the bank and after making successful payment, you are requested to send the
                                scanned copy of the same with bank seal to payment@basis.org.bd for updating at BASIS end</p>
                            <p style="margin-bottom: .5rem;">OR</p>
                            <p>You may also pay the fee using the online payment gateway of BASIS.</p>
                            <p style="color: red;">Please note that, as per the section no. 6.1 of our Memorandum of Association, the last date for payment is February 28, 2023.</p>
                        </div>
                        <div style="margin-top: 2rem; margin-bottom: 3rem;">
                            <span>Note:</span>
                            <div style="padding-left: 2rem;">
                                <span>1. For Membership Certificate, you need to pay the annual subscription and complete your company
                                    profile (with Compliance Information) from BASIS website.</span><br>
                                <span>2. For Membership Certificate, you need to pay the annual subscription and complete your company
                                    profile (with Compliance Information) from BASIS website.</span><br>
                                <span>3. For Membership Certificate, you need to pay the annual subscription and complete your company
                                    profile (with Compliance Information) from BASIS website.</span>
                            </div>
                            <div style="text-align: center; margin-top: 10px;">
                                <span><em>"This is an electronically generated letter or invoice, no signature is required"</em></span>
                            </div>
                        </div>
                        <div class="" style="border-top: 2px dashed; margrin-bottom: 10px;">
                            <img class="img-fluid" src="{{asset('images/weaccept.jpeg')}}" width="100%" alt="image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js" defer></script>
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script>
    function downloadPDF(divName) {
        var element = document.getElementById(divName);

        html2pdf(element, {
            margin: 10,
            filename: 'invoice.pdf',
            image: { type: 'png', quality: 0.98 },
            html2canvas: { scale: 1 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        });
    }
</script>
@endpush