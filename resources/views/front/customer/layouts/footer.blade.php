    </div>
    <!--end wrapper-->

    <!-- Bootstrap bundle JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script> --}}
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!--app-->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script>
      $('#create_ticket').on('hidden.bs.modal', function(e) {
          $(this).find("input,textarea,select").val('').end();
      })
    </script>
    </body>

    </html>
