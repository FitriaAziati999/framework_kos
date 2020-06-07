   <!-- Footer -->
   <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>


  

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url()?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url()?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url()?>/assets/js/sb-admin-2.min.js"></script>
  <!-- Custom scripts nama foto-->
  <script>
  $('.custom-file-input').on('change', function(){
    let fileName = $(this).val().split('\\').pop(); 
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
    }); 
  </script>


</body>

</html>
