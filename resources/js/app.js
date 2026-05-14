import "./bootstrap";

/* =========================================================
   LIBRARIES (Global)
   ========================================================= */

import Alpine from "alpinejs";
import axios from "axios";
import Swal from "sweetalert2";
import Chart from "chart.js/auto";
import flatpickr from "flatpickr";
import TomSelect from "tom-select";

/* =========================================================
   GSAP (Hanya Import Core-nya saja)
   ========================================================= */

import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

/* =========================================================
   GLOBAL WINDOW REGISTRATION
   ========================================================= */

window.Alpine = Alpine;
window.axios = axios;
window.Swal = Swal;
window.Chart = Chart;
window.flatpickr = flatpickr;
window.TomSelect = TomSelect;
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

Alpine.start();