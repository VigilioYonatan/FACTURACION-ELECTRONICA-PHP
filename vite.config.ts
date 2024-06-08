import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import preact from "@preact/preset-vite";
import million from "million/compiler";
import path from "node:path";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/main.css", "resources/ts/main.ts"],
            refresh: true,
        }),
        million.vite({ mode: "preact" }),
        preact(),
    ],
    resolve: {
        alias: {
            "@": path.resolve(__dirname, "resources", "ts", "services"),
            "~": path.resolve(__dirname, "resources", "ts"),
        },
    },
    server: {
        strictPort: true,
        port: 5133,
        host: true,
        watch: {
            usePolling: true, // docker
        },
        hmr: {
            host: "localhost",
        },
    },
});
