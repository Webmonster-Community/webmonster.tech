function clampBuilder(minWidthPx, maxWidthPx, minFontSize, maxFontSize) {
    const root = document.querySelector("html");
    const pixelsPerRem = Number(getComputedStyle(root).fontSize.slice(0, -2));

    const minWidth = minWidthPx / pixelsPerRem;
    const maxWidth = maxWidthPx / pixelsPerRem;

    const slope = (maxFontSize - minFontSize) / (maxWidth - minWidth);
    const yAxisIntersection = -minWidth * slope + minFontSize;

    return `clamp(${minFontSize}rem, ${yAxisIntersection}rem + ${
        slope * 100
    }vw, ${maxFontSize}rem)`;
}

function calculateCh(element, fontSize) {
    const zero = document.createElement("span");
    zero.innerText = "0";
    zero.style.position = "absolute";
    zero.style.fontSize = fontSize;

    element.appendChild(zero);
    const chPixels = zero.getBoundingClientRect().width;
    element.removeChild(zero);

    return chPixels;
}
document.querySelectorAll("h1").forEach((p) => {
    p.style.fontSize = clampBuilder(320, 960, 2, 5);
    p.style.width = `${(320 / calculateCh(p, "2rem")) * 0.9}ch`;
});
document.querySelectorAll("h2.title").forEach((p) => {
    p.style.fontSize = clampBuilder(320, 960, 1, 3);
    p.style.width = `${(320 / calculateCh(p, "2rem")) * 0.9}ch`;
});
document.querySelectorAll(".p").forEach((p) => {
    p.style.fontSize = clampBuilder(320, 960, 1, 3);
    p.style.width = `${(320 / calculateCh(p, "1rem")) * 0.9}ch`;
});
document.querySelectorAll(".lead").forEach((p) => {
    p.style.fontSize = clampBuilder(320, 960, 1, 3.2);
    p.style.width = `${(320 / calculateCh(p, "1rem")) * 0.9}ch`;
});
document.querySelectorAll("small").forEach((p) => {
    p.style.fontSize = clampBuilder(320, 960, 1, 1);
    p.style.width = `${(320 / calculateCh(p, "2rem")) * 0.9}ch`;
});