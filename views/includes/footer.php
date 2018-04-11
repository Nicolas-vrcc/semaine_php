  </main>  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Super Voisin</h5>
          <p class="grey-text text-lighten-4">Super Voisin est l'outil qui vous permet de mettre en avant vos super-pouvoirs, de les partager et d'utiliser ceux de vos voisins !</p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Liens utiles</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">CGV</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">F.A.Q.</a></li>
            <li><a class="grey-text text-lighten-3" href="/contact">Nous contacter</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Recrutement</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="footer-copyright">
      <p class="container">© 2018 Équipe 6 - HETIC</p>
    </div>
  </footer>
   <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <!-- Maps API -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNj6Ao4vyLXmFpltuu8EnyYKYbF1HNXCM&libraries=places"></script>
<!-- Main JS -->
<script src="/assets/js/main.js"></script>
<!-- Google Maps API -->
<script>
  // This example requires the Drawing library. Include the libraries=drawing
  // parameter when you first load the API. For example:
  // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=drawing">

  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -34.397, lng: 150.644},
      zoom: 8
    });

    var drawingManager = new google.maps.drawing.DrawingManager({
      drawingMode: google.maps.drawing.OverlayType.MARKER,
      drawingControl: true,
      drawingControlOptions: {
        position: google.maps.ControlPosition.TOP_CENTER,
        drawingModes: ['marker', 'circle', 'polygon', 'polyline', 'rectangle']
      },
      markerOptions: {icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'},
      circleOptions: {
        fillColor: '#ffff00',
        fillOpacity: 1,
        strokeWeight: 5,
        clickable: false,
        editable: true,
        zIndex: 1
      }
    });
    drawingManager.setMap(map);
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMlTrWYLqu1qvbAN7q0S3lcWYpTlKXnQ4&libraries=drawing&callback=initMap" async defer></script>
</body>
</html>