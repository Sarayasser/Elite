   <!-- Jquery JS-->
   <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
   <!-- Vendor JS-->
   <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
   <script src="{{ asset('vendor/datepicker/moment.min.js') }}"></script>
   <script src="{{ asset('vendor/datepicker/daterangepicker.js') }}"></script>

   <!-- Main JS-->
   <script src="{{ asset('js/global.js') }}"></script>
   
   <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
   <script>
      var placesAutocomplete = places({
        appId: "plNSRCZX77I9",
        apiKey: "69eca80b5722968b30b5f3495a0fb3c9",
        container: document.querySelector('#address-input')
      });
    </script>