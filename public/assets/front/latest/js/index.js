$(document).ready(function(){
    // Search bar auto placeholder value
    const words = ["Try 'Trademark Registration'", "Try 'Privacy Policy'", "Try 'Drafting Notices'", "Try 'Affidavits'", "Try 'Private Limited Company'", "Try 'GST Filing'", "Try 'Accounting And Book-keeping'", , "Try 'Income Tax  Return Filing'",];
    let i = 0;
    let timer;

    function typingEffect() {
        let word = words[i].split("");
        var loopTyping = function () {
            if (word.length > 0) {
                let elem = document.getElementById('autosuggestfor');
                elem.setAttribute('placeholder', elem.getAttribute('placeholder') + word.shift());
            } else {
                deletingEffect();
                return false;
            };
            timer = setTimeout(loopTyping, 200);
        };
        loopTyping();
    };

    function deletingEffect() {
        let word = words[i].split("");
        var loopDeleting = function () {
            if (word.length > 0) {
                word.pop();
                document.getElementById('autosuggestfor').setAttribute('placeholder', word.join(""));
            } else {
                if (words.length > (i + 1)) {
                    i++;
                } else {
                    i = 0;
                };
                typingEffect();
                return false;
            };
            timer = setTimeout(loopDeleting, 100);
        };
        loopDeleting();
    };

    typingEffect();
});