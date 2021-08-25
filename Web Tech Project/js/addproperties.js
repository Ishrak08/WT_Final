var hasError = false;
function get(id){
  return document.getElementById(id);
}
function validate(){
    refresh();
    if(get("p_type").selectedIndex == 0){
        hasError = true;
        get("err_p_type").innerHTML = " *Type Req";
    }
    if(get("p_area").value == ""){
        hasError = true;
        get("err_p_area").innerHTML = " *Area Req";
    }
    if(get("p_location").value == ""){
        hasError = true;
        get("err_p_location").innerHTML = " *Location Req";
    }
    if(get("p_price").value == ""){
        hasError = true;
        get("err_p_price").innerHTML = " *Price Req";
    }
    if(get("p_description").value == ""){
        hasError = true;
        get("err_p_description").innerHTML = " *Description Req";
    }
    if(get("p_img").value == ""){
        hasError = true;
        get("err_p_img").innerHTML = " *Image Req";
    }

    return !hasError;
}
function refresh(){
    hasError = false;
    get("err_p_type").innerHTML = "";
    get("err_p_area").innerHTML = "";
    get("err_p_location").innerHTML = "";
    get("err_p_price").innerHTML = "";
    get("err_p_description").innerHTML = "";
    get("err_p_img").innerHTML = "";

}