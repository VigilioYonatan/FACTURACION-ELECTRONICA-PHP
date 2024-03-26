import "vite/modulepreload-polyfill"; //https://vitejs.dev/guide/backend-integration
import "@vigilio/sweet/sweet.min.css";
import "aos/dist/aos.css";
import Alpine from "alpinejs";
import AOS from "aos";
import { lazy } from "preact/compat";
import render from "./libs/preact";
import "tiny-slider/dist/tiny-slider.css";

Alpine.start();
AOS.init();

render(
    "Counter",
    lazy(() => import("@/Counter.tsx"))
);
