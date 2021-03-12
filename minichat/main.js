let inputMessage = document.querySelector('#message')
inputMessage.addEventListener("keydown", function(event) {
  
    if (event.keyCode === 13) {
      sendMessage()
    }
  });

let box = document.querySelector('#text');
box.scrollTop = box.scrollHeight;

function scrollBar(){
box.scrollTop = box.scrollHeight;
}

function autoLoad(){
    $.ajax({
    url: 'loadmessage.php',
    success: function(data){
        $('.textchat').html(data);
        scrollBar()
    }
    });
}

$(document).ready(function()
{
    setInterval(function(){
        autoLoad()
    }, 5000);
});


function sendMessage() {
    $.post('/minichat/traitement/post-message.php',{
        msg_text: $('#message'). val()
    },function(){
        document.querySelector('#message').value=''
        autoLoad()
    }
    )
}

