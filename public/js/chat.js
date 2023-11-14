function borrar (){
/*const msgerForm = get(".msger-inputarea");
const msgerInput = get(".msger-input");
const msgerChat = get(".msger-chat");
const PERSON_IMG = "https://image.flaticon.com/icons/svg/145/145867.svg";
const chatWith = get(".chatWith");
const typing = get(".typing");
const chatStatus = get(".chatStatus");
const chatId = window.location.pathname.substr(6);
let authUser;
let typingTimer = false;

window.onload = function () {

  axios.get('/auth/user')
  .then( res => {

    authUser = res.data.authUser;

  })
  .then(() => {

    axios.get(`/chat/${chatId}/get_users`).then( res => {

      let results = res.data.users.filter( user => user.id != authUser.id);

      if(results.length > 0)
        chatWith.innerHTML = results[0].name;

    });

  })
  .then(() => {

    axios.get(`/chat/${chatId}/get_messages`).then(res => {

      appendMessages(res.data.messages);

    });

  })
  .then(() => {

    Echo.join(`chat.${chatId}`)
      .listen('MessageSent', (e) => {

        appendMessage(
          e.message.user.name,
          PERSON_IMG,
          'left',
          e.message.content,
          formatDate(new Date(e.message.created_at))
        );

      })
      .here(users => {

        let result = users.filter(user => user.id != authUser.id);

          if(result.length > 0)
            chatStatus.className = 'chatStatus online';

      })
      .joining(user => {

        if(user.id != authUser.id)
          chatStatus.className = 'chatStatus online';

      })
      .leaving(user => {

        if(user.id != authUser.id)
          chatStatus.className = 'chatStatus offline';

      })
      .listenForWhisper('typing', e => {

        if(e > 0)
          typing.style.display = '';

        if(typingTimer){
          clearTimeout(typingTimer);
        }

        typingTimer = setTimeout( () => {

          typing.style.display = 'none';

          typingTimer = false;

        }, 3000);

      });

  });

}

msgerForm.addEventListener("submit", event => {

  event.preventDefault();

  const msgText = msgerInput.value;

  if (!msgText) return;

  axios.post('/message/sent', {
    message: msgText,
    chat_id: chatId
  }).then( res => {

    let data = res.data;

    appendMessage(
      data.user.name,
      PERSON_IMG,
      'right',
      data.content,
      formatDate(new Date(data.created_at))
    );

  }).catch( error => {

    console.log('Ha ocurrido un error');
    console.log(error);

  });

  msgerInput.value = "";
});

function appendMessages(messages)
{
  let side = 'left';

  messages.forEach(message => {

    side = (message.user_id == authUser.id) ? 'right' : 'left';

    appendMessage(
      message.user.name,
      PERSON_IMG,
      side,
      message.content,
      formatDate(new Date(message.created_at))
    );

  })
}

function appendMessage(name, img, side, text, date) {

  //   Simple solution for small apps
  const msgHTML = `
    <div class="msg ${side}-msg">
      <div class="msg-img" style="background-image: url(${img})"></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${name}</div>
          <div class="msg-info-time">${date}</div>
        </div>

        <div class="msg-text">${text}</div>
      </div>
    </div>
  `;

  msgerChat.insertAdjacentHTML("beforeend", msgHTML);

  scrollToBottom();
}

function sendTypingEvent()
{

  typingTimer = true;

  Echo.join(`chat.${chatId}`)
    .whisper('typing', msgerInput.value.length);

}


// Utils
  function get(selector, root = document) {
    return root.querySelector(selector);
  }

  function formatDate(date) {

    const d = date.getDate();
    const mo = date.getMonth() + 1;
    const y = date.getFullYear();
    const h = "0" + date.getHours();
    const m = "0" + date.getMinutes();

    return `${d}/${mo}/${y} ${h.slice(-2)}:${m.slice(-2)}`;
    
  }

  function scrollToBottom()
  {
    msgerChat.scrollTop = msgerChat.scrollHeight;
  }*/
}

const msgerForm = get(".msger-inputarea");
const msgerInput = get(".msger-input");
const msgerChat = get(".msger-chat");

