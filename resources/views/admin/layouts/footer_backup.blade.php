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

<script>
  $(document).ready(function () {
    
    var counter = 0;

    $("#addrow").on("click", function () {

        counter = $('#myTable tr').length - 2;

        var newRow = $("<tr>");
        var cols = "";
        cols += '<td><input type="text" class="form-control mt-1" name="name' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control mt-1 ml-1" name="price' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control mt-1 ml-1"name="price' + counter + '"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-danger ml-2"  value="Delete"></td>';
        newRow.append(cols);
        if (counter == 10) $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
        $("table.order-list").append(newRow);
        counter++;
    });

    $("table.order-list").on("change", 'input[name^="price"]', function (event) {
        calculateRow($(this).closest("tr"));
        calculateGrandTotal();                
    });


    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();
        calculateGrandTotal();
        
        counter -= 1
        $('#addrow').attr('disabled', false).prop('value', "Add Row");
    });


});



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}
</script>
</body>
</html>



<script>
  $(document).ready(function () {
    $("#addrow").on("click", function () {
       
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td> <select id="inputState" class="form-control" name="item[]"><option selected>Choose...</option>@if ($stationary) @foreach ($stationary as $stationary) <option value="{{$stationary->id}}">{{ Ucfirst($stationary->item)}}</option> @endforeach  @endif </select></td>';
        cols += '<td><input type="text" class="form-control mt-1 ml-1" name="remain_quantity[]"/></td>';
        cols += '<td><input type="text" class="form-control mt-1 ml-1"name="quantity[]"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-danger ml-2"  value="Delete"></td>';
        newRow.append(cols);        
        $("table.order-list").append(newRow);       
    }); 

    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();
        calculateGrandTotal();
       });
    });
    </script>





---------------------------------------------------------------------------------------------------------------
{{-- running code --}}
<script>
  $(document).ready(function () {
    $("#addrow").on("click", function () {
       
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td> <select id="inputState" class="form-control" name="item[]"><option selected>Choose...</option>@if ($stationary) @foreach ($stationary as $stationary) <option value="{{$stationary->id}}">{{ Ucfirst($stationary->item)}}</option> @endforeach  @endif </select></td>';
        cols += '<td><input type="text" class="form-control mt-1 ml-1" name="remain_quantity[]"/></td>';
        cols += '<td><input type="text" class="form-control mt-1 ml-1"name="quantity[]"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-danger ml-2"  value="Delete"></td>';
        newRow.append(cols);        
        $("table.order-list").append(newRow);       
    }); 

    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();
        calculateGrandTotal();
       });
    });
    </script>
---------------------------------------------------------------------------------------------------------------

<script>
  $(document).ready(function () {
    $("#addrow").on("click", function () {
       
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td> <select id="inputState" class="form-control" name="item[]"><option selected>Choose...</option>@if ($stationary) @foreach ($stationary as $stationary) <option value="{{$stationary->id}}">{{ Ucfirst($stationary->item)}}</option> @endforeach  @endif </select></td>';
        cols += '<td><input type="text" class="form-control mt-1 ml-1" name="remain_quantity[]"/></td>';
        cols += '<td><input type="text" class="form-control mt-1 ml-1"name="quantity[]"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-danger ml-2"  value="Delete"></td>';
        newRow.append(cols);        
        $("table.order-list").append(newRow);       
    }); 

    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();
        calculateGrandTotal();
       });
    });
    </script>