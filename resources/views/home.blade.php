@extends('template')
@section('content')

	@include('slidebar')
    @include('search')
    <!--................ Sort By Date .............. -->
      <div class="container">
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <label class="form-control-label">Sort By</label>
            <select class="form-control" id="sortBy">
              <option value="" selected>Selected</option>
              <option value="date" id="date">Date</option>
              <option value="price" id="price">Pirce</option>
            </select>
          </div>
        </div>
      </div>
    <!-- ..........Show Apartment............. -->
    <section id="aa-latest-property">
      <div class="container">
        <div class="aa-latest-property-area">
          <div class="aa-title">
            <h2>Latest Apartments</h2>
            <span></span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit ea nobis quae vero voluptatibus.</p>         
          </div>

    	@include('allapartment')

    		</div>
   		</div>
    </section>
    <!-- ..........end Apartment.............. -->
    <!-- Jquery -->
    <script type="text/javascript" src="{{ asset('template/js/jquery.min.js') }}"></script>
     <script>

        $(function(){
          $('#sortBy').on('click',function () {
              var id = $(this).val(); // get selected value
              
              if (id == "price") { 
                  window.location.replace("{{ route('township.create') }}"); 
              }
              if(id=="date"){

                window.location.replace("{{ route('apartment.create') }}"); 
              }
              return false;
          });
        });
    </script>

@endsection