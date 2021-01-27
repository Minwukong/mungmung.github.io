
//   let map;
  
//   function initMap() {
//     map = new google.maps.Map(document.getElementById("map"), {
//       center: { lat: -34.397, lng: 150.644 },
//       zoom: 12,
//     });
//   }




    // //단일 마커
    // // 구글 지도를 초기화 하고 마커를 추가한다.
    // function initMap() {
    //     // 오스트레일리아 울룰루 산의 위도, 경도 정보
    //     var uluru = {lat: -25.344, lng: 131.036};
    //     // 구글 지도 객체를 생성하고, 위치는 uluru로 맞춘다.
    //     var map = new google.maps.Map(
    //         document.getElementById('map'), {zoom: 15, center: uluru});
    //     // Uluru 산에 마커를 위치시키는 ㅗ드
    //     var marker = new google.maps.Marker({position: uluru, map: map});
    // }

//여러개 마커
    let map; //map을 담을 변수 선언
    function initMap() {
                                   //div id가 map인 영역에 지도를 초기화
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15, //지도의 zoom은 2로 설정.
            center: new google.maps.LatLng(37.561196,127.038498), //지도가 초기화 될 때 중심 위치
            mapTypeId: 'terrain' //지도의 타입 : 육지, 위성 등이 있음
        });
 
        // 여러개의 위치 데이터를 가져오는 json 파일.
        var script = document.createElement('script');
        // This example uses a local copy of the GeoJSON stored at
        // http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojsonp
        script.src = 'https://developers.google.com/maps/documentation/javascript/examples/json/earthquake_GeoJSONP.js';
        document.getElementsByTagName('head')[0].appendChild(script);
    }
 
    // 리스트 정보를 for문을 돌려 각각의 위치에 마커를 표시한다.
    // set of coordinates.
    window.eqfeed_callback = function(results) {
        for (var i = 0; i < results.features.length; i++) {
            var coords = results.features[i].geometry.coordinates;
            var latLng = new google.maps.LatLng(coords[1],coords[0]); //위도 경도 변수
            var marker = new google.maps.Marker({
                position: latLng, //여기에 위도 경도 정보를 입력하고 마커 생성
                map: map
            });
        }
    }

    // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      //주변 장소
   
    //   function initMap() {
    //     const map = new google.maps.Map(document.getElementById("map"), {
    //       center: { lat: -33.866, lng: 151.196 },
    //       zoom: 15,
    //     });
    //     const request = {
    //       placeId: "ChIJN1t_tDeuEmsRUsoyG83frY4",
    //       fields: ["name", "formatted_address", "place_id", "geometry"],
    //     };
    //     const infowindow = new google.maps.InfoWindow();
    //     const service = new google.maps.places.PlacesService(map);
    //     service.getDetails(request, (place, status) => {
    //       if (status === google.maps.places.PlacesServiceStatus.OK) {
    //         const marker = new google.maps.Marker({
    //           map,
    //           position: place.geometry.location,
    //         });
    //         google.maps.event.addListener(marker, "click", function () {
    //           infowindow.setContent(
    //             "<div><strong>" +
    //               place.name +
    //               "</strong><br>" +
    //               "Place ID: " +
    //               place.place_id +
    //               "<br>" +
    //               place.formatted_address +
    //               "</div>"
    //           );
    //           infowindow.open(map, this);
    //         });
    //       }
    //     });
    //   }