const BOT_MSGS = [
  "¡Ohh... No puedo entender lo que estás tratando de decir. ¡Lo siento!",
  "Me gusta jugar a ese juego... ¡Pero no sé cómo jugar!",
  "Lo siento no entiendo lo quieres preguntar. :))",
  "¡Tengo sueño! :("
];
const QA_PAIRS = [
  { question: "Hola", answer: "¡Hola! ¿Cómo estás?" },
  { question: "¿Cómo estás?", answer: "Estoy bien, gracias por preguntar." },
  { question: "¿Cuál es tu nombre?", answer: "Mi nombre es BOT." },
  { question: "¿Qué haces?", answer: "Estoy aquí para ayudarte y chatear contigo." },
  { question: "¿Cuál es tu color favorito?", answer: "No tengo preferencias de color, pero me gusta el azul." },
  { question: "¿Cómo puedo contactarte?", answer: "Puedes contactarme a través de este chat." },
  { question: "¿Cuántos años tienes?", answer: "No tengo edad, soy un programa de chat." },
  { question: "¿Qué puedes hacer?", answer: "Puedo responder preguntas y chatear contigo." },
  { question: "¿De dónde eres?", answer: "Soy un programa de chat, no tengo una ubicación física." },
  { question: "¿Cuál es el sentido de la vida?", answer: "La respuesta a esa pregunta es subjetiva y puede variar para cada persona." },
  { question: "¿Tienes hermanos?", answer: "No, soy un programa único." },
  { question: "¿Cuál es tu comida favorita?", answer: "No como, pero me gusta la información interesante." },
  { question: "¿Puedes ayudarme con algo?", answer: "¡Por supuesto! Estoy aquí para ayudarte en lo que pueda." },
  { question: "¿Cómo se pronuncia tu nombre?", answer: "Puedes llamarme BOT, se pronuncia como se lee." },
  { question: "¿Qué opinas sobre la inteligencia artificial?", answer: "La inteligencia artificial es fascinante y está en constante evolución." },
  { question: "¿Eres humano?", answer: "No, soy un programa de inteligencia artificial." },
  { question: "¿Puedes contarme un chiste?", answer: "¡Claro! ¿Por qué los pájaros no usan Facebook? Porque ya tienen Twitter." },
  { question: "¿Cuál es tu película favorita?", answer: "No tengo preferencias de película, pero me encanta aprender sobre nuevas películas." },
  { question: "¿Cómo aprendiste a chatear?", answer: "Fui programado para responder preguntas y chatear de manera natural." },
  { question: "¿Qué hora es?", answer: `La hora actual es ${formatDate(new Date())}.` },
  // Agrega más preguntas y respuestas según sea necesario
];
// Icons made by Freepik from www.flaticon.com
const BOT_IMG = "/img/OIP.jpg";
const PERSON_IMG = "/img/us4.jpg";
const BOT_NAME = "BOT";

msgerForm.addEventListener("submit", event => {
  event.preventDefault();

  const msgText = msgerInput.value;
  if (!msgText) return;

  appendMessage(PERSON_NAME, PERSON_IMG, "right", msgText);
  msgerInput.value = "";

  const response = getBotResponse(msgText);
  appendMessage(BOT_NAME, BOT_IMG, "left", response);
});

function appendMessage(name, img, side, text) {
  const msgHTML = `
    <div class="msg ${side}-msg">
      <div class="msg-img" style="background-image: url(${img})"></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${name}</div>
          <div class="msg-info-time">${formatDate(new Date())}</div>
        </div>

        <div class="msg-text">${text}</div>
      </div>
    </div>
  `;

  msgerChat.insertAdjacentHTML("beforeend", msgHTML);
  msgerChat.scrollTop += 500;
}

function getBotResponse(userInput) {
  for (const qaPair of QA_PAIRS) {
    if (userInput.toLowerCase().includes(qaPair.question.toLowerCase())) {
      return qaPair.answer;
    }
  }
  // Si no se encuentra una coincidencia, devolver una respuesta predeterminada
  const r = random(0, BOT_MSGS.length - 1);
  return BOT_MSGS[r];
}

// Utils
function get(selector, root = document) {
  return root.querySelector(selector);
}

function formatDate(date) {
  const h = "0" + date.getHours();
  const m = "0" + date.getMinutes();

  return `${h.slice(-2)}:${m.slice(-2)}`;
}

function random(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}
