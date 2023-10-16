function postAndRedirect(url, postData, method) {
    if (method === undefined) {
        method = 'POST';
    }
    var postFormStr = "<form method='"+method+"' action='" + url + "'>\n";
    for (var key in postData) {
        if (postData.hasOwnProperty(key)) {
            if (postData[key] !== undefined && postData[key] !== null) {
                postFormStr += "<input type='hidden' name='" + key + "' value='" + postData[key] + "' />";
            }
        }
    }
    postFormStr += "</form>";
    var formElement = $(postFormStr);
    $('body').append(formElement);
    $(formElement).submit();
}
