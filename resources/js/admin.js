const keuangan = document.querySelector('#keuangan');
const menuKeuangan = document.querySelector('#menuKeuangan');
const keuanganRight = document.querySelector('#keuanganRight');
const keuanganDown = document.querySelector('#keuanganDown');
const filter = document.querySelector('#filter');
const menuFilter = document.querySelector('#menuFilter');
const bgFilter = document.querySelector('#bgFilter');
const closeFilter = document.querySelector('#closeFilter');
const hamburger = document.querySelector('#hamburger');
const navMenu = document.querySelector('#nav-menu');
const bgDetail = document.querySelector('#bgDetail');
const isiDetail = document.querySelector('#isiDetail');
const closeDetail = document.querySelector('#closeDetail');
const echo = document.querySelector('#echo');
const menuEcho = document.querySelector('#menuEcho');
const echoRight = document.querySelector('#echoRight');
const echoDown = document.querySelector('#echoDown');
const terima = document.querySelector('#terima');
const userStatusId = document.querySelector('#userStatusId');
const closeAccept = document.querySelector('#close-accept');
const acceptId = document.querySelector('#acceptId');
const tolak = document.querySelector('#tolak');
const closeReject = document.querySelector('#close-reject');
const rejectId = document.querySelector('#rejectId');
const pick = document.getElementById('pick');
const searchForm = document.getElementById('searchForm');
const detailItems = document.querySelectorAll('.detail-item');
const acceptUsers = document.querySelectorAll('.accept-user');
const rejectUsers = document.querySelectorAll('.reject-user');
const expenseTypes = document.querySelectorAll('.expense-type');
const productModal = document.querySelector('#productModal');
const image = document.querySelector('#image');
const file = document.querySelector('#file');
const fieldInput1 = document.querySelector('.fieldImage1');
const fieldInput2 = document.querySelector('.fieldImage2');
const chat = document.querySelector('#chat');
const menuChat = document.querySelector('#menuChat');
const closeChat = document.querySelector('#closeChat');
const userInput = document.querySelector('#user-input');
const sendMessage = document.querySelector('#sendMessage');
const searchInput = document.getElementById('search');
const listToko = document.getElementById('listToko');
const namaTokoItems = document.querySelectorAll('.namaToko');

//token api
const apiUrl = 'https://api.openai.com/v1/chat/completions';
const apiKey = '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'; // Ganti dengan API key Anda

