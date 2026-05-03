/** @type {import('tailwindcss').Config} */
const fs = require('fs');

const safelist = fs.existsSync('./safelist.txt')
    ? fs.readFileSync('./safelist.txt', 'utf8').split(/\r?\n/).filter(Boolean)
    : [];

module.exports = {
    darkMode: ['selector', '[data-theme="dark"]'],
    content: [
        './*.php',
        './template-parts/**/*.php',
        './tutor/**/*.php',
        './src/**/*.php',
        './resources/**/*.{php,js,jsx,ts,tsx,vue}',
        './safelist.txt',
        '!./vendor/**',
        '!./node_modules/**',
    ],
    safelist,
    theme: {
        extend: {
            colors: {
                primary: '#2170F5',
                accent: '#24B979',
            },
            fontFamily: {
                sans: ['"Inter Variable"', 'Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
        },
    },
    plugins: [],
};
