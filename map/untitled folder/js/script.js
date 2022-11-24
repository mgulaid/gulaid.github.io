$( document ).ready(function() {

  /* Initialize animation variables. These will be generated dynamically from the cartoDB data */
  var startingTime, startingDateString, maxTime, counterTime, step, timer;
  var animationDuration = 45; // in seconds
  var animationInterval = 250; // in milliseconds
  var colorStaticCircle = "#f30" ;
  var colorExplodeStart = "red";
  var colorExplodeFinish = "#f40";
  var defaultZoom = 10;
    var finalRadiusMultiplier = .5; //0.6
    
  /*Tooltip showing address info*/
  var tooltip = d3.select("body")
  .append("div")
  .attr("class", "tooltip")
  .style("position", "absolute")
  .style("z-index", "60")
  .style("visibility", "hidden")
  .text("tooltip");

  /*Initialize Leaflet Map*/
  var map = new L.Map("map", {
    center: [5.795744,45.570801], //[5.218828,51.317139], //[6.0871505,45.7862204], //[37.7756, -122.4193],
      minZoom: 1,
      zoom: 6,
      MaxZoom: 11
  })
  .addLayer(new L.TileLayer("https://stamen-tiles.a.ssl.fastly.net/toner-lite/{z}/{x}/{y}.png")); //http://{s}.tile.osm.org/{z}/{x}/{y}.png

  /* Initialize the SVG layer */
  map._initPathRoot()    

  /* Pass map SVG layer to d3 */
  var svg = d3.select("#map").select("svg"),
  g = svg.append("g");

  /*Animation Timing Variables*/
  var startingTime = 86166720000;
  var step = 2500000000;
  var maxTime;
  var timer;
  var isPlaying = false;
  var counterTime = startingTime;
  
  /*Load data file from cartoDB and initialize coordinates*/
  var sql = new cartodb.SQL({ user: 'somalia', format: 'geojson'});
  //sql.execute("SELECT the_geom, date_filed, address_1, units, type, demo_count_at_date, ellis_count_at_date, omi_count_at_date, total_count_at_date FROM ellis_updated_2_13 WHERE date_filed IS NOT NULL ORDER BY date_filed ASC", {table_name: 'ellis_updated_2_13'})
  sql.execute("SELECT the_geom, date_filed, units, address_1 FROM {{table_name}} WHERE the_geom IS NOT NULL ORDER BY date_filed ASC", {table_name: 'armed_conflict_somalia'})
  .done(function(collection) {
     var cumCasualty = 0;
     startingTime =  Date.parse(collection.features[0].properties.date_filed)-1000000;
    maxTime =  Date.parse(collection.features[collection.features.length-1].properties.date_filed)+4000000;
      counterTime = startingTime;
        collection.features.forEach(function(d) {
          d.LatLng = new L.LatLng(d.geometry.coordinates[1],d.geometry.coordinates[0]);
           cumCasualty += d.properties.units;
      d.properties.totalCasualty = cumCasualty;
        });

        /*Add an svg group for each data point*/
        var node = g.selectAll(".node").data(collection.features).enter().append("g");
        var feature = node.append("circle")
        .attr("r", function(d) { return 1+d.properties.units;})
        .attr("class",  "center")
        .style("stroke", function(d) { 
         if(d.properties.type == "OMI"){
          return "#606";} else if(d.properties.type == "DEMO"){
            return "#066";
          }
          return "#f30";
        });
        /*show node info on mouseover*/
        node.on("mouseover", function(d){
          var fullDate = d.properties.date_filed;
          var thisYear = new Date(fullDate).getFullYear();
          var currMonth = new Date(fullDate).getMonth()+1;
          var currDay = new Date(fullDate).getDate();
          var units = d.properties.units;
          var unitText = units + " Death";
          if(units > 1){
            unitText = units + " Death"
          }
          var dateString = currMonth+"/"+currDay + "/"+thisYear;
          $(".tooltip").html(d.properties.address_1+ "<br>"+unitText+"<br>"+dateString);
          return tooltip.style("visibility", "visible");})
        .on("mousemove", function(){return tooltip.style("top",
          (d3.event.pageY-10)+"px").style("left",(d3.event.pageX+10)+"px");})
        .on("click", function(d){
          tooltip.text(d.properties.address_1);
          return tooltip.style("visibility", "visible");})
        .on("mouseout", function(){return tooltip.style("visibility", "hidden");});

        /*Initialize play button and slider*/
        $( "#play" ).click(togglePlay);
        $( "#slider" ).slider({ max: maxTime, min:startingTime, value: maxTime, step: step, start: function( event, ui ) {
         clearInterval(timer);
       }, change: function( event, ui ) {
        counterTime = $( "#slider" ).slider( "value" );
        filterCurrentPoints();
      }, slide: function( event, ui ) {
        counterTime = $( "#slider" ).slider( "value" );
        filterCurrentPoints();
      }, stop: function( event, ui ) {
        if(isPlaying){
          playAnimation();
        }
        filterCurrentPoints();
      }
    });

        /*Starting setup*/
        var currDate = new Date(counterTime).getFullYear();
        //stopAnimation();
        filterCurrentPoints();
        map.on("zoomend", update);
        update();
        playAnimation();
        /*Filter map points by date*/
        function filterCurrentPoints(){
         var filtered = node.attr("visibility", "hidden")
         .filter(function(d) { return Date.parse(d.properties.date_filed) < counterTime}) 
         .attr("visibility", "visible");
        // console.log(JSON.stringify(filtered[0]));
        // updateCounter(filtered[0].length-1);
         filtered.filter(function(d) { 

        return Date.parse(d.properties.date_filed) > counterTime-step}) 
      .append("circle")
          .attr("r", 4)
           .style("fill","red")
          .style("fill-opacity", 0.4) //opacity of the orange circles
          .transition()

          .duration(800)
          .ease(Math.sqrt)
          .attr("r", function(d) { return (d.properties.units + 1)*30;})
            .style("fill","#f40")
          .style("fill-opacity", 1e-6)
          .remove();
          updateCounter(filtered[0].length-1);
          
         audio.play(); //this is the spot
       }

       /*Update map counters*/
       function updateCounter(index){
        var totalCasualty = 0;
       // if (resultArray[index].Value !=0){audio.play()}
        if(index<1){
        
          }else{
             var props = collection.features[index].properties;
             totalCasualty = props.totalCasualty;
          }
          document.getElementById('counter').innerHTML =totalCasualty + " ";
          currDate = new Date(counterTime).getFullYear();
          var currMonth = new Date(counterTime).getMonth()+1;
          var currDay = new Date(counterTime).getDate();
      
          document.getElementById('date').innerHTML = "1/1/1997 - " + currMonth+"/"+currDay + "/"+currDate;
      
        }

       /*Update slider*/
       function playAnimation(){
        counterTime = $( "#slider" ).slider( "value" );
        if(counterTime >=maxTime){
          $( "#slider" ).slider( "value", startingTime);
          
        }
        isPlaying = true;
        timer = setInterval(function() {
         counterTime += step; 
         $( "#slider" ).slider( "value", counterTime);
         if(counterTime >=maxTime){
          stopAnimation(); 
        }
      },500);

      }

     function stopAnimation(){
      clearInterval(timer);
      $('#play').css('background-image', 'url(images/play.png)');
      isPlaying = false;
      //$('#play').css('background-image', 'url(images/sound.mp3)');
      var sound = new Howl({  urls: ['sound.mp3', 'sound.ogg']}).play();
    }

    /*Scale dots when map size or zoom is changed*/
    function update() {
      var up = map.getZoom()/13;
      node.attr("transform", function(d) {return "translate(" +  map.latLngToLayerPoint(d.LatLng).x + "," + map.latLngToLayerPoint(d.LatLng).y + ") scale("+up+")"});

    }

    /*called when play/pause button is pressed*/
    function togglePlay(){
      if(isPlaying){
        stopAnimation();
      } else {
        $('#play').css('background-image', 'url(images/pause.png)');
        playAnimation();
      }
    }
  })

/*Show info about on mouseover*/
  $( ".popup" ).hide();
  $( ".triggerPopup" ).mouseover(function(e) {
    $( ".popup" ).position();
    var id = $(this).attr('id');
    if(id=="ellis"){
      $( "#ellisPopup" ).show();
    } else if (id=="omi"){
      $( "#omiPopup" ).show();
    } else {
      $( "#demoPopup" ).show();
    }
    $('.popup').css("top", e.pageY+20);
  });

  $( ".triggerPopup" ).on("mouseout", function(){ $( ".popup" ).hide();});
});