
 <!-- /.content-wrapper -->
 <footer class="main-footer">
    <strong>&copy;<a href="http://rni.nic.in/">Ministry of New and Renewable Energy</a>.</strong>
    All rights reserved.
   
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
 
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{-- Datatable script file included --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>


{{--/ Datatable script file included --}}

<script>
  function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);
  $(document).ready(function() {
 $('#example').DataTable();
} );
 </script>
{{-- @php
    echo 'value --'.$base_url;
    die();
@endphp --}}
@if ($base_url == "order_request")
    <script>
      $(document).ready(function () {        
        var counter = 0;
        $("#addrow").on("click", function () {
            counter = $('#myTable tr').length - 2;
            var newRow = $("<tr class='dynamicRow' id = 'dynamicRow_"+ counter+"'>");
            var cols = "";

            cols += '<td><input type="text" class="form-control mt-1 ml-1 text-bold" id ="bill_no_' + counter + '" name="bill_no[]"  readonly /></td>';
            cols += '<td><input type="text" class="form-control mt-1 ml-1" id ="bill_date_' + counter + '" name="bill_date[]" onchange="return onchangeValidate (this)" required/></td>';   
            cols += '<td> <select id="item_' + counter + '" class="form-control variable_priority unique required" name="item[]" onchange="onchangeSelect(this); setStationaryLimit(this);" required><option value="" selected>Choose...</option>@if ($stationary) @foreach ($stationary as $stationary) <option value="{{$stationary->id}}" data-quantity_issued={{ Ucfirst($stationary->quantity_issued)}}>{{ Ucfirst($stationary->item)}}</option> @endforeach  @endif </select></td>';
            cols += '<td><input type="text" class="form-control mt-1 ml-1 text-bold" id ="quantity_issued_' + counter + '" name="remain_quantity[]"  readonly /></td>';
            cols += '<td><input type="text" class="form-control mt-1 ml-1" id ="quantity_' + counter + '" name="quantity[]" onchange="return onchangeValidate (this)" required/></td>';   
            cols += '<td><input type="button" class="ibtnDel btn btn-danger ml-2"  value="Delete" required></td>';
            newRow.append(cols);
            if (counter == 10)
              $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
              $("table.order-list").append(newRow);
            counter++;
        });

        $("table.order-list").on("change", 'input[name^="quantity[]"]', function (event) {
            calculateRow($(this).closest("tr"));
            calculateGrandTotal();                
        });

    // Remove row
        $("table.order-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            calculateGrandTotal();
            
            counter -= 1
            $('#addrow').attr('disabled', false).prop('value', "Add Row");
        });


    });

    function calculateRow(row) {
        var price = +row.find('input[name^="quantity[]"]').val();

    }

    function calculateGrandTotal() {
        var grandTotal = 0;
        $("table.order-list").find('input[name^="quantity[]"]').each(function () {
            grandTotal += +$(this).val();
        });
        $("#grandtotal").text(grandTotal);
    }
</script> 
@endif

{{-- fetch value from jquery --}}
<script>
  function onchangeSelect(thizz) {
    var id = thizz.id   
    console.log(id)
    var count = id.split("_")[1];
  //   console.log(count)
  //  console.log($(thizz).find('option:selected').attr('data-quantity_issued'))
   $('#quantity_issued_'+count).val($(thizz).find('option:selected').attr('data-quantity_issued'));
 }
 </script>
{{-- /fetch value from jquery --}}

<script>
  function onchangeValidate (thizz){
    var id = thizz.id
    var num = id.split("_")[1];
    var qty = parseInt(document.getElementById("quantity_"+num).value);
    var remain_qty = parseInt(document.getElementById("quantity_issued_"+num).value);
    if(remain_qty < qty) {  
      alert('You cannot enter a value greater than the Remaing Qty value');   
      document.getElementById("quantity_"+num).value='';
      return false;
    } 
  }
</script>
  $(document).ready()

<script>
function setStationaryLimit(el){
  var intKeyCount = '';
  var id = el.id;  //get that id
  var num = id.split("_")[1];
  
  var value = $(el).val(); //get that value
  // iterate through all selects
  $('.dynamicRow select').each(function(){
    // if match value
    if($(this).val() === value){
      intKeyCount++; //increment
    }

  });

  if (intKeyCount > 1) {
    $(el).find("option:selected").prop('disabled',true);
    alert("you cannot choose again");
    //or disable that option
    $(el).find("option:selected").prop('disabled',true);
    $("#dynamicRow_"+num).css("display", "none");
  }
} 
</script>


</body>
</html>
