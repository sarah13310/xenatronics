let frameLeft = document.querySelector(".frameLeft");
let socials = document.querySelector("#socials");
let lu = document.createElement('ul');
const status = document.querySelector("#status");
const account = document.querySelector("#compte");
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

function loadImage(element, url) {
    let image = new Image();
    image.onload = () => {
        element.src = image.src;
    }
    image.onerror = () => {
        element.src = "../assets/images/noimage.jpg"
    }
    image.src = url;
}

function loadFileImage(selectedFile) {
    if (selectedFile) {
        const reader = new FileReader();
        reader.onload = (e) => {
            image_p.src = e.target.result;
        };
        reader.onerror = () => {
            image_p.src = "/assets/images/noimage.jpg";
        };
        reader.readAsDataURL(selectedFile);
    }
}

function loadDefaultLogo(){
    const logo=document.querySelector(".logo-img")
    loadImage(logo,"../assets/images/blank.png");
}

function showStatus(verified) {
    if (verified) {
        status.classList.add('bg-primary');
        status.classList.remove('bg-danger');
        status.innerText = 'vérifié';
    } else {
        status.classList.remove('bg-primary');
        status.classList.add('bg-danger');
        status.innerText = 'non vérifié';
    }
}

function showRoles(roles) {
    switch (roles) {
        case "ROLE_USER":
            account.innerHTML = "Compte : <b>utilisateur</b>";
            break;
        case "ROLE_ADMIN":
            account.innerHTML = "Compte : <b>administrateur</b>";
            break;
        case "ROLE_SADMIN":
            account.innerHTML = "Compte : <b>super administrateur</b>";
            break;
        default:
            account.innerHTML = "Compte : <b>indéterminé</b>";
            break;
    }
}