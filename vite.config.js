import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

import { globSync } from "glob";
import path from "node:path";
import { fileURLToPath } from "node:url";

const jsCustom = Object.fromEntries(
    globSync("resources/js/pages/**/*.[js/css]").map((file) => [
        path.relative(
            "resources/js/pages",
            file.slice(0, file.length - path.extname(file).length)
        ),
        fileURLToPath(new URL(file, import.meta.url)),
    ])
);

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js", jsCustom],
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
