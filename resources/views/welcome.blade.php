@extends('layout.master')

@section('title','Provinsi Bali Tanggap Covis-19')
@section('content')

<!-- Small boxes (Stat box) -->



<div class="mx-auto" style="bottom:0;margin-top:-80px; padding-left:300px;">
	<div class="row">
		<div class="col-md-2" style="margin-bottom:5px;">
			<div class="container" style="background:#fff;border-radius:10px;padding:15px;box-shadow: 0 15px 20px rgba(0, 0, 0, 0.1);">
				<h4 style="font-family: 'product_sansregular';text-align:center;font-size:10pt;">Positif </h4>
				<p style="font-family: 'product_sansregular';text-align:center;color:#ca2438;font-weight:bold;font-size:20pt;margin-bottom:15px;margin-top:10px;">{{$totalPositif[0]->total}}</p>
			</div>
		</div>
		<div class="col-md-2" style="margin-bottom:5px;">
			<div class="container" style="background:#fff;border-radius:10px;padding:15px;box-shadow: 0 15px 20px rgba(0, 0, 0, 0.1);">
      <h4 style="font-family: 'product_sansregular';text-align:center;font-size:10pt;">Dalam Perawatan</h4>
				<p style="font-family: 'product_sansregular';text-align:center;color:#ca2438;font-weight:bold;font-size:20pt;margin-bottom:15px;margin-top:10px;">{{$totalDirawat[0]->perawatan}}</p>
			</div>
		</div>
		<div class="col-md-2" style="margin-bottom:5px;">
			<div class="container" style="background:#fff;border-radius:10px;padding:15px;box-shadow: 0 15px 20px rgba(0, 0, 0, 0.1);">
      <h4 style="font-family: 'product_sansregular';text-align:center;font-size:10pt;">Sembuh </h4>
				<p style="font-family: 'product_sansregular';text-align:center;color:#ca2438;font-weight:bold;font-size:20pt;margin-bottom:15px;margin-top:10px;">{{$totalSembuh[0]->sembuh}}</p>
			</div>
		</div>
		<div class="col-md-2" style="margin-bottom:5px;">
			<div class="container" style="background:#fff;border-radius:10px;padding:15px;box-shadow: 0 15px 20px rgba(0, 0, 0, 0.1);">
			<h4 style="font-family: 'product_sansregular';text-align:center;font-size:10pt;">Meninggal </h4>
				<p style="font-family: 'product_sansregular';text-align:center;color:#ca2438;font-weight:bold;font-size:20pt;margin-bottom:15px;margin-top:10px;">{{$totalMeninggal[0]->meninggal}}</p>
			</div>
		</div>
	</div>
  </div>
  <div class="">
  <div class="col-12">
    <h5>Cari tanggal</h5>
    <form action="/search" method="POST">
      @csrf
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
        <input id="tanggalSearch" type="date" @if(isset($tanggal)) value="{{$tanggal}}" @endif name="tanggal"
          class="form-control" required>
        <span class="input-group-btn">
          <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
  </div>
</div>



<div class="row mt-2">
  <div class="col-12">

    <div class="card card-red">
      <div class="card-header">
        <h3 class="card-title">Peta Penyebaran Covid Provinsi Bali <strong>{{$tanggalSekarang}}</strong></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body no-padding p-0">
        <div class="row">
          <div class="col-12">
            <div class="pad">
              <div id="mapid" style="height: 500px"></div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.card-body -->
      {{-- <div class="card-footer" style="background: white">
        <div class="row">
          <div class="col-6">
            <p>Color Start:</p>
            <input type="color" value="#edff6b" class="form-control" id="colorStart">
          </div>
          <div class="col-6">
            <p>Color End:</p>
            <input type="color" value="#6b6a01" class="form-control" id="colorEnd">
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-12">
            <button class="btn btn-primary form-control" id="btnGenerateColor">Generate Color</button>
          </div>

        </div>
      </div> --}}
    </div>
    <!-- /.card -->
  </div>
</div>


<div class="row mt-2">
  <div class="col-12">
    <div class="card card-red">
      <div class="card-header">
        <h3 class="card-title"> Tabel Data Kasus Covid-19 Provinsi Bali Per <strong>{{$tanggalSekarang}}</strong></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>No</th>
              <th>Kabupaten</th>
              <th>Positif</th>
              <th>Sembuh</th>
              <th>Dalam Perawatan</th>
              <th>Meninggal</th>
              {{-- <th>Tanggal</th> --}}
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $item)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{ucfirst($item->kabupaten)}}</td>
              <td>
              <div class="badge badge-pill badge-danger" >{{ $item->total }}</td>
              <td>
              <div class="badge badge-pill badge-success" >{{ $item->sembuh }}</td>
              <td>
              <div class="badge badge-pill badge-warning" >{{ $item->perawatan }}</td>
              <td>
              <div class="badge badge-pill badge-secondary" >{{ $item->meninggal }}</td>
              {{-- <td>{{$item->tanggal}}</td> --}}
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>



