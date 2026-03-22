<!-- ================= ADVANCED CHATBOT ================= -->
<style>
/* Floating Button */
.chat-toggle {
  position: fixed;
  bottom: 20px;
  right: 20px;
  background: #2e7d32;
  color: #fff;
  border-radius: 50%;
  padding: 16px;
  font-size: 20px;
  cursor: pointer;
  box-shadow: 0 4px 15px rgba(0,0,0,0.3);
  z-index: 999;
}

/* Chat Container */
.chat-container {
  position: fixed;
  bottom: 80px;
  right: 20px;
  width: 320px;
  height: 420px;
  background: #fff;
  border-radius: 15px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.2);
  display: none;
  flex-direction: column;
  overflow: hidden;
  animation: fadeIn 0.3s ease;
}

/* Header */
.chat-header {
  background: #2e7d32;
  color: white;
  padding: 12px;
  font-weight: bold;
  text-align: center;
}

/* Chat Body */
.chat-body {
  flex: 1;
  padding: 10px;
  overflow-y: auto;
  background: #f9f9f9;
}

/* Messages */
.msg {
  margin: 6px 0;
  max-width: 80%;
  padding: 8px 10px;
  border-radius: 10px;
  font-size: 13px;
}

.bot {
  background: #e8f5e9;
  align-self: flex-start;
}

.user {
  background: #2e7d32;
  color: #fff;
  align-self: flex-end;
}

/* Buttons */
.option-btn {
  display: block;
  width: 100%;
  background: #2e7d32;
  color: #fff;
  border: none;
  padding: 6px;
  margin: 4px 0;
  border-radius: 6px;
  cursor: pointer;
  font-size: 13px;
}

/* Typing */
.typing {
  font-size: 12px;
  color: gray;
}

/* Animation */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>

<!-- Button -->
<div class="chat-toggle" onclick="toggleChat()">💬</div>

<!-- Chat -->
<div class="chat-container" id="chatBox">
  <div class="chat-header">Glowing Assistant</div>
  <div class="chat-body" id="chatBody"></div>
</div>

<script>
const chatBody = document.getElementById("chatBody");

function toggleChat() {
  const box = document.getElementById("chatBox");
  box.style.display = box.style.display === "flex" ? "none" : "flex";

  if (chatBody.innerHTML === "") startChat();
}

// Add message
function addMsg(text, type="bot") {
  const div = document.createElement("div");
  div.className = "msg " + type;
  div.innerHTML = text;
  chatBody.appendChild(div);
  chatBody.scrollTop = chatBody.scrollHeight;
}

// Typing effect
function botReply(text) {
  const typing = document.createElement("div");
  typing.className = "typing";
  typing.innerText = "Typing...";
  chatBody.appendChild(typing);
  chatBody.scrollTop = chatBody.scrollHeight;

  setTimeout(() => {
    typing.remove();
    addMsg(text, "bot");
  }, 800);
}

// Buttons
function addOptions(options) {
  options.forEach(opt => {
    const btn = document.createElement("button");
    btn.className = "option-btn";
    btn.innerText = opt.label;
    btn.onclick = () => {
      addMsg(opt.label, "user");
      opt.action();
    };
    chatBody.appendChild(btn);
  });
}

// Start
function startChat() {
  botReply("Hi 👋 Welcome to Glowing!");
  setTimeout(() => {
    botReply("How can I help you?");
    addOptions([
      {label:"🛍️ Shop", action: showProducts},
      {label:"🔥 Offers", action: showOffers},
      {label:"📦 Track Order", action: trackOrder},
      {label:"💬 Contact", action: contact}
    ]);
  }, 1000);
}

// Flows
function showProducts() {
  botReply("Choose category:");
  addOptions([
    {label:"Face Wash", action: ()=>botReply("Explore Face Wash 🧴")},
    {label:"Serum", action: ()=>botReply("Best serums available ✨")},
    {label:"Skincare", action: ()=>botReply("Browse skincare 💚")}
  ]);
}

function showOffers() {
  botReply("🔥 20% OFF<br>✨ Buy 1 Get 1<br>🚚 Free Shipping above ₹1000");
}

function trackOrder() {
  botReply("Please contact support with your Order ID 📦");
}

function contact() {
  botReply("Click below to chat on WhatsApp 👇");
  chatBody.innerHTML += `<a href="https://wa.me/6354119053" target="_blank" class="option-btn">Open WhatsApp</a>`;
}
</script>