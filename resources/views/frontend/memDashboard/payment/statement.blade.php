@extends('frontend.memDashboard.memberApp')

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@section('memberContent')
        
<section class="py-0">
    <div class="row">
        <div class="col-12 member-service">
            <div class="card shadow-sm ">
                <div class="card-header mem-password">
                    <h5>Account Statement</h5>
                </div>
                <div class="card-body table-responsive" id="result_show">
                    
                
					<div class="d-none only_print">
						<div class="text-center" style="margin-bottom: 3rem;">
							<h5><b>CHITTAGONG KHULSHI CLUB LIMITED</b></h5>
							<h6><b>Individual Member Transactions</b></h6>
							<h6><b>From {{\Carbon\Carbon::parse($startDate)->format('dS F Y')}} To {{\Carbon\Carbon::parse($endDate)->format('dS F Y')}}</b></h6>
						</div>
						<div class="table-responsive" style="margin-bottom: 3rem;">
	
							<table class="table align-middle table-bordered">
								<tr>
									<th>NAME</th>
									<td style="width:30%">{{$member->given_name}} {{$member->surname}}</td>
									<th>STATUS</th>
									<td>
										@if($member->status == 0) Pending
										@elseif ($member->status == 1) Applied for approval
										@elseif ($member->status == 2) Approved
										@else Suspended
										@endif
									</td>
								</tr>
								<tr>
									<th>CONTACT</th>
									<td>{{$member->cell_number}}</td>
									<th>MEMBERSHIP DATE</th>
									<td>{{\Carbon\Carbon::parse($member->created_at)->format('dS F Y')}}</td>
								</tr>
								<tr>
									<th>EMAIL</th>
									<td>{{$member->email}}</td>
									<th>MEMBERSHIP TYPE</th>
									<td>{{$member->membership_type?->member_type}}</td>
								</tr>
								<tr>
									<th>ADDRESS</th>
									<td>{{$member->village}}, {{$member->block}}, {{$member->police_station}}, {{$member->post_office}}, {{$member->district}}, {{$member->country}}</td>
									<th>MEMBERSHIP ID</th>
									<td>{{$member->membership_no}}</td>
								</tr>
							</table>
						</div>
					</div>
					<form method="get" action="" id="form_hide" class="no_print">
						<div class="row pb-4">
							<div class="col-sm-4">
								<div class="form-group">
									<label for="accDate">Statement Date</label>
									<div class="input-group">
										<input class="form-control date-picker" name="current_date" id="inputDate" type="text" data-date-format="dd-mm-yyyy" required />
										<span class="input-group-addon"><i class="fa fa-calendar bigger-110"></i></span>
									</div>
								</div>
							</div>
							<div class="col-sm-4 pt-4">
								<button class="btn btn-sm btn-danger" type="submit"> Get Report </button>
							</div>
							<div class="col-sm-4 pt-4">
								<a href="#" class="no_print float-end" title="print" id="addCompanyDescription" onclick="printReport('result_show')"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 16 16"><g fill="currentColor"><path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/><path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102c.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645a19.701 19.701 0 0 0 1.062-2.227a7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136c.075-.354.274-.672.65-.823c.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538c.007.187-.012.395-.047.614c-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686a5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465c.12.144.193.32.2.518c.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416a.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95a11.642 11.642 0 0 0-1.997.406a11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238c-.328.194-.541.383-.647.547c-.094.145-.096.25-.04.361c.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193a11.666 11.666 0 0 1-.51-.858a20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41c.24.19.407.253.498.256a.107.107 0 0 0 .07-.015a.307.307 0 0 0 .094-.125a.436.436 0 0 0 .059-.2a.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198a.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283c-.04.192-.03.469.046.822c.024.111.054.227.09.346z"/></g></svg></a>
							</div>
						</div>
					</form>
				
	
					<div class="tbl_scroll">
						<div class="d-none mb-2 only_print" id="print-content"></div>
						<table class="table align-middle table-bordered">
							<thead>
								<tr class="tbl_border">
									<td class="tbl_border">Trans Date</td>
									<td class="tbl_border">Voucher No</td>
									<td class="tbl_border">Particulars</td>
									<td class="tbl_border">Due</td>
									<td class="tbl_border">Pay</td>
									<td class="tbl_border">Balance</td>
								</tr>
							</thead>
							<tbody>
								@php $balance=$deb=$cre=0; @endphp
								@if($accData)
									@php $sumdr=$accOldData->sum('dr');$sumcr=$accOldData->sum('cr'); @endphp
								@php if($opening_bal>0) $sumdr+=$opening_bal; else $sumcr+=$opening_bal; @endphp
									<tr class="tbl_border">
										<td class="tbl_border">{{date("d M, Y",strtotime($startDate))}}</td>
										<td class="tbl_border"></td>
										<td class="tbl_border">B/F</td>
										<td class="tbl_border"></td>
										<td class="tbl_border"></td>
										<td class="tbl_border">
											@if($sumdr>$sumcr)
												{{ ($sumdr - $sumcr) }} Due
												@php $balance+= ($sumdr - $sumcr); @endphp
											@elseif($sumdr<$sumcr)
												{{ ($sumcr - $sumdr) }} Balance
												@php $balance+= ($sumdr - $sumcr); @endphp
											@else
													0
											@endif
										</td>
									</tr>
									@foreach($accData as $acc)
										@if($acc->dr>0)@php $balance+=$acc->dr; @endphp @endif
										@if($acc->cr>0)@php $balance-=$acc->cr; @endphp @endif
										<tr class="tbl_border">
											<td class="tbl_border">{{date("d M, Y",strtotime($acc->rec_date))}}</td>
											<td class="tbl_border">{{$acc->jv_id}}</td>
											<td class="tbl_border">{{$acc->purpose}}</td>
											<td class="tbl_border">{{money_format((float)$acc->dr, 2, '.', '')}} @php $deb+=$acc->dr; @endphp</td>
											<td class="tbl_border">{{money_format((float)$acc->cr, 2, '.', '')}} @php $cre+=$acc->cr; @endphp</td>
											<td class="tbl_border">{{$balance>0?money_format(abs($balance))." Due":money_format(abs($balance))." Balance"}}</td>
										</tr>
									@endforeach
								@endif
							</tbody>
							<tfoot>
								<tr class="tbl_border">
									<th class="tbl_border" colspan="4" style="text-align:right">Total</th>
									<th class="tbl_border"><?= money_format($deb) ?></th>
									<th class="tbl_border"><?= money_format($cre) ?></th>
									<th class="tbl_border">{{$balance>0?money_format(abs($balance))." Due":money_format(abs($balance))." Balance"}}</th>
								</tr>
							</tfoot>
						</table>
					</div>
					<div class="d-none only_print text-center">
						<table style="width: 100%; margin-top: 4rem;">
							<tr style="padding-top: 5rem;">
								<td style="text-align: center;"><span style="border-bottom: solid 1px;">{{encryptor('decrypt', request()->session()->get('userName'))}}</span></td>
								<th style="text-align: center;"></th>
								<th style="text-align: center;"></th>
							</tr>
							<tr style="padding-top: 5rem;">
								<th style="text-align: center;"><h6>PREPARED BY</h6></th>
								<th style="text-align: center;"><h6>CHECKED BY</h6></th>
								<th style="text-align: center;"><h6>VERIFIED BY</h6></th>
							</tr>
						</table>
					</div>
				</div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
    window.onload=function(){
        
        jQuery(function($) {
    		//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
    		$('.date-picker').daterangepicker({
    		    'startDate': "{{date('d-m-Y',strtotime($startDate))}}",
                'endDate': "{{date('d-m-Y',strtotime($endDate))}}",
    			'applyClass' : 'btn-sm btn-success',
    			'cancelClass' : 'btn-sm btn-default',
    			locale: {applyLabel: 'Apply',cancelLabel: 'Cancel',format:'DD-MM-YYYY',separator: ' / '},
    			ranges: {
    			   'Today': [moment(), moment()],
    			   'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
    			   'Last 7 Days': [moment().subtract(6, 'days'), moment()],
    			   'Last 30 Days': [moment().subtract(29, 'days'), moment()],
    			   'This Month': [moment().startOf('month'), moment().endOf('month')],
    			   'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    			}
    		}).prev().on(click, function(){$(this).next().focus();});
            
    		setTimeout(function() {$('.alert').hide('slowly');},3000);
    	});
    }
</script>
<script>
    function printReport(divName) {
        $('.acc-head-report').removeClass('d-none');
        var selectedValue = $('#head_id option:selected').text();
        var inputDate = $('#inputDate').val();

		var printContentDiv = document.getElementById('print-content');
		// printContentDiv.innerHTML = '<table style="width: 100%;">' +
		// 								'<tr>' +
		// 								'<th style="width: 15%;"><label>Head Name:</label></th>' +
		// 								'<td style="width: 48%;">' + selectedValue + '</td>' +
		// 								'<th style="width: 10%;"><label>Year:</label></th>' +
		// 								'<td style="width: 27%;">' + inputDate + '</td>' +
		// 								'</tr>' +
		// 							'</table>';
        var prtContent = document.getElementById(divName);

        var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}" type="text/css"/>');

		var style = '<style media="print">.no_print{ display:none}body{color:#000 !important;background-color:#FFF; font-size:14px; padding-top:50px}.only_print{ display:block !important;} .tbl_border{ border: 1px solid; border-collapse: collapse;}</style>';
        WinPrint.document.write(style);
                        
		//WinPrint.document.write(printContentDiv.innerHTML);
        WinPrint.document.write(prtContent.innerHTML); // Include the rest of the content
        WinPrint.document.close();
        WinPrint.onload = function () {
            WinPrint.focus();
            WinPrint.print();
           WinPrint.close();
        }
    }
</script>
@endpush
