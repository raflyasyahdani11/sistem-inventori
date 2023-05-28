import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

const fs = require("fs");
const path = require("path");

function traverseDirectory(directoryPath) {
    const files = fs.readdirSync(directoryPath);
    const filePaths = [];

    files.forEach((file) => {
        const filePath = path.join(directoryPath, file);
        const stat = fs.statSync(filePath);

        if (stat.isFile()) {
            filePaths.push(filePath);
        } else if (stat.isDirectory()) {
            const nestedFilePaths = traverseDirectory(filePath);
            filePaths.push(...nestedFilePaths);
        }
    });

    return filePaths;
}

const directoryPath = "resources/js/pages";
const extraFiles = traverseDirectory(directoryPath);

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                ...extraFiles,
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
