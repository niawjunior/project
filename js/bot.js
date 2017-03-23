var bubbleControl = function() {
	
	if(window._botName){
		var name = window._botName;
	}else{
		var name = "Chat with me";
	}
	
    var username = window._botUsername;
    
    var botChatContainer = '<div id="_chatBubble"> \
                                <div class="_bubble-label"> \
                                    <h4 class="bot-title"> '+ name +' </h4> \
                                </div> \
                            </div> \
                            <div id="chatWindow" class="_disable basicAvatar1 basicAvatar2 basicAvatar3 basicAvatar4 basicAvatar5 basicAvatar6 basicAvatar7"> \
                                <div id="chatWindow-header"> \
                                    <h1 class="bot-title"> '+ name +' </h1> \
                                    <span class="chatWindow-close caret"></span> \
                                </div> \
                            </div>';


    function _openChatWindow() {
        var bubble = document.getElementById('_chatBubble'),
            mainCnt = document.getElementById('chatWindow');
        bubble.style.display = 'none';
        if (!document.getElementById('_botChatFrame')) {
            var botChatFrame = document.createElement("iframe");
            botChatFrame.setAttribute("id", "_botChatFrame");
            botChatFrame.setAttribute("src", "http://rebot.me/bubblechat/chat?username=" + username);
            botChatFrame.setAttribute("scrolling", "no");
            botChatFrame.setAttribute("frameborder", "0");
            botChatFrame.style.width = "380px";
            botChatFrame.style.height = "401px";
            botChatFrame.style.overflow = "hidden";
            botChatFrame.style.padding = "4px";
            botChatFrame.style.border = "none";
            mainCnt.appendChild(botChatFrame);
        }
        mainCnt.style.display = 'block';
    };

    function _closeChatWindow() {
        var bubble = document.getElementById('_chatBubble'),
            mainCnt = document.getElementById('chatWindow');
        bubble.style.display = 'block';
        mainCnt.style.display = 'none';
    };

    function _createElements(_chtml, callback) {
        var cBody = document.getElementsByTagName("body")[0];
        var botChatObj = document.createElement('div');

        botChatObj.innerHTML = _chtml;
        cBody.appendChild(botChatObj);
        if (callback) {
            callback();
        };
    };

    function _bindElements() {
        var _cBubble = document.getElementById('_chatBubble');
        _cBubble.onclick = function() {
            _openChatWindow();
        };
        var _cHeader = document.getElementById('chatWindow-header');
        _cHeader.onclick = function() {
            _closeChatWindow();
        };
        document.onkeyup = function keyPress(e) {
            wkey = e.which ? e.which : window.event.keyCode;
            if (wkey == 27)
                _closeChatWindow();
        };
    };

    _createElements(botChatContainer, function() {
        _bindElements();
    })

    function getQueryVariable(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            if (pair[0] == variable) {
                return pair[1];
            }
        }
        return (false);
    };

    var popupOpen = getQueryVariable("popupOpen");
    if (popupOpen == true)
        _openChatWindow();
}


window.onload = bubbleControl;