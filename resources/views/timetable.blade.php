@extends('layouts.app')

@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/bg/bg3.jpg')}}">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
            <div class="row"> 
                <div class="col-md-6">
                <h2 class="text-theme-color-yellow font-36">Time Table</h2>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Time Table</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
    </section>

    <!-- Section: Timetable -->
    <section>
        <div class="container">
          <div class="section-content">
            <div class="row">
              <div class="col-md-12">
                
                <!-- === FC Calendar Starts === -->
                <div class="fc-timetable-wrapper">
                  <!-- Fc Calendar Filter -->
                  <ul class="filter-departments list-inline">
                    <li><a class="active" data-filter="all" href="#">All</a></li>
                    <li><a data-filter="fc-departments-orthopaedics" class="orthopaedics" href="#orthopaedics">Mathematics</a></li>
                    <li><a data-filter="fc-departments-cardiology" class="cardiology" href="#cardiology">Drawing</a></li>
                    <li><a data-filter="fc-departments-neurology" class="neurology" href="#neurology">Language </a></li>
                    <li><a data-filter="fc-departments-dental" class="dental" href="#dental">Multimedia</a></li>
                    <li><a data-filter="fc-departments-haematology" class="haematology" href="#haematology">Learning</a></li>
                  </ul>
                  <!-- Fc Calendar Calendar -->
                  <div id='calendar'></div>
                </div>
  
                <!-- Fc Calendar Script -->
                <script>
                  $(document).ready(function() {
                    $(".filter-departments a").on("click", function(e){
                      e.preventDefault();
                      var filterData = $(this).data("filter");
                      if (filterData == "all") {
                        $(".filter-departments a.active").removeClass("active");
                        $(this).addClass("active");
                        $(".fc-content-skeleton a.fc-event.hide").removeClass("hide");
                      } else {
                        $(".filter-departments a.active").removeClass("active");
                        $(this).addClass("active");
                        $(".fc-content-skeleton a.fc-event.hide").removeClass("hide");
                        $(".fc-content-skeleton a.fc-event").not("."+filterData).addClass("hide");
                      }
                    });
  
                    var monday = '2015-03-09T';
                    var tuesday = '2015-03-10T';
                    var wednesday = '2015-03-11T';
                    var thursday = '2015-03-12T';
                    var friday = '2015-03-13T';
                    var saturday = '2015-03-14T';
                    var sunday = '2015-03-15T';
                    $('#calendar').fullCalendar({
                      header: {
                        left: '',
                        center: '',
                        right: ''
                      },
                      axisFormat: 'HH:mm - HH:mm',
                      minTime: '08:00:00',
                      maxTime: '24:00:00',
                      defaultView: 'agendaWeek',
                      defaultDate: '2015-03-09',
                      firstDay: 1,
                      slotDuration: '01:00:00',
                      columnFormat: 'dddd',
                      allDaySlot: false,
                      editable: false,
                      eventLimit: true,
                      windowResize: function(view) {
                      },
                      events: [
                        {
                          title: 'Mathematics 08:00 - 12:30',
                          start: monday+'08:00:00',
                          end: monday+'12:30:00',
                          url: 'page-department1.html',
                          className: 'fc-departments-orthopaedics'
                        },
                        {
                          title: 'Mathematics 09:00 - 11:00',
                          start: saturday+'09:00:00',
                          end: saturday+'11:00:00',
                          url: 'page-department1.html',
                          className: 'fc-departments-orthopaedics'
                        },
                        {
                          title: 'Mathematics 13:00 - 16:00',
                          start: thursday+'13:00:00',
                          end: thursday+'16:00:00',
                          url: 'page-department1.html',
                          className: 'fc-departments-orthopaedics'
                        },
                        {
                          title: 'Learning Class 08:00 - 09:00',
                          start: wednesday+'08:00:00',
                          end: wednesday+'09:00:00',
                          url: 'page-department1.html',
                          className: 'fc-departments-haematology'
                        },
                        {
                          title: 'Learning Class 11:00 - 13:00',
                          start: tuesday+'11:00:00',
                          end: tuesday+'13:00:00',
                          url: 'page-department1.html',
                          className: 'fc-departments-haematology'
                        },
                        {
                          title: 'Learning Class 16:00 - 19:00',
                          start: saturday+'16:00:00',
                          end: saturday+'19:00:00',
                          url: 'page-department1.html',
                          className: 'fc-departments-haematology'
                        },
                        {
                          title: 'Language Class 14:00 - 18:00',
                          start: tuesday+'14:00:00',
                          end: tuesday+'18:00:00',
                          url: 'page-department1.html',
                          className: 'fc-departments-neurology'
                        },
                        {
                          title: 'Language Class 11:00 - 14:30',
                          start: friday+'11:00:00',
                          end: friday+'14:30:00',
                          url: 'page-department1.html',
                          className: 'fc-departments-neurology'
                        },
                        {
                          title: 'Drawing Class 10:00 - 12:00',
                          start: wednesday+'10:00:00',
                          end: wednesday+'12:00:00',
                          url: 'page-department1.html',
                          className: 'fc-departments-cardiology'
                        },
                        {
                          title: 'Drawing Class 16:30 - 8:30:',
                          start: friday+'16:30:00',
                          end: friday+'18:30:00',
                          url: 'page-department1.html',
                          className: 'fc-departments-cardiology'
                        },
                        {
                          title: 'Drawing Class 11:30 - 13:00',
                          start: sunday+'11:30:00',
                          end: sunday+'13:00:00',
                          url: 'page-department1.html',
                          className: 'fc-departments-cardiology'
                        },
                        {
                          title: 'Multimedia Class 14:00 - 16:30',
                          start: monday+'14:00:00',
                          end: monday+'16:30:00',
                          url: 'page-department1.html',
                          className: 'fc-departments-dental'
                        },
                        {
                          title: 'Multimedia Class 17:00 - 19:00',
                          start: wednesday+'17:00:00',
                          end: wednesday+'19:00:00',
                          url: 'page-department1.html',
                          className: 'fc-departments-dental'
                        },
                        {
                          title: 'Multimedia Class 08:00 - 10:30',
                          start: sunday+'08:00:00',
                          end: sunday+'10:30:00',
                          url: 'page-department1.html',
                          className: 'fc-departments-dental'
                        }
                      ]
                    });
                    
                  });
                  
                  //fix hour range
                  $( window ).load(function() {
                    $("#calendar .fc-axis.fc-time").each(function() {
                      var each_range = $(this).children('span').html();
                      var range_array = each_range.split(' - ');
                      if( range_array[0] == range_array[1] ) {
                        var range_end_hour = range_array[1].split(':');
                        var h = parseInt(range_end_hour[0], 10) + 1;
                        $(this).children('span').html(range_array[0] + ' - ' + h + ':' + range_end_hour[1] )
                      }
                    });
                    if(window.location.hash) {
                      var hash = document.URL.substr(document.URL.indexOf('#')+1);
                      $(".filter-departments a."+hash).trigger('click');
                    }
                  });
                </script>
                <!-- === FC Calendar Ends === -->
  
              </div>
            </div>
          </div>
        </div>
    </section>

@endsection