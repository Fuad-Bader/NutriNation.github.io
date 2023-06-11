const chatForm = document.getElementById("chat-form");
const chatInput = document.getElementById("chat-input");
const chatOutput = document.getElementById("chat-output");
const preloader = document.getElementById("preloader2");

// Function to send a message
const sendMessage = async (message) => {
  preloader.classList.remove("preloader-hide"); // Show the preloader

  try {
    const response = await fetch("ChatGPT-API/gptchat.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ message }),
    });

    if (response.ok) {
      const data = await response.json();
      if (data.choices && data.choices[0] && data.choices[0].text) {
        chatOutput.innerHTML += `<div class="speech-bubble speech-right color-black">${data.choices[0].text}</div><div class="clearfix"></div>`;
      } else {
        console.error("Error: Unexpected response format", data);
      }
      chatOutput.scrollTop = chatOutput.scrollHeight;
    } else {
      console.error("Error communicating with GPTChat API");
    }
  } catch (error) {
    console.error("Error:", error);
  } finally {
    preloader.classList.add("preloader-hide"); // Hide the preloader
  }
};


// Event listener for form submission
chatForm.addEventListener("submit", async (e) => {
  e.preventDefault();
  const message = chatInput.value.trim();
  if (!message) return;

  chatOutput.innerHTML += `<div class="speech-bubble speech-left bg-highlight">${message}</div><div class="clearfix"></div>`;
  chatInput.value = "";
  chatOutput.scrollTop = chatOutput.scrollHeight;

  // Send the message
  await sendMessage(message);
});

// Trigger form submission with initial message on page load
window.addEventListener("load", async () => {
  const initialMessage = "Hello, from now on your name is Jess and you work as a professional nutritionist in a company named NutriNation. Now introduce yourself.";
  await sendMessage(initialMessage);
});
