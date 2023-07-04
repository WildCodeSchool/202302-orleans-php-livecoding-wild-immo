import { Controller } from '@hotwired/stimulus';

/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */
export default class extends Controller {

    /* eslint-disable */
    static targets = ['estate']; // eslint-disable-line

    connect() {
        let map = L.map('map').setView([45, 1], 6);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        for (let estate of this.estateTargets) {
            let marker = L.marker([estate.dataset.latitude, estate.dataset.longitude]).addTo(map);
            marker.bindPopup(estate.querySelector('h2').textContent).openPopup();
        }

    }
}
