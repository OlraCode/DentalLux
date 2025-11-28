import './bootstrap';
import '../css/app.css';
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

document.addEventListener("DOMContentLoaded", function () {
    flatpickr("#date", {
        dateFormat: "d/m/Y",
        disable: [
            function (date) {
                // Desabilitar sábados e domingos
                return date.getDay() === 0 || date.getDay() === 6;
            }
        ],
        minDate: "today",
        maxDate: new Date().fp_incr(60)
    });
});
