const chat = document.querySelector('#chat');
const menuChat = document.querySelector('#menuChat');
const closeChat = document.querySelector('#closeChat');
const userInput = document.querySelector('#user-input');
const sendMessage = document.querySelector('#sendMessage');
const bgFilter = document.querySelector('#bgFilter');

//token api
const apiUrl = 'https://api.openai.com/v1/chat/completions';
const apiKey = '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'; // Ganti dengan API key Anda

sendMessage.addEventListener('click', async function () {
    console.log("Hello");
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
