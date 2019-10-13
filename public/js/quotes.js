//by kelvinpw (kpz@ens160.com)
var quotes = JSON.parse("[]");
updateQuotesList();

function newQuote() {
    console.log("getting new quote");
    var quote = quotes[Math.floor(Math.random() * quotes.length)];
    $("#quote").attr("src", "/quotes/" + quote.filename);
    $("#quote").attr("alt", quote.transcript);

}

setInterval(newQuote, 60000);
setInterval(updateQuotesList, 600000);

//Grab all of the quotes once in a while in case there are new ones
function updateQuotesList() {
    $.get("api/GetAllQuotes", function (data) {
        quotes = data;
        console.log("updating quotes list");
    })
}

$(".clickfornew").click(function () {
    newQuote();
});


