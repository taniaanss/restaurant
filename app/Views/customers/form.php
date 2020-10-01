<?php

$id = isset($customer) ? $customer->id : "";
$customer_name = isset($customer) ? $customer->customer_name : "";
$customer_phone = isset($customer) ? $customer->customer_phone : "";
$lat = isset($customer) ? $customer->lat : '-34.397';
$long = isset($customer) ? $customer->long : '150.644';
$street = isset($customer) ? $customer->street : "";
$city = isset($customer) ? $customer->city : "";
$country = isset($customer) ? $customer->country : "";
$v = isset($v) ? "readonly" : "";
$btn = isset($customer) ? "Ubah" : "Simpan";
?>


<style>
  #map-canvas {
    width: 100%;
    height: 250px;
  }
</style>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <form action="<?= site_url($urlmethod) ?>" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h4 class="mt-2 mb-2"><?= $title; ?></h4>
              </div>
              <div class="card-body">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                  <label for="customer_name">Name</label>
                  <input type="text" class="form-control" id="customer_name" name="customer_name" aria-describedby="customer_name" placeholder="Enter name" value="<?php echo $customer_name ?>" <?php echo $v; ?> required>
                  <small id="customer_name" class="form-text text-muted">Input customer name properly.</small>
                </div>
                <div class="form-group">
                  <label for="customer_phone">Phone Number</label>
                  <input type="number" class="form-control" id="customer_phone" name="customer_phone" aria-describedby="customer_phone" placeholder="Enter number" value="<?php echo $customer_phone ?>" <?php echo $v; ?> required>
                  <small id="customer_phone" class="form-text text-muted">Input customer phone number properly.</small>
                </div>
                <div class="form-group">
                  <label for="map">Search Store Location</label>
                  <input type="text" id="searchmap" placeholder="Search" class="form-control" autofocus="autofocus" <?php echo $v; ?> aria-describedby="map">
                  <small id="map" class="form-text text-muted">Search your location.</small>
                  <div id="map-canvas"></div>
                </div>

                <div class="form-group">
                  <label for="lat">Latitude</label>
                  <input type="text" class="form-control" id="lat" name="lat" aria-describedby="lati" placeholder="Latitude" value="<?php echo $lat ?>" readonly required>
                  <small id="lati" class="form-text text-muted">Display latitude automaticly.</small>
                </div>
                <div class="form-group">
                  <label for="lng">Longitude</label>
                  <input type="text" class="form-control" id="lng" name="long" aria-describedby="long" placeholder="Longitude" value="<?php echo $long ?>" readonly required>
                  <small id="long" class="form-text text-muted">Display longitude automaticly.</small>
                </div>

                <div class="form-group">
                  <label for="street">Street</label>
                  <input type="text" class="form-control" id="street" name="street" aria-describedby="street" placeholder="Enter Street" value="<?php echo $street ?>" <?php echo $v; ?> required>
                  <small id="street" class="form-text text-muted">Input customer street address properly.</small>
                </div>
                <div class="form-group">
                  <label for="city">City</label>
                  <input type="text" class="form-control" id="city" name="city" aria-describedby="city" placeholder="Enter City" value="<?php echo $city ?>" <?php echo $v; ?> required>
                  <small id="city" class="form-text text-muted">Input customer city address properly.</small>
                </div>

                <div class="form-group">
                  <label for="country">Country</label>
                  <input type="text" class="form-control" id="country" name="country" aria-describedby="country" placeholder="Enter Country" value="<?php echo $country ?>" <?php echo $v; ?> required>
                  <small id="country" class="form-text text-muted">Input customer country address properly.</small>
                </div>
              </div>
              <div class="card-footer text-right">
                <?php if ($v == "") { ?>
                  <button class="btn btn-primary mr-1" type="submit"><?php echo $btn; ?></button>
                <?php } ?>
                <a href="/customer" class="btn btn-danger link">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div>
    <a href="javascript:void(0)" class="settingPanelToggle"></a>
  </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&libraries=places"></script>

<script>
  var map = new google.maps.Map(document.getElementById('map-canvas'), {
    center: {
      lat: <?php echo $lat; ?>,
      lng: <?php echo $long; ?>
    },
    zoom: 15
  });

  var marker = new google.maps.Marker({
    position: {
      lat: <?php echo $lat; ?>,
      lng: <?php echo $long; ?>
    },
    map: map,
    draggable: true
  });

  var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
  google.maps.event.addListener(searchBox, 'places_changed', function() {
    var places = searchBox.getPlaces();
    var bounds = new google.maps.LatLngBounds();

    var i, place;
    for (i = 0; place = places[i]; i++) {
      bounds.extend(place.geometry.location);
      marker.setPosition(place.geometry.location); //set marker position new...
      $('#street').val(place.address_components[i].long_name);
      $('#city').val(place.address_components[i + 1].long_name);
      $('#country').val(place.address_components[i + 3].long_name);
      // $('#zipcode').val( place.address_components[3].long_name);

    }

    map.fitBounds(bounds);
    map.setZoom(15);
  });
  google.maps.event.addListener(marker, 'position_changed', function() {
    var lat = marker.getPosition().lat();
    var lng = marker.getPosition().lng();
    var street = marker.formatted_address;
    $('#lat').val(lat);
    $('#lng').val(lng);



  });
</script>