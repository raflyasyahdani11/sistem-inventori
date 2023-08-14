import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import glob from "glob";
import path from "node:path";
import { fileURLToPath } from "node:url";

let js = Object.fromEntries(
    glob
        .sync("resources/js/pages/**/*.js")
        .map((file) => [
            path.relative(
                "resources/js/pages",
                file.slice(0, file.length - path.extname(file).length)
            ),
            fileURLToPath(new URL(file, import.meta.url)),
        ])
);
js = Object.values(js);

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                ...js,
            ],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                assetFileNames: (assetInfo) => {
                    let extension =
                        assetInfo.name?.split(".").at(1) ?? "compiled";

                    return `${extension}/[name].[hash][extname]`;
                },
                chunkFileNames: "js/chunks/[name].[hash].js", // all chunks output path
                entryFileNames: "js/[name].[hash].js", // all entrypoints output path
            },
        },
    },
});