@endsection
@section("js")
<script src="https://unpkg.com/leaflet-kmz@latest/dist/leaflet-kmz.js"></script>
<script src="https://pendataan.baliprov.go.id/assets/frontend/map/leaflet.markercluster-src.js"></script>
<script src="http://leaflet.github.io/Leaflet.label/leaflet.label.js" charset="utf-8"></script>
<script>
  $(document).ready(function () {
    var dataMap=null;
    var dataColor=null;
    var colorMap=[
        "edff6b",
        "dcec5d",
        "ccd950",
        "bcc743",
        "acb436",
        "9ba128",
        "8b8f1b",
        "7b7c0e",
        "6b6a01"
    ];
    var tanggal = $('#tanggalSearch').val();
    $.ajax({
      async:false,
      url:'getDataMap',
      type:'get',
      dataType:'json',
      data:{date: tanggal},
      success: function(response){
        dataMap = response["dataMap"];
        dataColor = response["dataColor"];
      }
    });
    console.log(dataMap);
    var map = L.map('mapid',{
      fullscreenControl:true,
    });
    
    $('#btnGenerateColor').on('click',function(e){
      var colorStart = $('#colorStart').val();
      var colorEnd = $('#colorEnd').val();
      $.ajax({
        async:false,
        url:'/create-pallete',
        type:'get',
        dataType:'json',
        data:{start: colorStart, end:colorEnd},
        success: function(response){
          colorMap = response;
          setMapAttr();
        }
      });
      
    });
    
    
    map.setView(new L.LatLng(-8.500410, 115.195839),10);
    var OpenTopoMap = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 20,
            // zoomAnimation:true,
            id: 'mapbox/streets-v11',
            // tileSize: 512,
            // zoomOffset: -1,
            accessToken: 'pk.eyJ1Ijoid2lkaWFuYXB3IiwiYSI6ImNrNm95c2pydjFnbWczbHBibGNtMDNoZzMifQ.kHoE5-gMwNgEDCrJQ3fqkQ',
        }).addTo(map);
    OpenTopoMap.addTo(map);
    var defStyle = {opacity:'1',color:'#000000',fillOpacity:'0',fillColor:'#CCCCCC'};
    setMapAttr();
    // var m = L.marker([-8.500410, 115.195839]).bindLabel('A sweet static label!', { noHide: true })
		// 	.addTo(map)
		// 	.showLabel();

    function setMapAttr(){
      var markerIcon = L.icon({
        iconUrl: '/img/marker.png',
        iconSize: [40, 40],
      });
      
      var kmzParser = new L.KMZParser({
          
          onKMZLoaded: function (kmz_layer, name) {
            
              control.addOverlay(kmz_layer, name);
              var markers = L.markerClusterGroup();
              var layers = kmz_layer.getLayers()[0].getLayers();
              console.log(layers[0]);
              layers.forEach(function(layer, index){
                var kab  = layer.feature.properties.NAME_2;
                var kec =  layer.feature.properties.NAME_3;
                var kel = layer.feature.properties.NAME_4;
                var data;
              
                var STYLE = {opacity:'1',color:'#000',fillOpacity:'1'};
                var HIJAU_MUDA = {opacity:'1',color:'#000',fillOpacity:'1', fillColor:'#81F781'};
                var HIJAU_TUA = {opacity:'1',color:'#000',fillOpacity:'1', fillColor:'#088A08'};
                var KUNING = {opacity:'1',color:'#000',fillOpacity:'1', fillColor:'#FFFF00'};
                var MERAH_MUDA = {opacity:'1',color:'#000',fillOpacity:'1', fillColor:'#F78181'};
                var MERAH_TUA = {opacity:'1',color:'#000',fillOpacity:'1', fillColor:'#B40404'};
                if(!Array.isArray(dataMap) || !dataMap.length == 0){
                // set sub layer default style positif covid
                  // var STYLE = {opacity:'1',color:'#000',fillOpacity:'1',fillColor:'#'+colorMap[index]}; 
                  // layer.setStyle(STYLE);
                    var searchResult = dataMap.filter(function(it){
                      return it.kecamatan.replace(/\s/g,'').toLowerCase() === kec.replace(/\s/g,'').toLowerCase() &&
                              it.kelurahan.replace(/\s/g,'').toLowerCase() === kel.replace(/\s/g,'').toLowerCase();
                    });
                    if(!Array.isArray(searchResult) || !searchResult.length ==0){
                      var item = searchResult[0];
                      if(item.total == 0 ){
                        layer.setStyle(HIJAU_MUDA);  
                      }else if(item.perawatan == 0 && item.total>0 && item.sembuh >= 0 && item.meninggal >=0){
                        layer.setStyle(HIJAU_TUA);
                      }else if(item.ppln ==1 && item.perawatan == 1 && item.total == 1 && item.tl==0 || item.ppdn ==1 && item.perawatan == 1 && item.total == 1 && item.tl==0){
                        layer.setStyle(KUNING);
                      }else if((item.ppln >1 && item.perawatan <= item.ppln && item.sembuh <= item.ppln && item.tl == 0) || (item.ppdn >1 && item.perawatan <= item.ppdn && item.sembuh <= item.ppdn && item.tl == 0)  ){
                        layer.setStyle(MERAH_MUDA);
                      }else{
                        layer.setStyle(MERAH_TUA);
                      }
                      data = '<table width="300">';
                      data +='  <tr>';
                      data +='    <th colspan="2">Keterangan</th>';
                      data +='  </tr>';
                    
                      data +='  <tr>';
                      data +='    <td>Kabupaten</td>';
                      data +='    <td>: '+kab+'</td>';
                      data +='  </tr>';              
      
                      data +='  <tr >';
                      data +='    <td>Kecamatan</td>';
                      data +='    <td>: '+kec+'</td>';
                      data +='  </tr>';

                      data +='  <tr>';
                      data +='    <td>Kelurahan</td>';
                      data +='    <td>: '+kel+'</td>';
                      data +='  </tr>';

                      data +='  <tr>';
                      data +='    <td>PP-LN</td>';
                      data +='    <td>: '+item.ppln+'</td>';
                      data +='  </tr>';

                      data +='  <tr>';
                      data +='    <td>PP-DN</td>';
                      data +='    <td>: '+item.ppdn+'</td>';
                      data +='  </tr>';

                      data +='  <tr>';
                      data +='    <td>TL</td>';
                      data +='    <td>: '+item.tl+'</td>';
                      data +='  </tr>';

                      data +='  <tr>';
                      data +='    <td>Lainnya</td>';
                      data +='    <td>: '+item.lainnya+'</td>';
                      data +='  </tr>';

                      data +='  <tr style="color:green">';
                      data +='    <td>Sembuh</td>';
                      data +='    <td>: '+item.sembuh+'</td>';
                      data +='  </tr>';

                      data +='  <tr style="color:blue">';
                      data +='    <td>Dalam Perawatan</td>';
                      data +='    <td>: '+item.perawatan+'</td>';
                      data +='  </tr>';

                      data +='  <tr style="color:red">';
                      data +='    <td>Meninggal</td>';
                      data +='    <td>: '+item.meninggal+'</td>';
                      data +='  </tr>';
                    }else{
                      console.log(kel.replace(/\s/g,'').toLowerCase());
                      console.log(kec.replace(/\s/g,'').toLowerCase());
                      data = '<table width="300">';
                      data +='  <tr>';
                      data +='    <th colspan="2">Keterangan</th>';
                      data +='  </tr>';
                    
                      data +='  <tr>';
                      data +='    <td>Kabupaten</td>';
                      data +='    <td>: '+kab+'</td>';
                      data +='  </tr>';              
      
                      data +='  <tr style="color:red">';
                      data +='    <td>Kecamatan</td>';
                      data +='    <td>: '+kec+'</td>';
                      data +='  </tr>';

                      data +='  <tr style="color:red">';
                      data +='    <td>Kelurahan</td>';
                      data +='    <td>: '+kel+'</td>';
                      data +='  </tr>';
                    }
                
                }else{
                  // var data = "Tidak ada Data pada tanggal tersebut"
                  layer.setStyle(defStyle);
                  data = '<table width="300">';
                      data +='  <tr>';
                      data +='    <th colspan="2">Keterangan</th>';
                      data +='  </tr>';
                    
                      data +='  <tr>';
                      data +='    <td>Kabupaten</td>';
                      data +='    <td>: '+kab+'</td>';
                      data +='  </tr>';              
      
                      data +='  <tr>';
                      data +='    <td>Kecamatan</td>';
                      data +='    <td>: '+kec+'</td>';
                      data +='  </tr>';

                      data +='  <tr>';
                      data +='    <td>Kelurahan</td>';
                      data +='    <td>: '+kel+'</td>';
                      data +='  </tr>';  
                }
                layer.bindPopup(data);
                // markers.addLayer(L.marker(getRandomLatLng(map)));
                markers.addLayer( 
                  L.marker(layer.getBounds().getCenter(),{
                    icon: markerIcon
                  }).bindPopup(data)
                );
              });
              map.addLayer(markers);
              kmz_layer.addTo(map);
          }
      });
      kmzParser.load('bali-kelurahan.kmz');
      var control = L.control.layers(null, null, {
          collapsed: true
      }).addTo(map);
      $('.leaflet-control-layers').hide();

    }
  });
</script>
@endsection