sendMessage.addEventListener('click', async function () {
    const userInput = document.getElementById('user-input').value;
    const chatMessages = document.getElementById('chat-messages');

    if (userInput.trim() === '') return;

    yourMessage(userInput)
    document.getElementById('user-input').value = '';

    const requestBody = {
        model: 'gpt-3.5-turbo',
        messages: [
            {
                role: 'user',
                content: userInput
            }
        ]
    };

    try {
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${apiKey}`
            },
            body: JSON.stringify(requestBody)
        });

        const data = await response.json();
        const botReply = data.choices[0].message.content;
        botMessage(botReply)
    } catch (error) {
        console.error('Error:', error);
        youMessage('Bot: Sorry, there was an error processing your request.');
    }
});

function yourMessage(input) {
    const chatMessages = document.getElementById('chat-messages');
    const userInput = document.getElementById('user-input');

    // Membuat elemen div utama
    const messageContainer = document.createElement('div');
    messageContainer.classList.add('flex', 'w-full', 'gap-2', 'py-2');

    // Membuat elemen div untuk avatar
    const avatarContainer = document.createElement('div');

    const avatar = document.createElement('div');
    avatar.classList.add('min-h-6', 'min-w-6', 'bg-slate-500', 'rounded-full');

    avatarContainer.appendChild(avatar);
    messageContainer.appendChild(avatarContainer);

    // Membuat elemen div untuk teks pesan
    const textContainer = document.createElement('div');
    textContainer.classList.add('break-words', 'w-full', 'pe-7');

    const boldText = document.createElement('p');
    boldText.classList.add('font-bold');
    boldText.textContent = 'You';

    const messageText = document.createElement('p');
    messageText.textContent = input;

    textContainer.appendChild(boldText);
    textContainer.appendChild(messageText);
    messageContainer.appendChild(textContainer);

    // Menambahkan elemen ke dalam chat-messages
    chatMessages.appendChild(messageContainer);
    userInput.style.height = '40px';
}

function botMessage(output) {
    const chatMessages = document.getElementById('chat-messages');

    // Membuat elemen div utama
    const messageContainer = document.createElement('div');
    messageContainer.classList.add('flex', 'w-full', 'gap-2', 'py-2');

    // Membuat elemen div untuk avatar
    const avatarContainer = document.createElement('div');

    const avatar = document.createElement('div');
    avatar.classList.add('min-h-6', 'min-w-6', 'bg-slate-500', 'rounded-full');

    avatarContainer.appendChild(avatar);
    messageContainer.appendChild(avatarContainer);

    // Membuat elemen div untuk teks pesan
    const textContainer = document.createElement('div');
    textContainer.classList.add('break-words', 'w-full', 'pe-7');

    const boldText = document.createElement('p');
    boldText.classList.add('font-bold');
    boldText.textContent = 'ChatBot';

    const messageText = document.createElement('p');
    messageText.textContent = output;

    textContainer.appendChild(boldText);
    textContainer.appendChild(messageText);
    messageContainer.appendChild(textContainer);

    // Menambahkan elemen ke dalam chat-messages
    chatMessages.appendChild(messageContainer);
}

const selectStore = document.querySelector('#selectStore');

// Toko
if (selectStore) {
    selectStore.addEventListener('change', function () {
        return new Promise((resolve, reject) => {
            try {
                fetch(window.location.origin + `/admin/store/?api&select=${this.value}`)
                    .then(response => response.json())
                    .then(data => {
                        window.location.reload(); // Refresh page with exactly the same URL (including queries and endpoint)
                        resolve();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        reject(error);
                    });
            } catch (error) {
                console.error('Error:', error);
                reject(error);
            }
        });
    });
}


// Financial Menu
keuangan.addEventListener('click', function () {
    menuKeuangan.classList.toggle('hidden');
    keuanganRight.classList.toggle('hidden');
    keuanganDown.classList.toggle('hidden');
});

//menu echo
echo.addEventListener('click', function () {
    menuEcho.classList.toggle('hidden');
    echoRight.classList.toggle('hidden');
    echoDown.classList.toggle('hidden');
});

//filter
if (filter != null) {
    filter.addEventListener('click', function () {
        menuFilter.classList.remove('hidden');
        bgFilter.classList.remove('hidden');
    });
    closeFilter.addEventListener('click', function () {
        menuFilter.classList.add('hidden');
        bgFilter.classList.add('hidden');
    });
    bgFilter.addEventListener('click', function () {
        menuFilter.classList.add('hidden');
        bgFilter.classList.add('hidden');
    });

}

//chat
if (chat != null) {
    var isDragging = false;
    var clickDrag = false;
    var offset = { x: 0, y: 0 };

    function hello() {
        menuChat.classList.remove('hidden');
        bgFilter.classList.remove('hidden');
    }

    chat.addEventListener("mousedown", function (event) {
        isDragging = true;
        clickDrag = true;
        offset.x = event.clientX - chat.offsetLeft;
        offset.y = event.clientY - chat.offsetTop;
    });

    chat.addEventListener("mouseup", function (event) {
        isDragging = false;
        if (clickDrag) {
            hello();
        }
    });

    document.addEventListener("mousemove", function (event) {
        clickDrag = false;
        if (isDragging) {
            chat.style.left = event.clientX - offset.x + "px";
            chat.style.top = event.clientY - offset.y + "px";
        }
    });

    //costum text area
    userInput.addEventListener('input', function () {
        userInput.style.height = 'auto';
        userInput.style.height = userInput.scrollHeight + 'px';
    });

}
if (closeChat != null) {
    closeChat.addEventListener('click', function () {
        menuChat.classList.add('hidden');
        bgFilter.classList.add('hidden');
    });
}
if (bgFilter != null) {
    bgFilter.addEventListener('click', function () {
        menuChat.classList.add('hidden');
        bgFilter.classList.add('hidden');
    });
}

// hamburger
hamburger.addEventListener('click', function () {
    hamburger.classList.toggle('hamburger-active');
    navMenu.classList.toggle('hidden');
});

detailItems.forEach(function (element) {
    element.addEventListener('click', function () {
        const img = element.getAttribute('detailImg');
        const title = element.getAttribute('detailTitle');
        const desc = element.getAttribute('detailDesc');

        if (userStatusId != null) {
            var value = element.getAttribute('value');
            userStatusId.setAttribute('value', value);
        }
        if (title != null) {
            isiDetail.querySelector('.detail-title').innerHTML = title;
        }
        if (desc != null) {
            isiDetail.querySelector('.detail-desc').innerHTML = desc;
        }
        if (img != null) {
            isiDetail.querySelector('.detail-img').setAttribute('src', img);
        }
        isiDetail.classList.remove('hidden');
        bgDetail.classList.remove('hidden');
    });
});

// Search
if (pick != null) {
    pick.addEventListener("change", function () {
        searchForm.submit();
    });
}

if (closeDetail != null) {
    closeDetail.addEventListener('click', function () {
        isiDetail.classList.add('hidden');
        bgDetail.classList.add('hidden');
    });
}

if (bgDetail != null) {
    bgDetail.addEventListener('click', function () {
        isiDetail.classList.add('hidden');
        bgDetail.classList.add('hidden');
    });
}


// User
acceptUsers.forEach(function (element) {
    element.addEventListener('click', function () {
        var value = element.getAttribute('value');
        acceptId.setAttribute('value', value);
        terima.classList.remove('hidden');
        bgDetail.classList.remove('hidden');
    });
});
if (closeAccept != null) {
    closeAccept.addEventListener('click', function () {
        terima.classList.add('hidden');
        bgDetail.classList.add('hidden');
    });
    bgDetail.addEventListener('click', function () {
        terima.classList.add('hidden');
        bgDetail.classList.add('hidden');
    });

}

// Tolak User
rejectUsers.forEach(function (element) {
    element.addEventListener('click', function () {
        var value = element.getAttribute('value');
        rejectId.setAttribute('value', value);
        tolak.classList.remove('hidden');
        bgDetail.classList.remove('hidden');
    });
});
if (closeReject != null) {
    closeReject.addEventListener('click', function () {
        tolak.classList.add('hidden');
        bgDetail.classList.add('hidden');
    });
    bgDetail.addEventListener('click', function () {
        tolak.classList.add('hidden');
        bgDetail.classList.add('hidden');
    });
}

//preview image
if (image != null) {
    image.addEventListener('change', function () {
        const imgPreview1 = document.querySelector('.img-preview1');

        imgPreview1.style.display = 'block';

        const oFReader1 = new FileReader();
        oFReader1.readAsDataURL(image.files[0])

        oFReader1.onload = function (oFREvent) {
            imgPreview1.src = oFREvent.target.result;
        }

        fieldInput1.classList.add('hidden');
    });
}

if (file != null) {
    file.addEventListener('change', function () {
        const imgPreview2 = document.querySelector('.img-preview2');

        imgPreview2.style.display = 'block';

        const oFReader2 = new FileReader();
        oFReader2.readAsDataURL(file.files[0])

        oFReader2.onload = function (oFREvent) {
            imgPreview2.src = oFREvent.target.result;
        }

        fieldInput2.classList.add('hidden');
    });
}

// Expense
if (expenseTypes.length > 0) {
    const intervalInput = document.querySelector('#interval');
    const intervalLabel = document.querySelector('#intervalLabel');
    const dateEndInput = document.querySelector('#dateEnd');
    const dateEndLabel = document.querySelector('#dateEndLabel');

    expenseTypes.forEach(function (element) {
        element.addEventListener('change', function () {
            const isRutin = element.value === 'Rutin';
            intervalInput.disabled = !isRutin;
            intervalInput.required = isRutin;
            intervalLabel.innerHTML = isRutin ? 'Interval (bulan)*' : 'interval (bulan)';
            intervalInput.value = null;
            dateEndInput.disabled = !isRutin;
            dateEndInput.required = isRutin;
            dateEndLabel.innerHTML = isRutin ? 'Tanggal selesai*' : 'Tanggal selesai';
            dateEndInput.value = null;
        });
    });
}

// Order Modal
if (productModal != null) {
    const productModalShow = document.querySelectorAll('.product-modal-show');
    const productModalClose = document.querySelectorAll('.product-modal-close');
    const productModalContent = document.querySelector('#productModalContent');
    const productModalTable = document.querySelector('#productModalTable');
    const productModalPages = document.querySelector('#productModalPages');
    const productModalTotal = document.querySelector('#productModalTotal');
    const productModalSearch = document.querySelector('#productModalSearch');
    const productModalPick = document.querySelector('#productModalPick');
    const productModalCancel = document.querySelector('#productModalCancel');
    const productModalSave = document.querySelector('#productModalSave');
    const productInput = document.querySelector('#productInput');

    let productPage = 1;
    let productItemTemps = [];
    let productItems = [];

    productModalSearch.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            productPage = 1;
            loadModal();
        }
    });

    productModalShow.forEach(function (element) {
        element.addEventListener('click', function () {
            productPage = 1;
            productModalSearch.value = '';
            productItemTemps = [...productItems];
            loadModal().then(() => {
                productModal.classList.remove('hidden');
                productModalContent.classList.remove('hidden');
            });
        });
    });

    productModalClose.forEach(function (element) {
        element.addEventListener('click', function () {
            productModal.classList.add('hidden');
            productModalContent.classList.add('hidden');
        });
    });

    productModalPick.addEventListener('change', function () {
        productPage = 1;
        loadModal();
    });

    productModalCancel.addEventListener('click', function () {
        productItemTemps = [...productItems];
    });

    productModalSave.addEventListener('click', function () {
        productItems = [...productItemTemps];
        loadProductInput();
    });

    const startProductInput = () => {
        const oldId = JSON.parse(productInput.getAttribute('oldid'));
        const oldName = JSON.parse(productInput.getAttribute('oldname'));
        const oldQuantity = JSON.parse(productInput.getAttribute('oldquantity'));

        if (oldId != null) {
            for (let i = 0; i < oldId.length; i++) {
                const productItem = {
                    id: parseInt(oldId[i]),
                    name: oldName[i],
                    quantity: parseInt(oldQuantity[i])
                };

                productItems.push(productItem);
            }

            loadProductInput();
        }
    }

    const loadProductInput = () => {
        document.querySelectorAll('.product-modal-input-quantity').forEach(function (element) {
            removeEvent(element);
        });

        productInput.innerHTML = '';
        productItems.forEach((item, index) => {
            let number = index + 1;
            const elementHtml = `
            <div class="sm:flex sm:w-[600px] mt-2">
            <div>
                <label for="productInputName${number}" class="block">Nama Produk*</label>
                <input type="text" id="productInputName${number}" name="product_name[]"
                    class="outline-none border border-gray-400 p-2 rounded-lg mb-4" value="${item.name}" readonly required>
            </div>
            <div class="sm:ms-6">
                <label for="productInputQuantity${number}" class="block">Jumlah*</label>
                <input type="number" id="productInputQuantity${number}" itemid="${item.id}" name="product_quantity[]"
                    class="outline-none border border-gray-400 p-2 rounded-lg mb-4 product-modal-input-quantity"
                    placeholder="Jumlah produk" value="${item.quantity}" required>
            </div>
            <div class="sm:ms-6" hidden>
                <label for="productInputId${number}" class="block">Id*</label>
                <input type="number" id="productInputId${number}" name="product_id[]"
                    class="outline-none text-gray-400 border border-gray-400 p-2 rounded-lg mb-4" value="${item.id}" readonly required>
            </div>
        </div>
            `;
            productInput.innerHTML += elementHtml;
        });

        document.querySelectorAll('.product-modal-input-quantity').forEach(function (element) {
            element.addEventListener('keydown', function () {
                if (this.value) {
                    const itemId = parseInt(element.getAttribute('itemid'));
                    const itemIndex = productItemTemps.findIndex(s => s.id == itemId);

                    if (itemIndex !== -1) {
                        productItemTemps[itemIndex].quantity = parseInt(element.value);
                    }
                }
            });
        });
    }

    const clearModal = () => {
        return new Promise((resolve, reject) => {
            try {
                document.querySelectorAll('.product-modal-navigator').forEach(function (element) {
                    removeEvent(element);
                });
                document.querySelectorAll('.product-modal-table-action').forEach(function (element) {
                    removeEvent(element);
                });
                resolve();
            } catch (error) {
                reject(error);
            }
        });
    };

    const loadModal = () => {
        return new Promise((resolve, reject) => {
            try {
                clearModal().then(s => fetch(window.location.origin + `/admin/product?api&search=${productModalSearch.value}&pick=${productModalPick.value}&page=${productPage}`)
                    .then(response => response.json())
                    .then(data => {
                        const products = data.products.data;
                        const page = data.products.current_page;
                        const defaultImg = productModalTable.getAttribute('defaultImg');
                        const productHtml = products.map(product => `
                        <tr class="border-b">
                                <td class="py-3 text-start px-3 flex">
                                    <div>
                                        <img src="${defaultImg}" alt="" class="rounded-full min-h-9 min-w-9">
                                    </div>
                                    <div id="" class="isiDetail ms-2 cursor-pointer">
                                        ${product.name}
                                        <p class="w-24 text-xs text-slate-500 overflow-hidden h-4">${product.description}</p>
                                    </div>
                                </td>
                                <td class="py-3 text-start px-3">${product.category_id}</td>
                                <td class="py-3 text-start px-3">${product.weight} ${product.unit}</td>
                                <td class="py-3 text-start px-3">${product.price}</td>
                                <td class="py-3 text-start px-3">
                                    ${product.stock}
                                </td>
                                <td class="py-3 text-center px-3 min-w-[150px]">
                                    <button class="border border-green-600 p-2 rounded-full cursor-pointer product-modal-table-action" id="${product.id}" name="${product.name}">
                                    </button>
                                </td>
                            </tr>
                    `).join('');

                        productModalTotal.innerHTML = `${data.total} produk`;

                        document.querySelector('#productModalPrev').value = page > 1 ? page - 1 : '';
                        document.querySelector('#productModalNext').value = page < data.products.last_page ? page + 1 : '';
                        productModalPages.innerHTML = '';
                        const links = data.products.links.filter(link => parseInt(link.label));
                        links.forEach(link => {
                            const anchor = ` <button value="${link.label}"
                        class="w-8 p-2.5 bg-gray-50 rounded-lg flex-col justify-center items-center gap-2.5 inline-flex ${link.active ? 'bg-lime-600 text-white' : ''} product-modal-navigator">
                        <div class="text-sm font-normal font-fredokaRegular leading-tight">
                            ${link.label}</div></button>`;
                            productModalPages.innerHTML += anchor;
                        });
                        productModalTable.innerHTML = productHtml;

                        document.querySelectorAll('.product-modal-navigator').forEach(function (element) {
                            element.addEventListener('click', function () {
                                if (this.value) {
                                    productPage = this.value
                                    loadModal();
                                }
                            });
                        });

                        document.querySelectorAll('.product-modal-table-action').forEach(function (element) {
                            actionMode(element);
                            element.addEventListener('click', function () {
                                const id = parseInt(this.getAttribute('id'));
                                const name = this.getAttribute('name');

                                if (id && name) {
                                    const existingProductIndex = productItemTemps.findIndex(s => s.id === id);

                                    if (existingProductIndex !== -1) {
                                        productItemTemps.splice(existingProductIndex, 1);
                                    } else {
                                        productItemTemps.push({ id, name, quantity: 1 });
                                    }

                                    actionMode(this, existingProductIndex !== -1)
                                }
                            });
                        });

                        resolve();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        reject(error);
                    }));
            } catch (error) {
                reject(error);
            }
        });
    }

    const removeEvent = (element) => {
        const clonedElement = element.cloneNode(true);
        element.parentNode.replaceChild(clonedElement, element);
    };

    const actionMode = (element) => {
        element.classList.remove('border-green-600');
        element.classList.remove('border-red-500');
        if (!productItemTemps.some(s => s.id === parseInt(element.getAttribute('id')))) {
            element.classList.add('border-green-600');
            element.innerHTML = `<a class=""><svg class="" width="16" height="16" viewBox="0 0 16 16"
            fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M15 7H9V1C9 0.447 8.552 0 8 0C7.448 0 7 0.447 7 1V7H1C0.448 7 0 7.447 0 8C0 8.553 0.448 9 1 9H7V15C7 15.553 7.448 16 8 16C8.552 16 9 15.553 9 15V9H15C15.552 9 16 8.553 16 8C16 7.447 15.552 7 15 7Z"
                fill="rgb(22 163 74)" /></svg></a>`;
        } else {
            element.classList.add('border-red-500');
            element.innerHTML = `<a class=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
            fill="rgb(239 68 68)" class="bi bi-dash-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8" />
            <path fill-rule="evenodd"
                d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8"
                transform="translate(0, 1)" /></svg></a>`;
        }
    }

    startProductInput();
}

//search toko
searchInput.addEventListener('input', function () {
    const searchTerm = this.value.trim().toLowerCase();

    if (this.value.trim() !== '') {
        listToko.classList.remove('hidden');
    } else {
        listToko.classList.add('hidden');
    }

    namaTokoItems.forEach(item => {
        const namaTokoText = item.textContent.trim().toLowerCase();

        if (namaTokoText.includes(searchTerm)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});

namaTokoItems.forEach(item => {
    item.addEventListener('click', function () {
        const namaTokoText = this.textContent.trim();
        searchInput.value = namaTokoText;
    });
});
