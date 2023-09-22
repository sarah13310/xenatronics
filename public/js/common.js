let frameLeft = document.querySelector(".frameLeft");
let socials = document.querySelector("#socials");
let lu = document.createElement('ul');
frameLeft.appendChild(lu);

async function loadMenu(file) {
    const response = await fetch(file);
    const names = await response.json();
    for (const item of names) {
        const strCapital = item.name.charAt(0).toUpperCase() + item.name.slice(1);
        lu.innerHTML += `<li ><a href="${item.link}">${strCapital}</a></li>`
    }
}

async function loadSocials(file) {
    const response = await fetch(file);
    const names = await response.json();
    for (const item of names) {
        const strCapital = item.name.charAt(0).toUpperCase() + item.name.slice(1);
        socials.innerHTML += `<a  href="${item.link}" class="rond ${item.icon} mb-4" data-bs-toggle="tooltip" data-bs-title="${strCapital}"  ></a>`;
    }
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

}