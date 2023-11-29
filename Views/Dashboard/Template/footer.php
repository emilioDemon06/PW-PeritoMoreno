 <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Municipalidad Perito Moreno</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- plugins js -->
  <!--<script src="<?= PLUGINS ?>/Noty/noty.min.js"></script>-->
  <script src="<?= PLUGINS ?>/sweetalert2/sweetalert2.min.js"></script>
  <!--<script src="<?= PLUGINS ?>/DataTable/JSZip-3.10.1/jszip.min.js"></script>
  <script src="<?= PLUGINS ?>/DataTable/pdfmake-0.2.7/vfs_fonts.js"></script>
  <script src="<?= PLUGINS ?>/DataTable/datatables.min.js"></script>-->
  



<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-1.13.6/af-2.6.0/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/cr-1.7.0/date-1.5.1/r-2.5.0/sp-2.2.0/sl-1.7.0/datatables.min.js"></script>


  
  <!-- datatable para todas las paginas -->
  <script type="text/javascript">
    $(document).ready(function() {
      var t = $('#table').DataTable({


        aProcessing: true,
        aServerSide: true,
        

        //lenguaje en español de la tabla
        language: {
              url: `${base_url}/Assets/plugins/DataTable/datatable-spanish/spanish.json`
        },

        //paginación
        lengthMenu:[5,10,25],
        iDisplayLength:5,
        pagingType: 'full_numbers',
        //ocultar columnas
        columnDefs:[
          {
          targets:[0],
          visible:true,
          serchable:false,
          }
        ],
        //ordenar por nombre 
        order:[1,"asc"],
        //mostrar botones de exportacion
        dom: "lBfrtip",
        buttons:[
          {
            extend:"copyHtml5",
            text:"Copiar",
            titleAttr: "Copiar",
            className: "btn btn-info",
          },
          {
            extend:"excelHtml5",
            text:"Excel",
            titleAttr: "Exportar a Excel",
            className: "btn btn-success",
          },
          {
            extend:"pdfHtml5",
            text:"PDF",
            titleAttr: "Exportar a PDF",
            className: "btn btn-danger",
          },
        ],
      });

      //ordenar consecutivo de los registros
      t.on('order.dt search.dt', function() {
          t.column(0,{search:'applied', order:'applied'}).nodes().each(
              function(cell,i){
                cell.innerHTML = i+1;
              }
            );
      }).draw();
      //end ordenar consecutivo de los registros

    })
  </script>

  <!-- Vendor JS Files -->
  <!--<script src="<?= JS ?>/apexcharts/apexcharts.min.js"></script>-->
  <!--<script src="<?= JS ?>/bootstrap/bootstrap.bundle.min.js"></script>-->
  <!--<script src="<?= JS ?>/chart.js/chart.umd.js"></script>-->
  <!--<script src="<?= JS ?>/echarts/echarts.min.js"></script>-->
  <script src="<?= JS ?>/quill/quill.min.js"></script>
  <!--<script src="<?= JS ?>/simple-datatables/simple-datatables.js"></script>-->
 <script src="<?= JS ?>/tinymce/tinymce.min.js"></script>
  <script src="<?= JS ?>/php-email-form/validate.js"></script>
  <script src="<?= JS ?>/main.js"></script>


  <!-- constante js -->
    <script>
      const base_url = "<?= base_url; ?>";
  </script>
  <!-- Template Main JS File -->
  <script src="<?= ASSETS ?>/app/js/<?= $data['function_js'];?>"></script>
</body>

</html>