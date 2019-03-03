function initMap() {
    var paris = {lat: 45.410788, lng: 0.090857};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        center: paris
    });

    console.log(document.getElementById('map'));

    fetch('/agency/list')
        .then(function(response) {
            var contentType = response.headers.get("content-type");
            if(contentType && contentType.indexOf("application/json") !== -1) {
                return response.json().then(function(json) {
                    if(json.length > 0){
                        json.forEach((el) => {
                            var contentString = `
                            <div id="content">
                                <div>
                                    <img src="${el.thumbnail}" alt="">
                                </div>
                                
                                <div>
                                    <h1 id="firstHeading" class="firstHeading">${el.name}</h1>
                                    
                                    <div id="bodyContent">
                                        <p>${el.description}</p>
                                        <p>${el.address}</p>
                                        <p><a href="${el.site}" target="_blank">Site de l'agence</a></p>
                                    </div>
                                </div>
                        </div>`;

                        var infowindow = new google.maps.InfoWindow({
                            content: contentString
                        });
                        var marker = new google.maps.Marker({
                            position: {lat: parseFloat(el.lat), lng: parseFloat(el.long)},
                            map: map,
                            title: el.title
                        });
                        marker.addListener('click', function() {
                            infowindow.open(map, marker);
                        });
                    })
                    }

                });
            }
        });
}