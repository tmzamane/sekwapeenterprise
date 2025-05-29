<!DOCTYPE html>
<html>
<head>
    <title>Booking Tracking</title>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVK5LXiKqTAAXAftww1oNgD7Y7A_s42kA&callback=initMap" async defer></script>
<script>
var map;
var vehicleMarker;
var lastUpdateTime = '<?php echo date('Y-m-d H:i:s', strtotime('-1 minute')); ?>';
var updateInterval; // Store the interval ID

function initMap() {
    var initialCenter = { lat: -26.000, lng: 28.000 };
    <?php if ($latest_location && $latest_location['latitude'] && $latest_location['longitude']): ?>
        initialCenter = {
            lat: parseFloat(<?php echo $latest_location['latitude']; ?>),
            lng: parseFloat(<?php echo $latest_location['longitude']; ?>)
        };
    <?php endif; ?>

    map = new google.maps.Map(document.getElementById('map'), {
        center: initialCenter,
        zoom: 12
    });

    vehicleMarker = new google.maps.Marker({
        map: map,
        position: initialCenter,
        title: 'Current Location'
    });

    startFetchingUpdates(); // Call startFetchingUpdates instead of fetchUpdates
}

function updateMapLocation(latitude, longitude) {
    console.log("updateMapLocation called with:", latitude, longitude);
    if (map && vehicleMarker) {
        const newLatLng = new google.maps.LatLng(latitude, longitude);
        vehicleMarker.setPosition(newLatLng);
        map.panTo(newLatLng);
    } else {
        console.warn("map or vehicleMarker is not defined in updateMapLocation");
    }
}

function addTrackingHistoryEntry(status, timestamp, details) {
    const historyDiv = document.getElementById('tracking-history');
    if (historyDiv) {
        const newEntry = document.createElement('p');
        newEntry.textContent = `Status: ${status}, Timestamp: ${timestamp}, Details: ${details}`;
        historyDiv.prepend(newEntry);
    }
}

function fetchUpdates() {
    const bookingId = new URLSearchParams(window.location.search).get('booking_id');
    const url = `get_updates.php?booking_id=${bookingId}&last_update=${encodeURIComponent(lastUpdateTime)}`;
    console.log("Fetching URL:", url);
    console.log("lastUpdateTime before fetch:", lastUpdateTime);
    fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log('Received data:', data);

            if (data && data.length > 0) {
                let latestTimestamp = lastUpdateTime;

                data.forEach(update => {
                    if (update.status && update.booking_timestamp && update.event_details) {
                        addTrackingHistoryEntry(
                            update.status,
                            update.booking_timestamp,
                            update.event_details
                        );
                    }
                    if (update.latitude && update.longitude) {
                        updateMapLocation(update.latitude, update.longitude);
                    }
                    if (update.booking_timestamp > latestTimestamp) {
                        latestTimestamp = update.booking_timestamp;
                    }
                });
                lastUpdateTime = latestTimestamp;
                console.log("lastUpdateTime after fetch:", lastUpdateTime);

            } else if (data && data.status !== 'no_update' && !data.error) {
                if (data.latitude && data.longitude) {
                    updateMapLocation(data.latitude, data.longitude);
                }
                if (data.status && data.booking_timestamp && data.event_details) {
                    addTrackingHistoryEntry(
                        data.status,
                        data.booking_timestamp,
                        data.event_details
                    );
                    lastUpdateTime = data.booking_timestamp;
                }
                console.log("lastUpdateTime after fetch (single):", lastUpdateTime);
            }
            
            if (data && data.trip_ended === true) { // Check for trip_ended
                console.log("Trip ended, stopping updates");
                clearInterval(updateInterval); // Stop the interval
            }
        })
        .catch(error => {
            console.error('Error fetching updates:', error);
        })
        .finally(() => {
           if (!updateInterval) { // check if updateInterval is defined
               setTimeout(fetchUpdates, 1500);
           }
        });
}

function startFetchingUpdates() {
    updateInterval = setInterval(fetchUpdates, 1500); // Start updates, store ID
}

</script>


</head>
<body>
    <h1>Booking Tracking</h1>
    <div id="map"></div>
</body>
</html>
