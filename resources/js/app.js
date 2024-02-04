import './bootstrap';
import "splitting/dist/splitting.css";
import "splitting/dist/splitting-cells.css";
import Splitting from "splitting";
import AOS from 'aos';
import 'aos/dist/aos.css';

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