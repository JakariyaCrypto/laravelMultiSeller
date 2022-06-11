<script src="{{asset('backend/assets/summernote-0.8.18/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('backend/assets/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    
    <script src="{{asset('backend/assets/assets/js/main.js')}}"></script>
     
<!-- data tble -->
    <script src="{{asset('backend/assets/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('backend/assets/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
   
    <!-- include summernote css/js -->  
<script src="{{asset('backend/assets/summernote-0.8.18/summernote.min.js')}}"></script>

<!-- data tble -->

    <script src="{{asset('backend/assets/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('backend/assets/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('backend/assets/assets/js/widgets.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('backend/assets/switch-button-bootstrap/dist/bootstrap-switch-button.min.js')}}"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

  <script>
      setTimeout(() => {
          $('#alert').slideUp();
      }, 2500);
  </script>


  