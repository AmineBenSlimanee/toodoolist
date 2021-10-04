function ConvertToCamel(text){
    let newText = '';
    for (let index = 0; index < text.length; index++) {
        if (index == 0){
            newText += text.charAt(index).toUpperCase();
        }
        else if (text.charAt(index - 1) == ' '){
            newText += text.charAt(index).toUpperCase();
        }
        else{
            newText += text.charAt(index);
        }
    }
    return newText;
}