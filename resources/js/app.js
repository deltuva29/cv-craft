import './bootstrap';
import ToastComponent from '../../vendor/usernotnull/tall-toasts/resources/js/tall-toasts';
import "splitting/dist/splitting.css";
import "splitting/dist/splitting-cells.css";
import Splitting from "splitting";
import AOS from 'aos';
import 'aos/dist/aos.css';

window.Alpine.plugin(ToastComponent);

AOS.init();

Splitting();

const elements = document.querySelectorAll('.observe');

const observer = new IntersectionObserver(function handleIntersection(entries) {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible')
        } else {
            entry.target.classList.remove('visible')
        }
    });
});

elements.forEach(element => observer.observe(element));