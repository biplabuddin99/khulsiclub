@extends('layout.app')
@section('pageTitle',trans('Create Facilities'))
@section('pageSubTitle',trans('Create'))

@section('content')
<div class="row m-3">
    <div class="col-8 offset-2">
        <input type="text" name="" id="item_search" class="form-control  ui-autocomplete-input" placeholder="Search Product">
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 tbl-scroll">
        <table class="table mb-5">
            <thead>
                <tr class="bg-primary text-white">
                    <th class="p-2">Product Name</th>
                    <th class="p-2">Quantity</th>
                    <th class="p-2">Purchase Price</th>
                    <th class="p-2">Tax %</th>
                    <th class="p-2">Discount Type</th>
                    <th class="p-2">Discount</th>
                    <th class="p-2">Unit Cost</th>
                    <th class="p-2">Total Amount</th>
                    <th class="p-2">Action</th>
                </tr>
            </thead>
            <tbody id="details_data">

            </tbody>
        </table>
    </div>
</div>
@endsection
@push('scripts')
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>


<script>
    $(function() {
    $("#item_search").bind("paste", function(e){
        $("#item_search").autocomplete('search');
    } );
    $("#item_search").autocomplete({
        source: function(data, cb){
            
            $.ajax({
            autoFocus:true,
                url: "{{route(currentUser().'.member_search')}}",
                method: 'GET',
                dataType: 'json',
                data: {
                    name: data.term
                },
                success: function(res){
                console.log(res);
                    var result;
                    result = [{label: 'No Records Found ',value: ''}];
                    if (res.length) {
                        result = $.map(res, function(el){
                            return {
                                label: el.value +'--'+ el.label,
                                value: '',
                                id: el.id,
                                item_name: el.value
                            };
                        });
                    }

                    cb(result);
                },error: function(e){
                    console.log("error "+e);
                }
            });
        },

            response:function(e,ui){
            if(ui.content.length==1){
                $(this).data('ui-autocomplete')._trigger('select', 'autocompleteselect', ui);
                $(this).autocomplete("close");
            }
            //console.log(ui.content[0].id);
            },

            //loader start
            search: function (e, ui) {
            },
            select: function (e, ui) { 
                if(typeof ui.content!='undefined'){
                console.log("Autoselected first");
                if(isNaN(ui.content[0].id)){
                    return;
                }
                var item_id=ui.content[0].id;
                }
                else{
                console.log("manual Selected");
                var item_id=ui.item.id;
                }

                return_row_with_data(item_id);
                $("#item_search").val('');
            },   
            //loader end
    });


});
</script>
@endpush