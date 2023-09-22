let frameGrid = document.querySelector(".frameGrid");

frameLeft.appendChild(lu);
let folios = [];


async function loadFolios(file) {
    const response = await fetch(file);
    folios = await response.json();
    for (const folio of folios) {
        frameGrid.innerHTML += `<div class="folio scale">${folio.name}<img class='scale' onClick="onImage('${folio.link}')" src="/images/loading.gif" alt="folio image"></div>`
    }
    const tabfolios = document.querySelectorAll('.folio');
    await preloadImages(folios).then((images) => {
            let indice = 0;
            for (const image of images) {
                let folioCur = tabfolios[indice];
                let imgCur = folioCur.childNodes[1];
                imgCur.style = "width:80%;height:80%;";

                imgCur.src = image.src
                indice += 1;
            }
        }
    );
}

function preloadImages(imagePaths) {
    const promises = imagePaths.map((imagePath) => {
        return new Promise((resolve, reject) => {
            const img = new Image();
            img.onload = () => resolve(img);
            img.onerror = (event) => {
                img.src = "/images/noimage.jpg";
                resolve(img)
            };
            img.src = imagePath.image;
        });
    });
    return Promise.all(promises);
}

function onImage(link) {
    window.location.href = `${link}`;
}
